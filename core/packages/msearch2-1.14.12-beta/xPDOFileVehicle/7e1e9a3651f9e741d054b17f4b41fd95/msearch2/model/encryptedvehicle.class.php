<?php

use Psr\Http\Message\ResponseInterface;

class_alias('encryptedVehicle', 'xPDO\Transport\encryptedVehicle');
class encryptedVehicle extends xPDOObjectVehicle
{
    public $class = 'encryptedVehicle';
    public const version = '3.0.0';
    public const cipher = 'AES-256-CBC';


    /**
     * @param $transport xPDOTransport
     * @param $object
     * @param array $attributes
     */
    public function put(&$transport, &$object, $attributes = array())
    {
        parent::put($transport, $object, $attributes);

        if (defined('PKG_ENCODE_KEY')) {
            $this->payload['object_encrypted'] = $this->encode($this->payload['object'], PKG_ENCODE_KEY);
            unset($this->payload['object']);

            if (isset($this->payload['related_objects'])) {
                $this->payload['related_objects_encrypted'] = $this->encode($this->payload['related_objects'], PKG_ENCODE_KEY);
                unset($this->payload['related_objects']);
            }

            $transport->xpdo->log(xPDO::LOG_LEVEL_INFO, 'Package encrypted!');
        }
    }


    /**
     * @param $transport xPDOTransport
     * @param $options
     *
     * @return bool
     */
    public function install(&$transport, $options)
    {
        if (!$this->decodePayloads($transport, 'install')) {
            return false;
        } else {
            $transport->xpdo->log(xPDO::LOG_LEVEL_INFO, 'Package decrypted!');
        }

        return parent::install($transport, $options);
    }


    /**
     * @param $transport xPDOTransport
     * @param $options
     *
     * @return bool
     */
    public function uninstall(&$transport, $options)
    {
        if (!$this->decodePayloads($transport, 'uninstall')) {
            return false;
        } else {
            $transport->xpdo->log(xPDO::LOG_LEVEL_INFO, 'Package decrypted!');
        }

        return parent::uninstall($transport, $options);
    }


    /**
     * @param array $data
     * @param string $key
     *
     * @return string
     */
    protected function encode($data, $key)
    {
        $ivLen = openssl_cipher_iv_length($this::cipher);
        $iv = openssl_random_pseudo_bytes($ivLen);
        $cipher_raw = openssl_encrypt(serialize($data), $this::cipher, $key, OPENSSL_RAW_DATA, $iv);

        return base64_encode($iv . $cipher_raw);
    }


    /**
     * @param string $string
     * @param string $key
     * @param string $error Passed by reference, an error message from the decoding (if any)
     * @return string
     */
    protected function decode($string, $key, &$error = '')
    {
        $ivLen = openssl_cipher_iv_length($this::cipher);
        $encoded = base64_decode($string);
        if (ini_get('mbstring.func_overload')) {
            $strLen = mb_strlen($encoded, '8bit');
            $iv = mb_substr($encoded, 0, $ivLen, '8bit');
            $cipher_raw = mb_substr($encoded, $ivLen, $strLen, '8bit');
        } else {
            $iv = substr($encoded, 0, $ivLen);
            $cipher_raw = substr($encoded, $ivLen);
        }
        $decrypted = openssl_decrypt($cipher_raw, $this::cipher, $key, OPENSSL_RAW_DATA, $iv);
        if ($decrypted === false) {
            $error = 'Decryption failed: ';
            while ($msg = openssl_error_string()) {
                $error .= '- ' . $msg;
            }
            return false;
        }
        return unserialize($decrypted);
    }


    /**
     * @param $transport xPDOTransport
     * @param string $action
     *
     * @return bool
     */
    protected function decodePayloads(&$transport, $action = 'install')
    {
        $error = '';
        if (isset($this->payload['object_encrypted']) || isset($this->payload['related_objects_encrypted'])) {
            if (!$key = $this->getDecodeKey($transport, $action)) {
                $transport->xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Could not retrieve the decryption key.');
                return false;
            }
            if (isset($this->payload['object_encrypted'])) {
                $decoded = $this->decode($this->payload['object_encrypted'], $key, $error);
                if ($decoded === false) {
                    $transport->xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Failed to decode object with key ' . $key . ': ' . $error);
                    return false;
                }
                $this->payload['object'] = $decoded;
                unset($this->payload['object_encrypted']);
            }
            if (isset($this->payload['related_objects_encrypted'])) {
                $decoded = $this->decode($this->payload['related_objects_encrypted'], $key, $error);
                if ($decoded === false) {
                    $transport->xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Failed to decode related objects with key ' . $key . ': ' . $error);
                    return false;
                }
                $this->payload['related_objects'] = $decoded;
                unset($this->payload['related_objects_encrypted']);
            }
        }

        return true;
    }


    /**
     * @param $transport xPDOTransport
     * @param $action
     *
     * @return bool|string
     */
    protected function getDecodeKey(&$transport, $action)
    {
        $key = false;
        $endpoint = 'package/decode/' . $action;

        /** @var modTransportPackage|\MODX\Revolution\Transport\modTransportPackage $package */
        $package = $transport->xpdo->getObject('transport.modTransportPackage', array(
            'signature' => $transport->signature,
        ));

        if ($package) {
            /** @var modTransportProvider|\MODX\Revolution\Transport\modTransportProvider $provider */
            if ($provider = $package->getOne('Provider')) {
                $provider->xpdo->setOption('contentType', 'default');
                $params = array(
                    'package' => $package->package_name,
                    'version' => $transport->version,
                    'username' => $provider->username,
                    'api_key' => $provider->api_key,
                    'vehicle_version' => self::version,
                );

                $response = $provider->request($endpoint, 'POST', $params);
                // On MODX 2.x and up to 3.0.0-alpha2, providers use modRestClient
                if ($response instanceof modRestResponse) {
                    if ($response->isError()) {
                        $msg = $response->getError();
                        $transport->xpdo->log(xPDO::LOG_LEVEL_ERROR, (string)$msg);
                    }
                    else {
                        $data = $response->toXml();
                        if (!empty($data->key)) {
                            return base64_decode((string)$data->key);
                        }

                        if (!empty($data->message)) {
                            $transport->xpdo->log(xPDO::LOG_LEVEL_ERROR, (string)$data->message);
                        }
                    }
                }
                // MODX 3.0.0-alpha3 and up, providers return a PSR response
                elseif ($response instanceof ResponseInterface) {
                    $raw = $response->getBody()->getContents();
                    $disableEntities = libxml_disable_entity_loader();
                    $internalErrors = libxml_use_internal_errors(true);
                    $data = simplexml_load_string($raw);
                    libxml_disable_entity_loader($disableEntities);
                    libxml_use_internal_errors($internalErrors);

                    if (!empty($data->key)) {
                        return $data->key;
                    }

                    if (!empty($data->message)) {
                        $transport->xpdo->log(xPDO::LOG_LEVEL_ERROR, (string)$data->message);
                    }
                }
                else {
                    $transport->xpdo->log(xPDO::LOG_LEVEL_ERROR, 'Failed to send decode request');
                }
            }
        }

        return false;
    }

}
