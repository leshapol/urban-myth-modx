<?php return array (
  'b6fde4cd04abcbb8d631147f0b39a586' => 
  array (
    'criteria' => 
    array (
      'name' => 'fetchit',
    ),
    'object' => 
    array (
      'name' => 'fetchit',
      'path' => '{core_path}components/fetchit/',
      'assets_path' => '',
    ),
  ),
  'c9cc247e09f7deea2fa9c0f9e8b9d130' => 
  array (
    'criteria' => 
    array (
      'key' => 'fetchit.frontend.js',
    ),
    'object' => 
    array (
      'key' => 'fetchit.frontend.js',
      'value' => '[[+assetsUrl]]js/fetchit.js',
      'xtype' => 'textfield',
      'namespace' => 'fetchit',
      'area' => 'fetchit_main',
      'editedon' => NULL,
    ),
  ),
  '26689261d6ba2c2354b9e7ce7ce54af5' => 
  array (
    'criteria' => 
    array (
      'key' => 'fetchit.frontend.js.classname',
    ),
    'object' => 
    array (
      'key' => 'fetchit.frontend.js.classname',
      'value' => 'FetchIt',
      'xtype' => 'textfield',
      'namespace' => 'fetchit',
      'area' => 'fetchit_main',
      'editedon' => NULL,
    ),
  ),
  '97d95c0417f87aadf554caf58b34c04e' => 
  array (
    'criteria' => 
    array (
      'key' => 'fetchit.frontend.input.invalid.class',
    ),
    'object' => 
    array (
      'key' => 'fetchit.frontend.input.invalid.class',
      'value' => 'is-invalid',
      'xtype' => 'textfield',
      'namespace' => 'fetchit',
      'area' => 'fetchit_main',
      'editedon' => NULL,
    ),
  ),
  '34b1a08e1808c53dd2a1f43221ad9f51' => 
  array (
    'criteria' => 
    array (
      'key' => 'fetchit.frontend.custom.invalid.class',
    ),
    'object' => 
    array (
      'key' => 'fetchit.frontend.custom.invalid.class',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'fetchit',
      'area' => 'fetchit_main',
      'editedon' => NULL,
    ),
  ),
  '72b300c9b10800cb1d599b2192ece360' => 
  array (
    'criteria' => 
    array (
      'key' => 'fetchit.frontend.default.notifier',
    ),
    'object' => 
    array (
      'key' => 'fetchit.frontend.default.notifier',
      'value' => '0',
      'xtype' => 'combo-boolean',
      'namespace' => 'fetchit',
      'area' => 'fetchit_main',
      'editedon' => NULL,
    ),
  ),
  'f58ce710eb56dfbfbd8ca85ed91d27a5' => 
  array (
    'criteria' => 
    array (
      'category' => 'FetchIt',
    ),
    'object' => 
    array (
      'id' => 1,
      'parent' => 0,
      'category' => 'FetchIt',
      'rank' => 0,
    ),
  ),
  '16080026e4759694eded50575022f3e8' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.FetchIt.example',
    ),
    'object' => 
    array (
      'id' => 1,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.FetchIt.example',
      'description' => '',
      'editor_type' => 0,
      'category' => 1,
      'cache_type' => 0,
      'snippet' => '<form action="[[~[[*id]]]]" method="post">
  <fieldset>

    <div>
      <label>[[%fetchit_label_name]]
        <input type="text" name="name" value="[[+fi.name]]"/>
        <span data-error="name">[[+fi.error.name]]</span>
      </label>
    </div>

    <div>
      <label>[[%fetchit_label_email]]
        <input type="text" name="email" value="[[+fi.email]]"/>
        <span data-error="email">[[+fi.error.email]]</span>
      </label>
    </div>

    <div>
      <label>[[%fetchit_label_message]]
        <textarea name="message" rows="5">[[+fi.message]]</textarea>
        <span data-error="message">[[+fi.error.message]]</span>
      </label>
    </div>

    <div>
      <button type="reset">[[%fetchit_reset]]</button>
      <button type="submit">[[%fetchit_submit]]</button>
    </div>

    [[+fi.success:is=`1`:then=`
    <div role="alert">[[+fi.successMessage]]</div>
    `]]
    [[+fi.validation_error:is=`1`:then=`
    <div role="alert">[[+fi.validation_error_message]]</div>
    `]]
  </fieldset>
</form>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/fetchit/elements/chunks/example.tpl',
      'content' => '<form action="[[~[[*id]]]]" method="post">
  <fieldset>

    <div>
      <label>[[%fetchit_label_name]]
        <input type="text" name="name" value="[[+fi.name]]"/>
        <span data-error="name">[[+fi.error.name]]</span>
      </label>
    </div>

    <div>
      <label>[[%fetchit_label_email]]
        <input type="text" name="email" value="[[+fi.email]]"/>
        <span data-error="email">[[+fi.error.email]]</span>
      </label>
    </div>

    <div>
      <label>[[%fetchit_label_message]]
        <textarea name="message" rows="5">[[+fi.message]]</textarea>
        <span data-error="message">[[+fi.error.message]]</span>
      </label>
    </div>

    <div>
      <button type="reset">[[%fetchit_reset]]</button>
      <button type="submit">[[%fetchit_submit]]</button>
    </div>

    [[+fi.success:is=`1`:then=`
    <div role="alert">[[+fi.successMessage]]</div>
    `]]
    [[+fi.validation_error:is=`1`:then=`
    <div role="alert">[[+fi.validation_error_message]]</div>
    `]]
  </fieldset>
</form>',
    ),
  ),
  'ff5ecf72a614d800be42587a596bcb77' => 
  array (
    'criteria' => 
    array (
      'name' => 'FetchIt',
    ),
    'object' => 
    array (
      'id' => 1,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'FetchIt',
      'description' => '',
      'editor_type' => 0,
      'category' => 1,
      'cache_type' => 0,
      'snippet' => 'use FetchIt\\FetchIt;

/** @var modX $modx */
/** @var FetchIt $FetchIt */
/** @var array $scriptProperties */

require_once MODX_CORE_PATH . \'components/fetchit/src/FetchIt.php\';
$FetchIt = new FetchIt($modx, $scriptProperties);

$snippet = $modx->getOption(\'snippet\', $scriptProperties, \'FormIt\', true);
$tpl = $modx->getOption(\'form\', $scriptProperties, \'tpl.FetchIt.example\', true);

/** @var pdoTools $pdo */
if ($pdo =
    $modx->services->has(\'pdoTools\') ?
    $modx->services->get(\'pdoTools\') :
    false
) {
    $content = $pdo->getChunk($tpl, $scriptProperties);
} else {
    $content = $modx->getChunk($tpl, $scriptProperties);
}
if (empty($content)) {
    return $modx->lexicon(\'fetchit_err_chunk_nf\', array(\'name\' => $tpl));
}

// Add method = post
if (preg_match(\'#<form.*?method=(?:"|\\\')(.*?)(?:"|\\\')#i\', $content)) {
    $content = preg_replace(\'#<form(.*?)method=(?:"|\\\')(.*?)(?:"|\\\')#i\', \'<form\\\\1method="post"\', $content);
} else {
    $content = str_ireplace(\'<form\', \'<form method="post"\', $content);
}

// Add action for form processing
$action = md5(http_build_query($scriptProperties));
// Add selector to tag form
if (preg_match(\'#<form.*?data-fetchit=(?:"|\\\')(.*?)(?:"|\\\')#i\', $content, $matches)) {
    $content = preg_replace(\'#<form(.*?)data-fetchit=(?:"|\\\')(.*?)(?:"|\\\')#i\', \'<form\\\\data-fetchit="$action"\', $content);
} else {
    $content = str_ireplace(\'<form\', \'<form data-fetchit="\' . $action . \'"\', $content);
}

$FetchIt->loadScript($action);

// Save snippet properties
if (!empty(session_id())) {
    // ... to user`s session
    $_SESSION[\'FetchIt\'][$action] = $scriptProperties;
} else {
    // ... to cache file
    $modx->cacheManager->set(\'fetchit/props_\' . $action, $scriptProperties, 3600);
}

// Call snippet for preparation of form
$action = !empty($_SERVER[\'HTTP_X_FETCHIT_ACTION\'])
    ? $_SERVER[\'HTTP_X_FETCHIT_ACTION\']
    : $action;

$FetchIt->process($action, $_REQUEST);

// Return chunk
return $content;',
      'locked' => 0,
      'properties' => 'a:4:{s:4:"form";a:7:{s:4:"name";s:4:"form";s:4:"desc";s:17:"fetchit_prop_form";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:19:"tpl.FetchIt.example";s:7:"lexicon";s:18:"fetchit:properties";s:4:"area";s:0:"";}s:7:"snippet";a:7:{s:4:"name";s:7:"snippet";s:4:"desc";s:20:"fetchit_prop_snippet";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:6:"FormIt";s:7:"lexicon";s:18:"fetchit:properties";s:4:"area";s:0:"";}s:9:"actionUrl";a:7:{s:4:"name";s:9:"actionUrl";s:4:"desc";s:22:"fetchit_prop_actionUrl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:24:"[[+assetsUrl]]action.php";s:7:"lexicon";s:18:"fetchit:properties";s:4:"area";s:0:"";}s:20:"clearFieldsOnSuccess";a:7:{s:4:"name";s:20:"clearFieldsOnSuccess";s:4:"desc";s:33:"fetchit_prop_clearFieldsOnSuccess";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:18:"fetchit:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/fetchit/elements/snippets/fetchit.php',
      'content' => 'use FetchIt\\FetchIt;

/** @var modX $modx */
/** @var FetchIt $FetchIt */
/** @var array $scriptProperties */

require_once MODX_CORE_PATH . \'components/fetchit/src/FetchIt.php\';
$FetchIt = new FetchIt($modx, $scriptProperties);

$snippet = $modx->getOption(\'snippet\', $scriptProperties, \'FormIt\', true);
$tpl = $modx->getOption(\'form\', $scriptProperties, \'tpl.FetchIt.example\', true);

/** @var pdoTools $pdo */
if ($pdo =
    $modx->services->has(\'pdoTools\') ?
    $modx->services->get(\'pdoTools\') :
    false
) {
    $content = $pdo->getChunk($tpl, $scriptProperties);
} else {
    $content = $modx->getChunk($tpl, $scriptProperties);
}
if (empty($content)) {
    return $modx->lexicon(\'fetchit_err_chunk_nf\', array(\'name\' => $tpl));
}

// Add method = post
if (preg_match(\'#<form.*?method=(?:"|\\\')(.*?)(?:"|\\\')#i\', $content)) {
    $content = preg_replace(\'#<form(.*?)method=(?:"|\\\')(.*?)(?:"|\\\')#i\', \'<form\\\\1method="post"\', $content);
} else {
    $content = str_ireplace(\'<form\', \'<form method="post"\', $content);
}

// Add action for form processing
$action = md5(http_build_query($scriptProperties));
// Add selector to tag form
if (preg_match(\'#<form.*?data-fetchit=(?:"|\\\')(.*?)(?:"|\\\')#i\', $content, $matches)) {
    $content = preg_replace(\'#<form(.*?)data-fetchit=(?:"|\\\')(.*?)(?:"|\\\')#i\', \'<form\\\\data-fetchit="$action"\', $content);
} else {
    $content = str_ireplace(\'<form\', \'<form data-fetchit="\' . $action . \'"\', $content);
}

$FetchIt->loadScript($action);

// Save snippet properties
if (!empty(session_id())) {
    // ... to user`s session
    $_SESSION[\'FetchIt\'][$action] = $scriptProperties;
} else {
    // ... to cache file
    $modx->cacheManager->set(\'fetchit/props_\' . $action, $scriptProperties, 3600);
}

// Call snippet for preparation of form
$action = !empty($_SERVER[\'HTTP_X_FETCHIT_ACTION\'])
    ? $_SERVER[\'HTTP_X_FETCHIT_ACTION\']
    : $action;

$FetchIt->process($action, $_REQUEST);

// Return chunk
return $content;',
    ),
  ),
  '8abe1464ee194668f64ef437dc39ead8' => 
  array (
    'criteria' => 
    array (
      'name' => 'FetchIt',
    ),
    'object' => 
    array (
      'id' => 2,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'FetchIt',
      'description' => '',
      'editor_type' => 0,
      'category' => 1,
      'cache_type' => 0,
      'plugincode' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var FetchIt $FetchIt */

switch ($modx->event->name) {
    case \'OnWebPagePrerender\':
        if ($FetchIt = $modx->services->get(\'FetchIt\')) {
            $FetchIt->registerScript();
        }

        break;
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/fetchit/elements/plugins/fetchit.php',
      'content' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var FetchIt $FetchIt */

switch ($modx->event->name) {
    case \'OnWebPagePrerender\':
        if ($FetchIt = $modx->services->get(\'FetchIt\')) {
            $FetchIt->registerScript();
        }

        break;
}',
    ),
  ),
  '0491d0c35afc7f17310513b9f26328e4' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 2,
      'event' => 'OnWebPagePrerender',
    ),
    'object' => 
    array (
      'pluginid' => 2,
      'event' => 'OnWebPagePrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);