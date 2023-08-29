<?php
/**
 * @package redirector
 *
 * @var modX|xPDO $modx
 * @var array $scriptProperties
 * @var modResource $resource
 * @var string $mode
 */

/* load redirector class */
$corePath = $modx->getOption('redirector.core_path', $scriptProperties, $modx->getOption('core_path') . 'components/redirector/');
$redirector = $modx->getService('redirector', 'Redirector', $corePath . 'model/redirector/', $scriptProperties);
if (!($redirector instanceof Redirector)) {
    return '';
}

$eventName = $modx->event->name;
switch ($eventName) {
    case 'OnPageNotFound':
        /* handle redirects */
        $search = rawurldecode($_SERVER['REQUEST_URI']);
        $baseUrl = $modx->getOption('base_url', null, MODX_BASE_URL);
        if (!empty($baseUrl) && $baseUrl != '/' && $baseUrl != ' ' && $baseUrl != '/' . $modx->context->get('key') . '/') {
            $search = str_replace($baseUrl, '', $search);
        }

        $search = ltrim($search, '/');
        if (!empty($search)) {
            $searchEscape = $modx->quote($search);

            /** @var modRedirect $redirect */
            $redirect = $modx->getObject('modRedirect', array(
                "(`modRedirect`.`pattern` = " . $searchEscape . ")",
                "(`modRedirect`.`context_key` = '" . $modx->context->get('key') . "' OR `modRedirect`.`context_key` IS NULL OR `modRedirect`.`context_key` = '')",
                'active' => true,
            ));

            // when not found, check a REGEX record..
            // need to separate this one because of some 'alias.html > target.html' vs. 'best-alias.html > best-target.html' issues...
            if (empty($redirect) || !is_object($redirect)) {
                $c = $modx->newQuery('modRedirect');
                $c->where(array(
                    "(`modRedirect`.`pattern` = " . $searchEscape . " OR " . $searchEscape . " REGEXP `modRedirect`.`pattern` OR " . $searchEscape . " REGEXP CONCAT('^', `modRedirect`.`pattern`, '$'))",
                    "(`modRedirect`.`context_key` = '" . $modx->context->get('key') . "' OR `modRedirect`.`context_key` IS NULL OR `modRedirect`.`context_key` = '')",
                    'active' => true,
                ));
                $redirect = $modx->getObject('modRedirect', $c);
            }

            if (!empty($redirect) && is_object($redirect)) {

                /** @var modContext $context */
                $context = $redirect->getOne('Context');
                if (empty($context) || !($context instanceof modContext)) {
                    $context = $modx->context;
                }

                $target = $redirect->get('target');
                $modx->parser->processElementTags('', $target, true, true);

                if ($target != $modx->resourceIdentifier && $target != $search) {
                    if (strpos($target, '$') !== false) {
                        $pattern = $redirect->get('pattern');
                        $target = preg_replace('/' . $pattern . '/', $target, $search);
                    }
                    if (!strpos($target, '://')) {
                        $target = rtrim($context->getOption('site_url'), '/') . '/' . (($target == '/') ? '' : ltrim($target, '/'));
                    }
                    $modx->log(modX::LOG_LEVEL_INFO, 'Redirector plugin redirecting request for ' . $search . ' to ' . $target);

                    $redirect->registerTrigger();

                    $options = array('responseCode' => 'HTTP/1.1 301 Moved Permanently');
                    $modx->sendRedirect($target, $options);
                }
            }
        }

        break;

    case 'OnDocFormRender':
        $track_uri_updates = (boolean)$modx->getOption('redirector.track_uri_updates', null, 1);
        $track_uri_updates = (in_array($track_uri_updates, array(false, 'false', 0, '0', 'no', 'n'), true)) ? false : true;

        if ($mode == 'upd' && $track_uri_updates) {
            $_SESSION['modx_resource_uri'] = $resource->get('uri');
        }

        break;

    case 'OnDocFormSave':
        /* if uri has changed, add to redirects */
        $track_uri_updates = $modx->getOption('redirector.track_uri_updates', null, 1);
        $track_uri_updates = (in_array($track_uri_updates, array(false, 'false', 0, '0', 'no', 'n'), true)) ? false : true;
        $context_key = $resource->get('context_key');
        $new_uri = $resource->get('uri');

        if ($mode == 'upd' && $track_uri_updates && !empty($_SESSION['modx_resource_uri'])) {
            $old_uri = $_SESSION['modx_resource_uri'];
            if ($old_uri != $new_uri) {
                /* uri changed */
                $redirect = $modx->getObject('modRedirect', array(
                    'pattern' => $old_uri,
                    'context_key' => $context_key,
                    'active' => true
                ));
                if (empty($redirect)) {
                    /* no record for old uri */
                    $new_redirect = $modx->newObject('modRedirect');
                    $new_redirect->fromArray(array(
                        'pattern' => $old_uri,
                        'target' => '[[~' . $resource->get('id') . ']]',
                        'context_key' => $context_key,
                        'active' => true,
                    ));

                    if ($new_redirect->save() == false) {
                        return $modx->error->failure($modx->lexicon('redirector.redirect_err_save'));
                    }
                }
            }

            $_SESSION['modx_resource_uri'] = $new_uri;
        }

        break;
}

return '';
