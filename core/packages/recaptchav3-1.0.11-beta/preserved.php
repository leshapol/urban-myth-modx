<?php return array (
  'aa43fbdfc18387d49a92dfa2f848253b' => 
  array (
    'criteria' => 
    array (
      'name' => 'recaptchav3',
    ),
    'object' => 
    array (
      'name' => 'recaptchav3',
      'path' => '{core_path}components/recaptchav3/',
      'assets_path' => '',
    ),
  ),
  '1d98977781a091f398815835789810ab' => 
  array (
    'criteria' => 
    array (
      'category' => 'reCaptchaV3',
    ),
    'object' => 
    array (
      'id' => 21,
      'parent' => 0,
      'category' => 'reCaptchaV3',
      'rank' => 0,
    ),
  ),
  'd0b5a3505e8e13cf61f950bd8f2e8a33' => 
  array (
    'criteria' => 
    array (
      'name' => 'rcv3',
    ),
    'object' => 
    array (
      'id' => 48,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'rcv3',
      'description' => 'reCaptchaV3 hook for Formit',
      'editor_type' => 0,
      'category' => 21,
      'cache_type' => 0,
      'snippet' => '$recaptcha = $hook->getValue(\'g-recaptcha-response\');
$url_google_api = "https://www.google.com/recaptcha/api/siteverify";
$secret = $modx->getOption(\'formit.recaptcha_private_key\');
$ip = $_SERVER[\'REMOTE_ADDR\'];

$modx->lexicon->load(\'recaptchav3:default\');

class Captcha{
    public function getCaptcha($SecretKey, $secret, $url_google_api, $ip){
        $response = file_get_contents($url_google_api . "?secret=" . $secret . "&response=" . $SecretKey . "&remoteip=" . $ip);
        $data = json_decode($response);
        return $data;
    }
}

if ($recaptcha) {
    $ObjCaptcha = new Captcha();
    $data = $ObjCaptcha->getCaptcha($recaptcha, $secret, $url_google_api, $ip);

    if ($data->success && $data->score >= 0.5) {
        return true;
    } else {
        $hook->addError(\'g-recaptcha-response\', $modx->lexicon(\'recaptchav3_check_error\'));
        $error_message = "";
        $error_message .= $modx->lexicon(\'recaptchav3_check_error_log\') . "<br/>";
        foreach ($data->{\'error-codes\'} as $k => $v) {
            $error_message .= "{$k} - {$v}<br/>";
        }
        $modx->log(MODX_LOG_LEVEL_ERROR, $error_message);
        return false;
    }
} else {
    $hook->addError(\'g-recaptcha-response\', $modx->lexicon(\'recaptchav3_check_empty_error\'));
    $modx->log(MODX_LOG_LEVEL_ERROR, $modx->lexicon(\'recaptchav3_check_empty_error_log\'));
    return false;
}

return true;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/recaptchav3/elements/snippets/recaptchav3.php',
      'content' => '$recaptcha = $hook->getValue(\'g-recaptcha-response\');
$url_google_api = "https://www.google.com/recaptcha/api/siteverify";
$secret = $modx->getOption(\'formit.recaptcha_private_key\');
$ip = $_SERVER[\'REMOTE_ADDR\'];

$modx->lexicon->load(\'recaptchav3:default\');

class Captcha{
    public function getCaptcha($SecretKey, $secret, $url_google_api, $ip){
        $response = file_get_contents($url_google_api . "?secret=" . $secret . "&response=" . $SecretKey . "&remoteip=" . $ip);
        $data = json_decode($response);
        return $data;
    }
}

if ($recaptcha) {
    $ObjCaptcha = new Captcha();
    $data = $ObjCaptcha->getCaptcha($recaptcha, $secret, $url_google_api, $ip);

    if ($data->success && $data->score >= 0.5) {
        return true;
    } else {
        $hook->addError(\'g-recaptcha-response\', $modx->lexicon(\'recaptchav3_check_error\'));
        $error_message = "";
        $error_message .= $modx->lexicon(\'recaptchav3_check_error_log\') . "<br/>";
        foreach ($data->{\'error-codes\'} as $k => $v) {
            $error_message .= "{$k} - {$v}<br/>";
        }
        $modx->log(MODX_LOG_LEVEL_ERROR, $error_message);
        return false;
    }
} else {
    $hook->addError(\'g-recaptcha-response\', $modx->lexicon(\'recaptchav3_check_empty_error\'));
    $modx->log(MODX_LOG_LEVEL_ERROR, $modx->lexicon(\'recaptchav3_check_empty_error_log\'));
    return false;
}

return true;',
    ),
  ),
  '13bf090cd1c5795e6e583f4f9dc0848c' => 
  array (
    'criteria' => 
    array (
      'name' => 'rcv3_html',
    ),
    'object' => 
    array (
      'id' => 49,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'rcv3_html',
      'description' => 'reCaptchaV3 snippet',
      'editor_type' => 0,
      'category' => 21,
      'cache_type' => 0,
      'snippet' => '$public = $modx->getOption(\'formit.recaptcha_public_key\');
$action = $action ?: \'ajaxform\';

if (!$modx->getPlaceholder(\'rcv3_initialized\')) {
    $modx->regClientStartupScript(\'<script src="https://www.google.com/recaptcha/api.js?onload=ReCaptchaCallbackV3&render=\' . $public . \'" async></script>\');
    $modx->regClientScript(\'
        <script>
            var ReCaptchaCallbackV3 = function() {
                grecaptcha.ready(function() {
                    grecaptcha.reset = grecaptchaExecute;
                    grecaptcha.reset();
                });
            };
            function grecaptchaExecute() {
                grecaptcha.execute("\' . $public . \'", { action: "\' . $action . \'" }).then(function(token) {
                    var fieldsToken = document.querySelectorAll("[name =\\\'g-recaptcha-response\\\']");
                    Array.prototype.forEach.call(fieldsToken, function(el, i){
                        el.value = token;
                    });
                });
            };
            // обновляем капчу каждую минуту
            setInterval(function() {
                grecaptcha.reset();
            }, 60000);
        </script>
    \', true);
    $modx->setPlaceholder(\'rcv3_initialized\', 1);
}

$output = \'
    <span class="error_g-recaptcha-response error">\' . $error . \'</span>
    <input type="hidden" name="g-recaptcha-response">
\';

return $output;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/recaptchav3/elements/snippets/recaptchav3_html.php',
      'content' => '$public = $modx->getOption(\'formit.recaptcha_public_key\');
$action = $action ?: \'ajaxform\';

if (!$modx->getPlaceholder(\'rcv3_initialized\')) {
    $modx->regClientStartupScript(\'<script src="https://www.google.com/recaptcha/api.js?onload=ReCaptchaCallbackV3&render=\' . $public . \'" async></script>\');
    $modx->regClientScript(\'
        <script>
            var ReCaptchaCallbackV3 = function() {
                grecaptcha.ready(function() {
                    grecaptcha.reset = grecaptchaExecute;
                    grecaptcha.reset();
                });
            };
            function grecaptchaExecute() {
                grecaptcha.execute("\' . $public . \'", { action: "\' . $action . \'" }).then(function(token) {
                    var fieldsToken = document.querySelectorAll("[name =\\\'g-recaptcha-response\\\']");
                    Array.prototype.forEach.call(fieldsToken, function(el, i){
                        el.value = token;
                    });
                });
            };
            // обновляем капчу каждую минуту
            setInterval(function() {
                grecaptcha.reset();
            }, 60000);
        </script>
    \', true);
    $modx->setPlaceholder(\'rcv3_initialized\', 1);
}

$output = \'
    <span class="error_g-recaptcha-response error">\' . $error . \'</span>
    <input type="hidden" name="g-recaptcha-response">
\';

return $output;',
    ),
  ),
);