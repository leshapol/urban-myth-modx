<?php return array (
  'ccdade6429b04939e06b6eb4dcf11358' => 
  array (
    'criteria' => 
    array (
      'name' => 'migx',
    ),
    'object' => 
    array (
      'name' => 'migx',
      'path' => '{core_path}components/migx/',
      'assets_path' => '{assets_path}components/migx/',
    ),
  ),
  '74305d01f00de2325e208e127ce44388' => 
  array (
    'criteria' => 
    array (
      'category' => 'MIGX',
    ),
    'object' => 
    array (
      'id' => 7,
      'parent' => 0,
      'category' => 'MIGX',
      'rank' => 0,
    ),
  ),
  'a850e2b71e5425930a00f50cf422cc05' => 
  array (
    'criteria' => 
    array (
      'name' => 'getImageList',
    ),
    'object' => 
    array (
      'id' => 19,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getImageList',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '/**
 * getImageList
 *
 * Copyright 2009-2014 by Bruno Perner <b.perner@gmx.de>
 *
 * getImageList is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getImageList is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getImageList; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getImageList
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.4
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2009-2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: <ul>[[!getImageList? &tvname=`myTV`&tpl=`@CODE:<li>[[+idx]]<img src="[[+imageURL]]"/><p>[[+imageAlt]]</p></li>`]]</ul>*/
/* get default properties */

$allow_request = (bool)$modx->getOption(\'allowRequest\', $scriptProperties, false);
$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$inherit_children_tvname = $modx->getOption(\'inherit_children_tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$wrapperTpl = $modx->getOption(\'wrapperTpl\', $scriptProperties, \'\');
$emptyTpl = $modx->getOption(\'emptyTpl\', $scriptProperties, \'\'); 
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
if ($allow_request) {
    $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
}
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
if ($allow_request) {
    $docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
}
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');
$reverse = $modx->getOption(\'reverse\', $scriptProperties, \'0\');
$sumFields = $modx->getOption(\'sumFields\', $scriptProperties, \'\');
$sumPrefix = $modx->getOption(\'sumPrefix\', $scriptProperties, \'summary_\');
$addfields = $modx->getOption(\'addfields\', $scriptProperties, \'\');
$addfields = !empty($addfields) ? explode(\',\', $addfields) : null;
//split json into parts
$splits = $modx->fromJson($modx->getOption(\'splits\', $scriptProperties, 0));
$splitTpl = $modx->getOption(\'splitTpl\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');
$inheritFrom = $modx->getOption(\'inheritFrom\', $scriptProperties, \'\'); //commaseparated list of resource-ids or/and the keyword \'parents\' where to inherit from
$inheritFrom = !empty($inheritFrom) ? explode(\',\', $inheritFrom) : \'\';

$modx->setPlaceholder(\'docid\', $docid);

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : \'web\';

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $modx->getOption(\'configs\', $properties, \'\');
        if (!empty($migx->config[\'configs\'])) {
            $migx->loadConfigs();
            // get tabs from file or migx-config-table
            $formtabs = $migx->getTabs();
        }
        if (empty($formtabs) && isset($properties[\'formtabs\'])) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        if (!empty($properties[\'basePath\'])) {
            if ($properties[\'autoResourceFolders\'] == \'true\') {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'basePath\'] . $docid . \'/\';
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'] . $docid . \'/\';
            } else {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'base_path\'];
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'];
            }
        }
        if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\'])) {
            $jsonVarKey = $properties[\'jsonvarkey\'];
            $outputvalue = $allow_request && isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
        }

        if (empty($outputvalue)) {
            $outputvalue = $tv->renderOutput($docid);
            if (empty($outputvalue) && !empty($inheritFrom)) {
                foreach ($inheritFrom as $from) {
                    if ($from == \'parents\') {
                        if (!empty($inherit_children_tvname)){
                            //try to get items from optional MIGX-TV for children
                            if ($inh_tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inherit_children_tvname))) {
                                $outputvalue = $inh_tv->processInheritBinding(\'\', $docid);    
                            }
                        }
                        $outputvalue = empty($outputvalue) ? $tv->processInheritBinding(\'\', $docid) : $outputvalue;
                    } else {
                        $outputvalue = $tv->renderOutput($from);
                    }
                    if (!empty($outputvalue)) {
                        break;
                    }
                }
            }
        }


        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        if ($migx->source = $tv->getSource($migx->working_context, false)) {
            $migx->source->initialize();
        }

    }


}

if (empty($outputvalue)) {
    $modx->setPlaceholder($totalVar, 0);
    return \'\';
}

//echo $outputvalue.\'<br/><br/>\';

$items = $modx->fromJSON($outputvalue);

// where filter
if (is_array($where) && count($where) > 0) {
    $items = $migx->filterItems($where, $items);
}
$modx->setPlaceholder($totalVar, count($items));

if (!empty($reverse)) {
    $items = array_reverse($items);
}

// sort items
if (is_array($sort) && count($sort) > 0) {
    $items = $migx->sortDbResult($items, $sort);
}

$summaries = array();
$output = \'\';
$items = $offset > 0 ? array_slice($items, $offset) : $items;
$count = count($items);

if ($count > 0) {
    $limit = $limit == 0 || $limit > $count ? $count : $limit;
    $preselectLimit = $preselectLimit > $count ? $count : $preselectLimit;
    //preselect important items
    $preitems = array();
    if ($randomize && $preselectLimit > 0) {
        for ($i = 0; $i < $preselectLimit; $i++) {
            $preitems[] = $items[$i];
            unset($items[$i]);
        }
        $limit = $limit - count($preitems);
    }

    //shuffle items
    if ($randomize) {
        shuffle($items);
    }

    //limit items
    $count = count($items);
    $tempitems = array();

    for ($i = 0; $i < $limit; $i++) {
        if ($i >= $count) {
            break;
        }
        $tempitems[] = $items[$i];
    }
    $items = $tempitems;

    //add preselected items and schuffle again
    if ($randomize && $preselectLimit > 0) {
        $items = array_merge($preitems, $items);
        shuffle($items);
    }

    $properties = array();
    foreach ($scriptProperties as $property => $value) {
        $properties[\'property.\' . $property] = $value;
    }

    $idx = 0;
    $output = array();
    $template = array();
    $count = count($items);

    foreach ($items as $key => $item) {
        $formname = isset($item[\'MIGX_formname\']) ? $item[\'MIGX_formname\'] . \'_\' : \'\';
        $fields = array();
        foreach ($item as $field => $value) {
            if (is_array($value)) {
                if (is_array($value[0])) {
                    //nested array - convert to json
                    $value = $modx->toJson($value);
                } else {
                    $value = implode(\'||\', $value); //handle arrays (checkboxes, multiselects)
                }
            }


            $inputTVkey = $formname . $field;

            if ($processTVs && isset($inputTvs[$inputTVkey])) {
                if (isset($inputTvs[$inputTVkey][\'inputTV\']) && $tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$inputTVkey][\'inputTV\']))) {

                } else {
                    $tv = $modx->newObject(\'modTemplateVar\');
                    $tv->set(\'type\', $inputTvs[$inputTVkey][\'inputTVtype\']);
                }
                $inputTV = $inputTvs[$inputTVkey];

                $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
                //don\'t manipulate any urls here
                $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
                $tv->set(\'default_text\', $value);

                // $value = $tv->renderOutput($docid); breaks if the TV used in MIGX is also assigned to this Template,
                // example tv: imageLogo is assigned to the template and imageLogo is assigned to the MIGX TV as a result
                // only the value of the imageLogo is returned for the MIGX TV instance
                // need to override default MODX method: $value = $tv->renderOutput($docid);
                /* process any TV commands in value */
                $tv_value = $tv->processBindings($value, $docid);
                $params = $tv->get(\'output_properties\');
                if (empty($params) || $params === null) {
                    $params = [];
                }
                /* run prepareOutput to allow for custom overriding */
                $tv_value = $tv->prepareOutput($tv_value, $docid);
                /* find the render */
                $outputRenderPaths = $tv->getRenderDirectories(\'OnTVOutputRenderList\',\'output\');
                $value = $tv->getRender($params, $tv_value, $outputRenderPaths, \'output\', $docid, $tv->get(\'display\'));
                // End override of $value = $tv->renderOutput($docid);
				
                //set option back
                $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
                //now manipulate urls
                if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                    $mTypes = explode(\',\', $mTypes);
                    if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                        //$value = $mediasource->prepareOutputUrl($value);
                        $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                    }
                }

            }
            $fields[$field] = $value;

        }

        if (!empty($addfields)) {
            foreach ($addfields as $addfield) {
                $addfield = explode(\':\', $addfield);
                $addname = $addfield[0];
                $adddefault = isset($addfield[1]) ? $addfield[1] : \'\';
                $fields[$addname] = $adddefault;
            }
        }

        if (!empty($sumFields)) {
            $sumFields = is_array($sumFields) ? $sumFields : explode(\',\', $sumFields);
            foreach ($sumFields as $sumField) {
                if (isset($fields[$sumField])) {
                    $summaries[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField] + $fields[$sumField];
                    $fields[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField];
                }
            }
        }


        if ($toJsonPlaceholder) {
            $output[] = $fields;
        } else {
            $fields[\'_alt\'] = $idx % 2;
            $idx++;
            $fields[\'_first\'] = $idx == 1 ? true : \'\';
            $fields[\'_last\'] = $idx == $limit ? true : \'\';
            $fields[\'idx\'] = $idx;
            $rowtpl = \'\';
            //get changing tpls from field
            if (substr($tpl, 0, 7) == "@FIELD:") {
                $tplField = substr($tpl, 7);
                $rowtpl = $fields[$tplField];
            }

            if ($fields[\'_first\'] && !empty($tplFirst)) {
                $rowtpl = $tplFirst;
            }
            if ($fields[\'_last\'] && empty($rowtpl) && !empty($tplLast)) {
                $rowtpl = $tplLast;
            }
            $tplidx = \'tpl_\' . $idx;
            if (empty($rowtpl) && !empty($$tplidx)) {
                $rowtpl = $$tplidx;
            }
            if ($idx > 1 && empty($rowtpl)) {
                $divisors = $migx->getDivisors($idx);
                if (!empty($divisors)) {
                    foreach ($divisors as $divisor) {
                        $tplnth = \'tpl_n\' . $divisor;
                        if (!empty($$tplnth)) {
                            $rowtpl = $$tplnth;
                            if (!empty($rowtpl)) {
                                break;
                            }
                        }
                    }
                }
            }

            if ($count == 1 && isset($tpl_oneresult)) {
                $rowtpl = $tpl_oneresult;
            }

            $fields = array_merge($fields, $properties);

            if (!empty($rowtpl)) {
                $template = $migx->getTemplate($tpl, $template);
                $fields[\'_tpl\'] = $template[$tpl];
            } else {
                $rowtpl = $tpl;

            }
            $template = $migx->getTemplate($rowtpl, $template);


            if ($template[$rowtpl]) {
                $chunk = $modx->newObject(\'modChunk\');
                $chunk->setCacheable(false);
                $chunk->setContent($template[$rowtpl]);


                if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField])) {
                    $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
                } else {
                    $output[] = $chunk->process($fields);
                }
            } else {
                if (!empty($placeholdersKeyField)) {
                    $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                } else {
                    $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                }
            }
        }


    }
}

if (count($summaries) > 0) {
    $modx->toPlaceholders($summaries);
}


if ($toJsonPlaceholder) {
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders)) {
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/

if ($count > 0 && $splits > 0) {
    $size = ceil($count / $splits);
    $chunks = array_chunk($output, $size);
    $output = array();
    foreach ($chunks as $chunk) {
        $o = implode($outputSeparator, $chunk);
        $output[] = $modx->getChunk($splitTpl, array(\'output\' => $o));
    }
    $outputSeparator = $splitSeparator;
}

if (is_array($output)) {
    $o = implode($outputSeparator, $output);
} else {
    $o = $output;
}

if (!empty($o) && !empty($wrapperTpl)) {
    $template = $migx->getTemplate($wrapperTpl);
    if ($template[$wrapperTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$wrapperTpl]);
        $properties[\'output\'] = $o;
        $o = $chunk->process($properties);
    }
}

if (empty($o) && !empty($emptyTpl)) {
    $template = $migx->getTemplate($emptyTpl);
    if ($template[$emptyTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$emptyTpl]);
        $o = $chunk->process($properties);
    }
}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * getImageList
 *
 * Copyright 2009-2014 by Bruno Perner <b.perner@gmx.de>
 *
 * getImageList is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getImageList is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getImageList; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getImageList
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.4
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2009-2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: <ul>[[!getImageList? &tvname=`myTV`&tpl=`@CODE:<li>[[+idx]]<img src="[[+imageURL]]"/><p>[[+imageAlt]]</p></li>`]]</ul>*/
/* get default properties */

$allow_request = (bool)$modx->getOption(\'allowRequest\', $scriptProperties, false);
$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$inherit_children_tvname = $modx->getOption(\'inherit_children_tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$wrapperTpl = $modx->getOption(\'wrapperTpl\', $scriptProperties, \'\');
$emptyTpl = $modx->getOption(\'emptyTpl\', $scriptProperties, \'\'); 
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
if ($allow_request) {
    $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
}
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
if ($allow_request) {
    $docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
}
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');
$reverse = $modx->getOption(\'reverse\', $scriptProperties, \'0\');
$sumFields = $modx->getOption(\'sumFields\', $scriptProperties, \'\');
$sumPrefix = $modx->getOption(\'sumPrefix\', $scriptProperties, \'summary_\');
$addfields = $modx->getOption(\'addfields\', $scriptProperties, \'\');
$addfields = !empty($addfields) ? explode(\',\', $addfields) : null;
//split json into parts
$splits = $modx->fromJson($modx->getOption(\'splits\', $scriptProperties, 0));
$splitTpl = $modx->getOption(\'splitTpl\', $scriptProperties, \'\');
$splitSeparator = $modx->getOption(\'splitSeparator\', $scriptProperties, \'\');
$inheritFrom = $modx->getOption(\'inheritFrom\', $scriptProperties, \'\'); //commaseparated list of resource-ids or/and the keyword \'parents\' where to inherit from
$inheritFrom = !empty($inheritFrom) ? explode(\',\', $inheritFrom) : \'\';

$modx->setPlaceholder(\'docid\', $docid);

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : \'web\';

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $modx->getOption(\'configs\', $properties, \'\');
        if (!empty($migx->config[\'configs\'])) {
            $migx->loadConfigs();
            // get tabs from file or migx-config-table
            $formtabs = $migx->getTabs();
        }
        if (empty($formtabs) && isset($properties[\'formtabs\'])) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        if (!empty($properties[\'basePath\'])) {
            if ($properties[\'autoResourceFolders\'] == \'true\') {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'basePath\'] . $docid . \'/\';
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'] . $docid . \'/\';
            } else {
                $scriptProperties[\'base_path\'] = $base_path . $properties[\'base_path\'];
                $scriptProperties[\'base_url\'] = $base_url . $properties[\'basePath\'];
            }
        }
        if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\'])) {
            $jsonVarKey = $properties[\'jsonvarkey\'];
            $outputvalue = $allow_request && isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
        }

        if (empty($outputvalue)) {
            $outputvalue = $tv->renderOutput($docid);
            if (empty($outputvalue) && !empty($inheritFrom)) {
                foreach ($inheritFrom as $from) {
                    if ($from == \'parents\') {
                        if (!empty($inherit_children_tvname)){
                            //try to get items from optional MIGX-TV for children
                            if ($inh_tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inherit_children_tvname))) {
                                $outputvalue = $inh_tv->processInheritBinding(\'\', $docid);    
                            }
                        }
                        $outputvalue = empty($outputvalue) ? $tv->processInheritBinding(\'\', $docid) : $outputvalue;
                    } else {
                        $outputvalue = $tv->renderOutput($from);
                    }
                    if (!empty($outputvalue)) {
                        break;
                    }
                }
            }
        }


        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        if ($migx->source = $tv->getSource($migx->working_context, false)) {
            $migx->source->initialize();
        }

    }


}

if (empty($outputvalue)) {
    $modx->setPlaceholder($totalVar, 0);
    return \'\';
}

//echo $outputvalue.\'<br/><br/>\';

$items = $modx->fromJSON($outputvalue);

// where filter
if (is_array($where) && count($where) > 0) {
    $items = $migx->filterItems($where, $items);
}
$modx->setPlaceholder($totalVar, count($items));

if (!empty($reverse)) {
    $items = array_reverse($items);
}

// sort items
if (is_array($sort) && count($sort) > 0) {
    $items = $migx->sortDbResult($items, $sort);
}

$summaries = array();
$output = \'\';
$items = $offset > 0 ? array_slice($items, $offset) : $items;
$count = count($items);

if ($count > 0) {
    $limit = $limit == 0 || $limit > $count ? $count : $limit;
    $preselectLimit = $preselectLimit > $count ? $count : $preselectLimit;
    //preselect important items
    $preitems = array();
    if ($randomize && $preselectLimit > 0) {
        for ($i = 0; $i < $preselectLimit; $i++) {
            $preitems[] = $items[$i];
            unset($items[$i]);
        }
        $limit = $limit - count($preitems);
    }

    //shuffle items
    if ($randomize) {
        shuffle($items);
    }

    //limit items
    $count = count($items);
    $tempitems = array();

    for ($i = 0; $i < $limit; $i++) {
        if ($i >= $count) {
            break;
        }
        $tempitems[] = $items[$i];
    }
    $items = $tempitems;

    //add preselected items and schuffle again
    if ($randomize && $preselectLimit > 0) {
        $items = array_merge($preitems, $items);
        shuffle($items);
    }

    $properties = array();
    foreach ($scriptProperties as $property => $value) {
        $properties[\'property.\' . $property] = $value;
    }

    $idx = 0;
    $output = array();
    $template = array();
    $count = count($items);

    foreach ($items as $key => $item) {
        $formname = isset($item[\'MIGX_formname\']) ? $item[\'MIGX_formname\'] . \'_\' : \'\';
        $fields = array();
        foreach ($item as $field => $value) {
            if (is_array($value)) {
                if (is_array($value[0])) {
                    //nested array - convert to json
                    $value = $modx->toJson($value);
                } else {
                    $value = implode(\'||\', $value); //handle arrays (checkboxes, multiselects)
                }
            }


            $inputTVkey = $formname . $field;

            if ($processTVs && isset($inputTvs[$inputTVkey])) {
                if (isset($inputTvs[$inputTVkey][\'inputTV\']) && $tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$inputTVkey][\'inputTV\']))) {

                } else {
                    $tv = $modx->newObject(\'modTemplateVar\');
                    $tv->set(\'type\', $inputTvs[$inputTVkey][\'inputTVtype\']);
                }
                $inputTV = $inputTvs[$inputTVkey];

                $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
                //don\'t manipulate any urls here
                $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
                $tv->set(\'default_text\', $value);

                // $value = $tv->renderOutput($docid); breaks if the TV used in MIGX is also assigned to this Template,
                // example tv: imageLogo is assigned to the template and imageLogo is assigned to the MIGX TV as a result
                // only the value of the imageLogo is returned for the MIGX TV instance
                // need to override default MODX method: $value = $tv->renderOutput($docid);
                /* process any TV commands in value */
                $tv_value = $tv->processBindings($value, $docid);
                $params = $tv->get(\'output_properties\');
                if (empty($params) || $params === null) {
                    $params = [];
                }
                /* run prepareOutput to allow for custom overriding */
                $tv_value = $tv->prepareOutput($tv_value, $docid);
                /* find the render */
                $outputRenderPaths = $tv->getRenderDirectories(\'OnTVOutputRenderList\',\'output\');
                $value = $tv->getRender($params, $tv_value, $outputRenderPaths, \'output\', $docid, $tv->get(\'display\'));
                // End override of $value = $tv->renderOutput($docid);
				
                //set option back
                $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
                //now manipulate urls
                if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                    $mTypes = explode(\',\', $mTypes);
                    if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                        //$value = $mediasource->prepareOutputUrl($value);
                        $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                    }
                }

            }
            $fields[$field] = $value;

        }

        if (!empty($addfields)) {
            foreach ($addfields as $addfield) {
                $addfield = explode(\':\', $addfield);
                $addname = $addfield[0];
                $adddefault = isset($addfield[1]) ? $addfield[1] : \'\';
                $fields[$addname] = $adddefault;
            }
        }

        if (!empty($sumFields)) {
            $sumFields = is_array($sumFields) ? $sumFields : explode(\',\', $sumFields);
            foreach ($sumFields as $sumField) {
                if (isset($fields[$sumField])) {
                    $summaries[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField] + $fields[$sumField];
                    $fields[$sumPrefix . $sumField] = $summaries[$sumPrefix . $sumField];
                }
            }
        }


        if ($toJsonPlaceholder) {
            $output[] = $fields;
        } else {
            $fields[\'_alt\'] = $idx % 2;
            $idx++;
            $fields[\'_first\'] = $idx == 1 ? true : \'\';
            $fields[\'_last\'] = $idx == $limit ? true : \'\';
            $fields[\'idx\'] = $idx;
            $rowtpl = \'\';
            //get changing tpls from field
            if (substr($tpl, 0, 7) == "@FIELD:") {
                $tplField = substr($tpl, 7);
                $rowtpl = $fields[$tplField];
            }

            if ($fields[\'_first\'] && !empty($tplFirst)) {
                $rowtpl = $tplFirst;
            }
            if ($fields[\'_last\'] && empty($rowtpl) && !empty($tplLast)) {
                $rowtpl = $tplLast;
            }
            $tplidx = \'tpl_\' . $idx;
            if (empty($rowtpl) && !empty($$tplidx)) {
                $rowtpl = $$tplidx;
            }
            if ($idx > 1 && empty($rowtpl)) {
                $divisors = $migx->getDivisors($idx);
                if (!empty($divisors)) {
                    foreach ($divisors as $divisor) {
                        $tplnth = \'tpl_n\' . $divisor;
                        if (!empty($$tplnth)) {
                            $rowtpl = $$tplnth;
                            if (!empty($rowtpl)) {
                                break;
                            }
                        }
                    }
                }
            }

            if ($count == 1 && isset($tpl_oneresult)) {
                $rowtpl = $tpl_oneresult;
            }

            $fields = array_merge($fields, $properties);

            if (!empty($rowtpl)) {
                $template = $migx->getTemplate($tpl, $template);
                $fields[\'_tpl\'] = $template[$tpl];
            } else {
                $rowtpl = $tpl;

            }
            $template = $migx->getTemplate($rowtpl, $template);


            if ($template[$rowtpl]) {
                $chunk = $modx->newObject(\'modChunk\');
                $chunk->setCacheable(false);
                $chunk->setContent($template[$rowtpl]);


                if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField])) {
                    $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
                } else {
                    $output[] = $chunk->process($fields);
                }
            } else {
                if (!empty($placeholdersKeyField)) {
                    $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                } else {
                    $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
                }
            }
        }


    }
}

if (count($summaries) > 0) {
    $modx->toPlaceholders($summaries);
}


if ($toJsonPlaceholder) {
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders)) {
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/

if ($count > 0 && $splits > 0) {
    $size = ceil($count / $splits);
    $chunks = array_chunk($output, $size);
    $output = array();
    foreach ($chunks as $chunk) {
        $o = implode($outputSeparator, $chunk);
        $output[] = $modx->getChunk($splitTpl, array(\'output\' => $o));
    }
    $outputSeparator = $splitSeparator;
}

if (is_array($output)) {
    $o = implode($outputSeparator, $output);
} else {
    $o = $output;
}

if (!empty($o) && !empty($wrapperTpl)) {
    $template = $migx->getTemplate($wrapperTpl);
    if ($template[$wrapperTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$wrapperTpl]);
        $properties[\'output\'] = $o;
        $o = $chunk->process($properties);
    }
}

if (empty($o) && !empty($emptyTpl)) {
    $template = $migx->getTemplate($emptyTpl);
    if ($template[$emptyTpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$emptyTpl]);
        $o = $chunk->process($properties);
    }
}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
    ),
  ),
  '61f693fe7ec2b52ef9e634fe38fc3f38' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxGetRelations',
    ),
    'object' => 
    array (
      'id' => 20,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxGetRelations',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$id = $modx->getOption(\'id\', $scriptProperties, $modx->resource->get(\'id\'));
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, \'\');
$element = $modx->getOption(\'element\', $scriptProperties, \'getResources\');
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \',\');
$sourceWhere = $modx->getOption(\'sourceWhere\', $scriptProperties, \'\');
$ignoreRelationIfEmpty = $modx->getOption(\'ignoreRelationIfEmpty\', $scriptProperties, false);
$inheritFromParents = $modx->getOption(\'inheritFromParents\', $scriptProperties, false);
$parentIDs = $inheritFromParents ? array_merge(array($id), $modx->getParentIds($id)) : array($id);

$packageName = \'resourcerelations\';

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$classname = \'rrResourceRelation\';
$output = \'\';

foreach ($parentIDs as $id) {
    if (!empty($id)) {
        $output = \'\';
                
        $c = $modx->newQuery($classname, array(\'target_id\' => $id, \'published\' => \'1\'));
        $c->select($modx->getSelectColumns($classname, $c->getAlias()));

        if (!empty($sourceWhere)) {
            $sourceWhere_ar = $modx->fromJson($sourceWhere);
            if (is_array($sourceWhere_ar)) {
                $where = array();
                foreach ($sourceWhere_ar as $key => $value) {
                    $where[\'Source.\' . $key] = $value;
                }
                $joinclass = \'modResource\';
                $joinalias = \'Source\';
                $selectfields = \'id\';
                $selectfields = !empty($selectfields) ? explode(\',\', $selectfields) : null;
                $c->leftjoin($joinclass, $joinalias);
                $c->select($modx->getSelectColumns($joinclass, $joinalias, $joinalias . \'_\', $selectfields));
                $c->where($where);
            }
        }

        //$c->prepare(); echo $c->toSql();
        if ($c->prepare() && $c->stmt->execute()) {
            $collection = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        foreach ($collection as $row) {
            $ids[] = $row[\'source_id\'];
        }
        $output = implode($outputSeparator, $ids);
    }
    if (!empty($output)){
        break;
    }
}


if (!empty($element)) {
    if (empty($output) && $ignoreRelationIfEmpty) {
        return $modx->runSnippet($element, $scriptProperties);
    } else {
        $scriptProperties[\'resources\'] = $output;
        $scriptProperties[\'parents\'] = \'9999999\';
        return $modx->runSnippet($element, $scriptProperties);
    }


}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$id = $modx->getOption(\'id\', $scriptProperties, $modx->resource->get(\'id\'));
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, \'\');
$element = $modx->getOption(\'element\', $scriptProperties, \'getResources\');
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \',\');
$sourceWhere = $modx->getOption(\'sourceWhere\', $scriptProperties, \'\');
$ignoreRelationIfEmpty = $modx->getOption(\'ignoreRelationIfEmpty\', $scriptProperties, false);
$inheritFromParents = $modx->getOption(\'inheritFromParents\', $scriptProperties, false);
$parentIDs = $inheritFromParents ? array_merge(array($id), $modx->getParentIds($id)) : array($id);

$packageName = \'resourcerelations\';

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$classname = \'rrResourceRelation\';
$output = \'\';

foreach ($parentIDs as $id) {
    if (!empty($id)) {
        $output = \'\';
                
        $c = $modx->newQuery($classname, array(\'target_id\' => $id, \'published\' => \'1\'));
        $c->select($modx->getSelectColumns($classname, $c->getAlias()));

        if (!empty($sourceWhere)) {
            $sourceWhere_ar = $modx->fromJson($sourceWhere);
            if (is_array($sourceWhere_ar)) {
                $where = array();
                foreach ($sourceWhere_ar as $key => $value) {
                    $where[\'Source.\' . $key] = $value;
                }
                $joinclass = \'modResource\';
                $joinalias = \'Source\';
                $selectfields = \'id\';
                $selectfields = !empty($selectfields) ? explode(\',\', $selectfields) : null;
                $c->leftjoin($joinclass, $joinalias);
                $c->select($modx->getSelectColumns($joinclass, $joinalias, $joinalias . \'_\', $selectfields));
                $c->where($where);
            }
        }

        //$c->prepare(); echo $c->toSql();
        if ($c->prepare() && $c->stmt->execute()) {
            $collection = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        foreach ($collection as $row) {
            $ids[] = $row[\'source_id\'];
        }
        $output = implode($outputSeparator, $ids);
    }
    if (!empty($output)){
        break;
    }
}


if (!empty($element)) {
    if (empty($output) && $ignoreRelationIfEmpty) {
        return $modx->runSnippet($element, $scriptProperties);
    } else {
        $scriptProperties[\'resources\'] = $output;
        $scriptProperties[\'parents\'] = \'9999999\';
        return $modx->runSnippet($element, $scriptProperties);
    }


}

if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
    ),
  ),
  '7500e02195165d3426289d1a5b4cf6e1' => 
  array (
    'criteria' => 
    array (
      'name' => 'migx',
    ),
    'object' => 
    array (
      'id' => 21,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migx',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sortConfig = $modx->getOption(\'sortConfig\', $scriptProperties, \'\');
$sortConfig = !empty($sortConfig) ? $modx->fromJSON($sortConfig) : array();
$configs = $modx->getOption(\'configs\', $scriptProperties, \'\');
$configs = !empty($configs) ? explode(\',\',$configs):array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
//$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
$outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;
$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

if (!empty($tvname))
{
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname)))
    {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'configs\']) ? $properties : $tv->getProperties();
        $cfgs = $modx->getOption(\'configs\',$properties,\'\');
        if (!empty($cfgs)){
            $cfgs = explode(\',\',$cfgs);
            $configs = array_merge($configs,$cfgs);
           
        }
        
    }
}



//$migx->config[\'configs\'] = implode(\',\',$configs);
$migx->loadConfigs(false,true,array(\'configs\'=>implode(\',\',$configs)));
$migx->customconfigs = array_merge($migx->customconfigs,$scriptProperties);



// get tabs from file or migx-config-table
$formtabs = $migx->getTabs();
if (empty($formtabs))
{
    //try to get formtabs and its fields from properties
    $formtabs = $modx->fromJSON($properties[\'formtabs\']);
}

if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\']))
{
    $jsonVarKey = $properties[\'jsonvarkey\'];
    $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
}

$outputvalue = $tv && empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
/*
*   get inputTvs 
*/
$inputTvs = array();
if (is_array($formtabs))
{

    //multiple different Forms
    // Note: use same field-names and inputTVs in all forms
    $inputTvs = $migx->extractInputTvs($formtabs);
}

if ($tv)
{
    $migx->source = $tv->getSource($migx->working_context, false);
}

//$task = $modx->migx->getTask();
$filename = \'getlist.php\';
$processorspath = $migx->config[\'processorsPath\'] . \'mgr/\';
$filenames = array();
$scriptProperties[\'start\'] = $modx->getOption(\'offset\', $scriptProperties, 0);
if ($processor_file = $migx->findProcessor($processorspath, $filename, $filenames))
{
    include ($processor_file);
    //todo: add getlist-processor for default-MIGX-TV
}

$items = isset($rows) && is_array($rows) ? $rows : array();
$modx->setPlaceholder($totalVar, isset($count) ? $count : 0);

$properties = array();
foreach ($scriptProperties as $property => $value)
{
    $properties[\'property.\' . $property] = $value;
}

$idx = 0;
$output = array();
foreach ($items as $key => $item)
{

    $fields = array();
    foreach ($item as $field => $value)
    {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field]))
        {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\'])))
            {

            } else
            {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv))
            {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes))
                {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }
    if ($toJsonPlaceholder)
    {
        $output[] = $fields;
    } else
    {
        $fields[\'_alt\'] = $idx % 2;
        $idx++;
        $fields[\'_first\'] = $idx == 1 ? true : \'\';
        $fields[\'_last\'] = $idx == $limit ? true : \'\';
        $fields[\'idx\'] = $idx;
        $rowtpl = $tpl;
        //get changing tpls from field
        if (substr($tpl, 0, 7) == "@FIELD:")
        {
            $tplField = substr($tpl, 7);
            $rowtpl = $fields[$tplField];
        }

        if (!isset($template[$rowtpl]))
        {
            if (substr($rowtpl, 0, 6) == "@FILE:")
            {
                $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
            } elseif (substr($rowtpl, 0, 6) == "@CODE:")
            {
                $template[$rowtpl] = substr($tpl, 6);
            } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true))
            {
                $template[$rowtpl] = $chunk->getContent();
            } else
            {
                $template[$rowtpl] = false;
            }
        }

        $fields = array_merge($fields, $properties);

        if ($template[$rowtpl])
        {
            $chunk = $modx->newObject(\'modChunk\');
            $chunk->setCacheable(false);
            $chunk->setContent($template[$rowtpl]);
            if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField]))
            {
                $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
            } else
            {
                $output[] = $chunk->process($fields);
            }
        } else
        {
            if (!empty($placeholdersKeyField))
            {
                $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            } else
            {
                $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            }
        }
    }


}


if ($toJsonPlaceholder)
{
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders))
{
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/
if (is_array($output))
{
    $o = implode($outputSeparator, $output);
} else
{
    $o = $output;
}

if (!empty($toPlaceholder))
{
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$limit = $modx->getOption(\'limit\', $scriptProperties, \'0\');
$offset = $modx->getOption(\'offset\', $scriptProperties, 0);
$totalVar = $modx->getOption(\'totalVar\', $scriptProperties, \'total\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$preselectLimit = $modx->getOption(\'preselectLimit\', $scriptProperties, 0); // when random preselect important images
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sortConfig = $modx->getOption(\'sortConfig\', $scriptProperties, \'\');
$sortConfig = !empty($sortConfig) ? $modx->fromJSON($sortConfig) : array();
$configs = $modx->getOption(\'configs\', $scriptProperties, \'\');
$configs = !empty($configs) ? explode(\',\',$configs):array();
$toSeparatePlaceholders = $modx->getOption(\'toSeparatePlaceholders\', $scriptProperties, false);
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, \'\');
//$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'MIGX_id\');
$placeholdersKeyField = $modx->getOption(\'placeholdersKeyField\', $scriptProperties, \'id\');
$toJsonPlaceholder = $modx->getOption(\'toJsonPlaceholder\', $scriptProperties, false);
$jsonVarKey = $modx->getOption(\'jsonVarKey\', $scriptProperties, \'migx_outputvalue\');
$outputvalue = $modx->getOption(\'value\', $scriptProperties, \'\');
$outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
$docidVarKey = $modx->getOption(\'docidVarKey\', $scriptProperties, \'migx_docid\');
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$docid = isset($_REQUEST[$docidVarKey]) ? $_REQUEST[$docidVarKey] : $docid;
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$base_path = $modx->getOption(\'base_path\', null, MODX_BASE_PATH);
$base_url = $modx->getOption(\'base_url\', null, MODX_BASE_URL);

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;
$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

if (!empty($tvname))
{
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname)))
    {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'configs\']) ? $properties : $tv->getProperties();
        $cfgs = $modx->getOption(\'configs\',$properties,\'\');
        if (!empty($cfgs)){
            $cfgs = explode(\',\',$cfgs);
            $configs = array_merge($configs,$cfgs);
           
        }
        
    }
}



//$migx->config[\'configs\'] = implode(\',\',$configs);
$migx->loadConfigs(false,true,array(\'configs\'=>implode(\',\',$configs)));
$migx->customconfigs = array_merge($migx->customconfigs,$scriptProperties);



// get tabs from file or migx-config-table
$formtabs = $migx->getTabs();
if (empty($formtabs))
{
    //try to get formtabs and its fields from properties
    $formtabs = $modx->fromJSON($properties[\'formtabs\']);
}

if ($jsonVarKey == \'migx_outputvalue\' && !empty($properties[\'jsonvarkey\']))
{
    $jsonVarKey = $properties[\'jsonvarkey\'];
    $outputvalue = isset($_REQUEST[$jsonVarKey]) ? $_REQUEST[$jsonVarKey] : $outputvalue;
}

$outputvalue = $tv && empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
/*
*   get inputTvs 
*/
$inputTvs = array();
if (is_array($formtabs))
{

    //multiple different Forms
    // Note: use same field-names and inputTVs in all forms
    $inputTvs = $migx->extractInputTvs($formtabs);
}

if ($tv)
{
    $migx->source = $tv->getSource($migx->working_context, false);
}

//$task = $modx->migx->getTask();
$filename = \'getlist.php\';
$processorspath = $migx->config[\'processorsPath\'] . \'mgr/\';
$filenames = array();
$scriptProperties[\'start\'] = $modx->getOption(\'offset\', $scriptProperties, 0);
if ($processor_file = $migx->findProcessor($processorspath, $filename, $filenames))
{
    include ($processor_file);
    //todo: add getlist-processor for default-MIGX-TV
}

$items = isset($rows) && is_array($rows) ? $rows : array();
$modx->setPlaceholder($totalVar, isset($count) ? $count : 0);

$properties = array();
foreach ($scriptProperties as $property => $value)
{
    $properties[\'property.\' . $property] = $value;
}

$idx = 0;
$output = array();
foreach ($items as $key => $item)
{

    $fields = array();
    foreach ($item as $field => $value)
    {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field]))
        {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\'])))
            {

            } else
            {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv))
            {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes))
                {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }
    if ($toJsonPlaceholder)
    {
        $output[] = $fields;
    } else
    {
        $fields[\'_alt\'] = $idx % 2;
        $idx++;
        $fields[\'_first\'] = $idx == 1 ? true : \'\';
        $fields[\'_last\'] = $idx == $limit ? true : \'\';
        $fields[\'idx\'] = $idx;
        $rowtpl = $tpl;
        //get changing tpls from field
        if (substr($tpl, 0, 7) == "@FIELD:")
        {
            $tplField = substr($tpl, 7);
            $rowtpl = $fields[$tplField];
        }

        if (!isset($template[$rowtpl]))
        {
            if (substr($rowtpl, 0, 6) == "@FILE:")
            {
                $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
            } elseif (substr($rowtpl, 0, 6) == "@CODE:")
            {
                $template[$rowtpl] = substr($tpl, 6);
            } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true))
            {
                $template[$rowtpl] = $chunk->getContent();
            } else
            {
                $template[$rowtpl] = false;
            }
        }

        $fields = array_merge($fields, $properties);

        if ($template[$rowtpl])
        {
            $chunk = $modx->newObject(\'modChunk\');
            $chunk->setCacheable(false);
            $chunk->setContent($template[$rowtpl]);
            if (!empty($placeholdersKeyField) && isset($fields[$placeholdersKeyField]))
            {
                $output[$fields[$placeholdersKeyField]] = $chunk->process($fields);
            } else
            {
                $output[] = $chunk->process($fields);
            }
        } else
        {
            if (!empty($placeholdersKeyField))
            {
                $output[$fields[$placeholdersKeyField]] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            } else
            {
                $output[] = \'<pre>\' . print_r($fields, 1) . \'</pre>\';
            }
        }
    }


}


if ($toJsonPlaceholder)
{
    $modx->setPlaceholder($toJsonPlaceholder, $modx->toJson($output));
    return \'\';
}

if (!empty($toSeparatePlaceholders))
{
    $modx->toPlaceholders($output, $toSeparatePlaceholders);
    return \'\';
}
/*
if (!empty($outerTpl))
$o = parseTpl($outerTpl, array(\'output\'=>implode($outputSeparator, $output)));
else 
*/
if (is_array($output))
{
    $o = implode($outputSeparator, $output);
} else
{
    $o = $output;
}

if (!empty($toPlaceholder))
{
    $modx->setPlaceholder($toPlaceholder, $o);
    return \'\';
}

return $o;',
    ),
  ),
  'b98152b294616574937bfb1b395b27cd' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxLoopCollection',
    ),
    'object' => 
    array (
      'id' => 22,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxLoopCollection',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '/*
getXpdoInstanceAndAddPackage - properties

$prefix
$usecustomprefix
$packageName


prepareQuery - properties:

$limit
$offset
$totalVar
$where
$queries
$sortConfig
$groupby
$joins
$selectfields
$classname
$debug

renderOutput - properties:

$tpl
$wrapperTpl
$toSeparatePlaceholders
$toPlaceholder
$outputSeparator
$placeholdersKeyField
$toJsonPlaceholder
$jsonVarKey
$addfields

*/


$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;

$xpdo = $migx->getXpdoInstanceAndAddPackage($scriptProperties);

$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

$c = $migx->prepareQuery($xpdo,$scriptProperties);
$rows = $migx->getCollection($c);

$output = $migx->renderOutput($rows,$scriptProperties);

return $output;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/*
getXpdoInstanceAndAddPackage - properties

$prefix
$usecustomprefix
$packageName


prepareQuery - properties:

$limit
$offset
$totalVar
$where
$queries
$sortConfig
$groupby
$joins
$selectfields
$classname
$debug

renderOutput - properties:

$tpl
$wrapperTpl
$toSeparatePlaceholders
$toPlaceholder
$outputSeparator
$placeholdersKeyField
$toJsonPlaceholder
$jsonVarKey
$addfields

*/


$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;

$xpdo = $migx->getXpdoInstanceAndAddPackage($scriptProperties);

$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

$c = $migx->prepareQuery($xpdo,$scriptProperties);
$rows = $migx->getCollection($c);

$output = $migx->renderOutput($rows,$scriptProperties);

return $output;',
    ),
  ),
  '296192934e87c5a5db710743d08616aa' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxResourceMediaPath',
    ),
    'object' => 
    array (
      'id' => 23,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxResourceMediaPath',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '/**
 * @name migxResourceMediaPath
 * @description Dynamically calculates the upload path for a given resource
 * 
 * This Snippet is meant to dynamically calculate your baseBath attribute
 * for custom Media Sources.  This is useful if you wish to shepard uploaded
 * images to a folder dedicated to a given resource.  E.g. page 123 would 
 * have its own images that page 456 could not reference.
 *
 * USAGE:
 * [[migxResourceMediaPath? &pathTpl=`assets/businesses/{id}/`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/resourceimages/{id}/` &checkTVs=`mymigxtv`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}` &breadcrumbdepth=`2`]]
 *
 * PARAMETERS
 * &pathTpl string formatting string specifying the file path. 
 *		Relative to MODX base_path
 *		Available placeholders: {id}, {pagetitle}, {parent}
 * &docid (optional) integer page id
 * &createFolder (optional) boolean whether or not to create directory
 * &checkTVs (optional) commaseperated list of TVs to check, before directory is created 
 */
$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$docid = $modx->getOption(\'docid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, false);
$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$checktvs = $modx->getOption(\'checkTVs\', $scriptProperties, false);

$path = \'\';
$fullpath = \'\';
$createpath = false;
$fallbackpath = $modx->getOption(\'fallbackPath\', $scriptProperties, \'assets/migxfallback/\');

if (empty($pathTpl)) {
    $modx->log(MODX_LOG_LEVEL_DEBUG, \'[migxResourceMediaPath]: pathTpl not specified.\');
}

if (empty($docid) && $modx->getPlaceholder(\'mediasource_docid\')) {
    // placeholder was set by some script
    // warning: the parser may not render placeholders, e.g. &docid=`[[*parent]]` may fail
    $docid = $modx->getPlaceholder(\'mediasource_docid\');
}

if (empty($docid) && $modx->getPlaceholder(\'docid\')) {
    // placeholder was set by some script
    // warning: the parser may not render placeholders, e.g. &docid=`[[*parent]]` may fail
    $docid = $modx->getPlaceholder(\'docid\');
}
if (empty($docid)) {

    //on frontend
    if (is_object($modx->resource)) {
        $docid = $modx->resource->get(\'id\');
    }
    //on manager resource/update page
    else {
        $createpath = $createfolder;
        // We do this to read the &id param from an Ajax request
        $parsedUrl = parse_url($_SERVER[\'HTTP_REFERER\']);
        parse_str($parsedUrl[\'query\'], $parsedQuery);

        $action = $parsedQuery[\'a\'] ?? \'\';
        if ($action == \'resource/update\'){
            $docid = (int)$parsedQuery[\'amp;id\'] ?? (int)$parsedQuery[\'id\'] ?? 0;
        }
    }
}

if (empty($docid)) {
    $modx->log(MODX_LOG_LEVEL_DEBUG, \'[migxResourceMediaPath]: docid could not be determined.\');
}

if (empty($docid) || empty($pathTpl)) {
    $path = $fallbackpath;
    $fullpath = $modx->getOption(\'base_path\') . $fallbackpath;
    $createpath = true;
}

if (empty($fullpath) && $resource = $modx->getObject(\'modResource\', $docid)) {
    $path = $pathTpl;
    $ultimateParent = \'\';
    if (strstr($path, \'{breadcrumb}\') || strstr($path, \'{ultimateparent}\')) {
        $depth = $modx->getOption(\'breadcrumbdepth\', $scriptProperties, 10);
        $ctx = $resource->get(\'context_key\');
        $parentids = $modx->getParentIds($docid, $depth, array(\'context\' => $ctx));
        $breadcrumbdepth = $modx->getOption(\'breadcrumbdepth\', $scriptProperties, count($parentids));
        $breadcrumbdepth = $breadcrumbdepth > count($parentids) ? count($parentids) : $breadcrumbdepth;
        if (count($parentids) > 1) {
            $parentids = array_reverse($parentids);
            $parentids[] = $docid;
            $ultimateParent = $parentids[1];
        } else {
            $ultimateParent = $docid;
            $parentids = array();
            $parentids[] = $docid;
        }
    }

    if (strstr($path, \'{breadcrumb}\')) {
        $breadcrumbpath = \'\';
        for ($i = 1; $i <= $breadcrumbdepth; $i++) {
            $breadcrumbpath .= $parentids[$i] . \'/\';
        }
        $path = str_replace(\'{breadcrumb}\', $breadcrumbpath, $path);
    }
    
    if (!empty($tvname)){
        $path = str_replace(\'{tv_value}\', $resource->getTVValue($tvname), $path);    
    }
    $path = str_replace(\'{id}\', $docid, $path);
    $path = str_replace(\'{pagetitle}\', $resource->get(\'pagetitle\'), $path);
    $path = str_replace(\'{alias}\', $resource->get(\'alias\'), $path);
    $path = str_replace(\'{parent}\', $resource->get(\'parent\'), $path);
    $path = str_replace(\'{context_key}\', $resource->get(\'context_key\'), $path);
    $path = str_replace(\'{ultimateparent}\', $ultimateParent, $path);
    if ($template = $resource->getOne(\'Template\')) {
        $path = str_replace(\'{templatename}\', $template->get(\'templatename\'), $path);
    }
    if ($user = $modx->user) {
        $path = str_replace(\'{username}\', $modx->user->get(\'username\'), $path);
        $path = str_replace(\'{userid}\', $modx->user->get(\'id\'), $path);
    }

    $fullpath = $modx->getOption(\'base_path\') . $path;

    if ($createpath && $checktvs){
        $createpath = false;
        if ($template) {
            $tvs = explode(\',\',$checktvs);
            foreach ($tvs as $tv){
                if ($template->hasTemplateVar($tv)){
                    $createpath = true;
                }
            }            
        } 

    }

} else {
    $modx->log(MODX_LOG_LEVEL_DEBUG, sprintf(\'[migxResourceMediaPath]: resource not found (page id %s).\', $docid));
}

if ($createpath && !file_exists($fullpath)) {

    $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
    if (!@mkdir($fullpath, $permissions, true)) {
        $modx->log(MODX_LOG_LEVEL_DEBUG, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $fullpath));
    } else {
        chmod($fullpath, $permissions);
    }
}

return $path;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * @name migxResourceMediaPath
 * @description Dynamically calculates the upload path for a given resource
 * 
 * This Snippet is meant to dynamically calculate your baseBath attribute
 * for custom Media Sources.  This is useful if you wish to shepard uploaded
 * images to a folder dedicated to a given resource.  E.g. page 123 would 
 * have its own images that page 456 could not reference.
 *
 * USAGE:
 * [[migxResourceMediaPath? &pathTpl=`assets/businesses/{id}/`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/resourceimages/{id}/` &checkTVs=`mymigxtv`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}`]]
 * [[migxResourceMediaPath? &pathTpl=`assets/test/{breadcrumb}` &breadcrumbdepth=`2`]]
 *
 * PARAMETERS
 * &pathTpl string formatting string specifying the file path. 
 *		Relative to MODX base_path
 *		Available placeholders: {id}, {pagetitle}, {parent}
 * &docid (optional) integer page id
 * &createFolder (optional) boolean whether or not to create directory
 * &checkTVs (optional) commaseperated list of TVs to check, before directory is created 
 */
$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$docid = $modx->getOption(\'docid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, false);
$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$checktvs = $modx->getOption(\'checkTVs\', $scriptProperties, false);

$path = \'\';
$fullpath = \'\';
$createpath = false;
$fallbackpath = $modx->getOption(\'fallbackPath\', $scriptProperties, \'assets/migxfallback/\');

if (empty($pathTpl)) {
    $modx->log(MODX_LOG_LEVEL_DEBUG, \'[migxResourceMediaPath]: pathTpl not specified.\');
}

if (empty($docid) && $modx->getPlaceholder(\'mediasource_docid\')) {
    // placeholder was set by some script
    // warning: the parser may not render placeholders, e.g. &docid=`[[*parent]]` may fail
    $docid = $modx->getPlaceholder(\'mediasource_docid\');
}

if (empty($docid) && $modx->getPlaceholder(\'docid\')) {
    // placeholder was set by some script
    // warning: the parser may not render placeholders, e.g. &docid=`[[*parent]]` may fail
    $docid = $modx->getPlaceholder(\'docid\');
}
if (empty($docid)) {

    //on frontend
    if (is_object($modx->resource)) {
        $docid = $modx->resource->get(\'id\');
    }
    //on manager resource/update page
    else {
        $createpath = $createfolder;
        // We do this to read the &id param from an Ajax request
        $parsedUrl = parse_url($_SERVER[\'HTTP_REFERER\']);
        parse_str($parsedUrl[\'query\'], $parsedQuery);

        $action = $parsedQuery[\'a\'] ?? \'\';
        if ($action == \'resource/update\'){
            $docid = (int)$parsedQuery[\'amp;id\'] ?? (int)$parsedQuery[\'id\'] ?? 0;
        }
    }
}

if (empty($docid)) {
    $modx->log(MODX_LOG_LEVEL_DEBUG, \'[migxResourceMediaPath]: docid could not be determined.\');
}

if (empty($docid) || empty($pathTpl)) {
    $path = $fallbackpath;
    $fullpath = $modx->getOption(\'base_path\') . $fallbackpath;
    $createpath = true;
}

if (empty($fullpath) && $resource = $modx->getObject(\'modResource\', $docid)) {
    $path = $pathTpl;
    $ultimateParent = \'\';
    if (strstr($path, \'{breadcrumb}\') || strstr($path, \'{ultimateparent}\')) {
        $depth = $modx->getOption(\'breadcrumbdepth\', $scriptProperties, 10);
        $ctx = $resource->get(\'context_key\');
        $parentids = $modx->getParentIds($docid, $depth, array(\'context\' => $ctx));
        $breadcrumbdepth = $modx->getOption(\'breadcrumbdepth\', $scriptProperties, count($parentids));
        $breadcrumbdepth = $breadcrumbdepth > count($parentids) ? count($parentids) : $breadcrumbdepth;
        if (count($parentids) > 1) {
            $parentids = array_reverse($parentids);
            $parentids[] = $docid;
            $ultimateParent = $parentids[1];
        } else {
            $ultimateParent = $docid;
            $parentids = array();
            $parentids[] = $docid;
        }
    }

    if (strstr($path, \'{breadcrumb}\')) {
        $breadcrumbpath = \'\';
        for ($i = 1; $i <= $breadcrumbdepth; $i++) {
            $breadcrumbpath .= $parentids[$i] . \'/\';
        }
        $path = str_replace(\'{breadcrumb}\', $breadcrumbpath, $path);
    }
    
    if (!empty($tvname)){
        $path = str_replace(\'{tv_value}\', $resource->getTVValue($tvname), $path);    
    }
    $path = str_replace(\'{id}\', $docid, $path);
    $path = str_replace(\'{pagetitle}\', $resource->get(\'pagetitle\'), $path);
    $path = str_replace(\'{alias}\', $resource->get(\'alias\'), $path);
    $path = str_replace(\'{parent}\', $resource->get(\'parent\'), $path);
    $path = str_replace(\'{context_key}\', $resource->get(\'context_key\'), $path);
    $path = str_replace(\'{ultimateparent}\', $ultimateParent, $path);
    if ($template = $resource->getOne(\'Template\')) {
        $path = str_replace(\'{templatename}\', $template->get(\'templatename\'), $path);
    }
    if ($user = $modx->user) {
        $path = str_replace(\'{username}\', $modx->user->get(\'username\'), $path);
        $path = str_replace(\'{userid}\', $modx->user->get(\'id\'), $path);
    }

    $fullpath = $modx->getOption(\'base_path\') . $path;

    if ($createpath && $checktvs){
        $createpath = false;
        if ($template) {
            $tvs = explode(\',\',$checktvs);
            foreach ($tvs as $tv){
                if ($template->hasTemplateVar($tv)){
                    $createpath = true;
                }
            }            
        } 

    }

} else {
    $modx->log(MODX_LOG_LEVEL_DEBUG, sprintf(\'[migxResourceMediaPath]: resource not found (page id %s).\', $docid));
}

if ($createpath && !file_exists($fullpath)) {

    $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
    if (!@mkdir($fullpath, $permissions, true)) {
        $modx->log(MODX_LOG_LEVEL_DEBUG, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $fullpath));
    } else {
        chmod($fullpath, $permissions);
    }
}

return $path;',
    ),
  ),
  '1e3f5c9f893ac89e6e08b989a6ba5014' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxImageUpload',
    ),
    'object' => 
    array (
      'id' => 24,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxImageUpload',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => 'return include $modx->getOption(\'core_path\').\'components/migx/model/imageupload/imageupload.php\';',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => 'return include $modx->getOption(\'core_path\').\'components/migx/model/imageupload/imageupload.php\';',
    ),
  ),
  '9d224897091e1c6d0ffe3dd5b69e2d0e' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxChunklistToJson',
    ),
    'object' => 
    array (
      'id' => 25,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxChunklistToJson',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$category = $modx->getOption(\'category\', $scriptProperties, \'\');
$format = $modx->getOption(\'format\', $scriptProperties, \'json\');

$classname = \'modChunk\';
$rows = array();
$output = \'\';

$c = $modx->newQuery($classname);
$c->select($modx->getSelectColumns($classname, $c->getAlias(), \'\', array(\'id\', \'name\')));
$c->sortby(\'name\');

if (!empty($category)) {
    $c->where(array(\'category\' => $category));
}
//$c->prepare();echo $c->toSql();
if ($collection = $modx->getCollection($classname, $c)) {
    $i = 0;

    switch ($format) {
        case \'json\':
            foreach ($collection as $object) {
                $row[\'MIGX_id\'] = (string )$i;
                $row[\'name\'] = $object->get(\'name\');
                $row[\'selected\'] = \'0\';
                $rows[] = $row;
                $i++;
            }
            $output = $modx->toJson($rows);
            break;
        
        case \'optionlist\':
            foreach ($collection as $object) {
                $rows[] = $object->get(\'name\');
                $i++;
            }
            $output = implode(\'||\',$rows);      
        break;
            
    }


}

return $output;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$category = $modx->getOption(\'category\', $scriptProperties, \'\');
$format = $modx->getOption(\'format\', $scriptProperties, \'json\');

$classname = \'modChunk\';
$rows = array();
$output = \'\';

$c = $modx->newQuery($classname);
$c->select($modx->getSelectColumns($classname, $c->getAlias(), \'\', array(\'id\', \'name\')));
$c->sortby(\'name\');

if (!empty($category)) {
    $c->where(array(\'category\' => $category));
}
//$c->prepare();echo $c->toSql();
if ($collection = $modx->getCollection($classname, $c)) {
    $i = 0;

    switch ($format) {
        case \'json\':
            foreach ($collection as $object) {
                $row[\'MIGX_id\'] = (string )$i;
                $row[\'name\'] = $object->get(\'name\');
                $row[\'selected\'] = \'0\';
                $rows[] = $row;
                $i++;
            }
            $output = $modx->toJson($rows);
            break;
        
        case \'optionlist\':
            foreach ($collection as $object) {
                $rows[] = $object->get(\'name\');
                $i++;
            }
            $output = implode(\'||\',$rows);      
        break;
            
    }


}

return $output;',
    ),
  ),
  '8a94a689301af237f7d08927814a14ac' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxSwitchDetailChunk',
    ),
    'object' => 
    array (
      'id' => 26,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxSwitchDetailChunk',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '//[[migxSwitchDetailChunk? &detailChunk=`detailChunk` &listingChunk=`listingChunk`]]


$properties[\'migx_id\'] = $modx->getOption(\'migx_id\',$_GET,\'\');

if (!empty($properties[\'migx_id\'])){
    $output = $modx->getChunk($detailChunk,$properties);
}
else{
    $output = $modx->getChunk($listingChunk);
}

return $output;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '//[[migxSwitchDetailChunk? &detailChunk=`detailChunk` &listingChunk=`listingChunk`]]


$properties[\'migx_id\'] = $modx->getOption(\'migx_id\',$_GET,\'\');

if (!empty($properties[\'migx_id\'])){
    $output = $modx->getChunk($detailChunk,$properties);
}
else{
    $output = $modx->getChunk($listingChunk);
}

return $output;',
    ),
  ),
  '8aed0706be1d098dea95b4481eaed0a7' => 
  array (
    'criteria' => 
    array (
      'name' => 'getSwitchColumnCol',
    ),
    'object' => 
    array (
      'id' => 27,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getSwitchColumnCol',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$scriptProperties = $_REQUEST;
$col = \'\';
// special actions, for example the showSelector - action
$tempParams = $modx->getOption(\'tempParams\', $scriptProperties, \'\');

if (!empty($tempParams)) {
    $tempParams = $modx->fromJson($tempParams);
    $col = $modx->getOption(\'col\', $tempParams, \'\');
}

return $col;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$scriptProperties = $_REQUEST;
$col = \'\';
// special actions, for example the showSelector - action
$tempParams = $modx->getOption(\'tempParams\', $scriptProperties, \'\');

if (!empty($tempParams)) {
    $tempParams = $modx->fromJson($tempParams);
    $col = $modx->getOption(\'col\', $tempParams, \'\');
}

return $col;',
    ),
  ),
  'abc7a9f0499013f73fe9bf6fe6094157' => 
  array (
    'criteria' => 
    array (
      'name' => 'getDayliMIGXrecord',
    ),
    'object' => 
    array (
      'id' => 28,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getDayliMIGXrecord',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '/**
 * getDayliMIGXrecord
 *
 * Copyright 2009-2011 by Bruno Perner <b.perner@gmx.de>
 *
 * getDayliMIGXrecord is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getDayliMIGXrecord is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getDayliMIGXrecord; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getDayliMIGXrecord
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: [[!getDayliMIGXrecord? &tvname=`myTV`&tpl=`@CODE:<img src="[[+image]]"/>` &randomize=`1`]]*/
/* get default properties */


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = $modx->resource->get(\'context_key\');

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $properties[\'configs\'];
        $migx->loadConfigs();
        // get tabs from file or migx-config-table
        $formtabs = $migx->getTabs();
        if (empty($formtabs)) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        //$tv->setCacheable(false);
        //$outputvalue = $tv->renderOutput($docid);
        
        $tvresource = $modx->getObject(\'modTemplateVarResource\', array(
            \'tmplvarid\' => $tv->get(\'id\'),
            \'contentid\' => $docid,
            ));


        $outputvalue = $tvresource->get(\'value\');
        
        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        $migx->source = $tv->getSource($migx->working_context, false);

        if (empty($outputvalue)) {
            return \'\';
        }

        $items = $modx->fromJSON($outputvalue);


        //is there an active item for the current date?
        $activedate = $modx->getOption(\'activedate\', $scriptProperties, strftime(\'%Y/%m/%d\'));
        //$activedate = $modx->getOption(\'activedate\', $_GET, strftime(\'%Y/%m/%d\'));
        $activewhere = array();
        $activewhere[\'activedate\'] = $activedate;
        $activewhere[\'activated\'] = \'1\';
        $activeitems = $migx->filterItems($activewhere, $items);

        if (count($activeitems) == 0) {

            $activeitems = array();
            // where filter
            if (is_array($where) && count($where) > 0) {
                $items = $migx->filterItems($where, $items);
            }

            $tempitems = array();
            $count = count($items);
            $emptycount = 0;
            $latestdate = $activedate;
            $nextdate = strtotime($latestdate);
            foreach ($items as $item) {
                //empty all dates and active-states which are older than today
                if (!empty($item[\'activedate\']) && $item[\'activedate\'] < $activedate) {
                    $item[\'activated\'] = \'0\';
                    $item[\'activedate\'] = \'\';
                }
                if (empty($item[\'activedate\'])) {
                    $emptycount++;
                }
                if ($item[\'activedate\'] > $latestdate) {
                    $latestdate = $item[\'activedate\'];
                    $nextdate = strtotime($latestdate) + (24 * 60 * 60);
                }
                if ($item[\'activedate\'] == $activedate) {
                    $item[\'activated\'] = \'1\';
                    $activeitems[] = $item;
                }
                $tempitems[] = $item;
            }

            //echo \'<pre>\' . print_r($tempitems, 1) . \'</pre>\';

            $items = $tempitems;


            //are there more than half of all items with empty activedates

            if ($emptycount >= $count / 2) {

                // sort items
                if (is_array($sort) && count($sort) > 0) {
                    $items = $migx->sortDbResult($items, $sort);
                }
                if (count($items) > 0) {
                    //shuffle items
                    if ($randomize) {
                        shuffle($items);
                    }
                }

                $tempitems = array();
                foreach ($items as $item) {
                    if (empty($item[\'activedate\'])) {
                        $item[\'activedate\'] = strftime(\'%Y/%m/%d\', $nextdate);
                        $nextdate = $nextdate + (24 * 60 * 60);
                        if ($item[\'activedate\'] == $activedate) {
                            $item[\'activated\'] = \'1\';
                            $activeitems[] = $item;
                        }
                    }

                    $tempitems[] = $item;
                }

                $items = $tempitems;
            }

            //$resource = $modx->getObject(\'modResource\', $docid);
            //echo $modx->toJson($items);
            $sort = \'[{"sortby":"activedate"}]\';
            $items = $migx->sortDbResult($items, $modx->fromJson($sort));

            //echo \'<pre>\' . print_r($items, 1) . \'</pre>\';

            $tv->setValue($docid, $modx->toJson($items));
            $tv->save();

        }
    }

}


$properties = array();
foreach ($scriptProperties as $property => $value) {
    $properties[\'property.\' . $property] = $value;
}

$output = \'\';

foreach ($activeitems as $key => $item) {

    $fields = array();
    foreach ($item as $field => $value) {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field])) {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\']))) {

            } else {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }

    $rowtpl = $tpl;
    //get changing tpls from field
    if (substr($tpl, 0, 7) == "@FIELD:") {
        $tplField = substr($tpl, 7);
        $rowtpl = $fields[$tplField];
    }

    if (!isset($template[$rowtpl])) {
        if (substr($rowtpl, 0, 6) == "@FILE:") {
            $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
        } elseif (substr($rowtpl, 0, 6) == "@CODE:") {
            $template[$rowtpl] = substr($tpl, 6);
        } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true)) {
            $template[$rowtpl] = $chunk->getContent();
        } else {
            $template[$rowtpl] = false;
        }
    }

    $fields = array_merge($fields, $properties);

    if ($template[$rowtpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$rowtpl]);
        $output .= $chunk->process($fields);

    } else {
        $output .= \'<pre>\' . print_r($fields, 1) . \'</pre>\';

    }


}


if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * getDayliMIGXrecord
 *
 * Copyright 2009-2011 by Bruno Perner <b.perner@gmx.de>
 *
 * getDayliMIGXrecord is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * getDayliMIGXrecord is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getDayliMIGXrecord; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * getDayliMIGXrecord
 *
 * display Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string for MODx Revolution 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*example: [[!getDayliMIGXrecord? &tvname=`myTV`&tpl=`@CODE:<img src="[[+image]]"/>` &randomize=`1`]]*/
/* get default properties */


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'\');
$randomize = $modx->getOption(\'randomize\', $scriptProperties, false);
$where = $modx->getOption(\'where\', $scriptProperties, \'\');
$where = !empty($where) ? $modx->fromJSON($where) : array();
$sort = $modx->getOption(\'sort\', $scriptProperties, \'\');
$sort = !empty($sort) ? $modx->fromJSON($sort) : array();
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);
$docid = $modx->getOption(\'docid\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : 1));
$processTVs = $modx->getOption(\'processTVs\', $scriptProperties, \'1\');

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
$migx->working_context = $modx->resource->get(\'context_key\');

if (!empty($tvname)) {
    if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

        /*
        *   get inputProperties
        */


        $properties = $tv->get(\'input_properties\');
        $properties = isset($properties[\'formtabs\']) ? $properties : $tv->getProperties();

        $migx->config[\'configs\'] = $properties[\'configs\'];
        $migx->loadConfigs();
        // get tabs from file or migx-config-table
        $formtabs = $migx->getTabs();
        if (empty($formtabs)) {
            //try to get formtabs and its fields from properties
            $formtabs = $modx->fromJSON($properties[\'formtabs\']);
        }

        //$tv->setCacheable(false);
        //$outputvalue = $tv->renderOutput($docid);
        
        $tvresource = $modx->getObject(\'modTemplateVarResource\', array(
            \'tmplvarid\' => $tv->get(\'id\'),
            \'contentid\' => $docid,
            ));


        $outputvalue = $tvresource->get(\'value\');
        
        /*
        *   get inputTvs 
        */
        $inputTvs = array();
        if (is_array($formtabs)) {

            //multiple different Forms
            // Note: use same field-names and inputTVs in all forms
            $inputTvs = $migx->extractInputTvs($formtabs);
        }
        $migx->source = $tv->getSource($migx->working_context, false);

        if (empty($outputvalue)) {
            return \'\';
        }

        $items = $modx->fromJSON($outputvalue);


        //is there an active item for the current date?
        $activedate = $modx->getOption(\'activedate\', $scriptProperties, strftime(\'%Y/%m/%d\'));
        //$activedate = $modx->getOption(\'activedate\', $_GET, strftime(\'%Y/%m/%d\'));
        $activewhere = array();
        $activewhere[\'activedate\'] = $activedate;
        $activewhere[\'activated\'] = \'1\';
        $activeitems = $migx->filterItems($activewhere, $items);

        if (count($activeitems) == 0) {

            $activeitems = array();
            // where filter
            if (is_array($where) && count($where) > 0) {
                $items = $migx->filterItems($where, $items);
            }

            $tempitems = array();
            $count = count($items);
            $emptycount = 0;
            $latestdate = $activedate;
            $nextdate = strtotime($latestdate);
            foreach ($items as $item) {
                //empty all dates and active-states which are older than today
                if (!empty($item[\'activedate\']) && $item[\'activedate\'] < $activedate) {
                    $item[\'activated\'] = \'0\';
                    $item[\'activedate\'] = \'\';
                }
                if (empty($item[\'activedate\'])) {
                    $emptycount++;
                }
                if ($item[\'activedate\'] > $latestdate) {
                    $latestdate = $item[\'activedate\'];
                    $nextdate = strtotime($latestdate) + (24 * 60 * 60);
                }
                if ($item[\'activedate\'] == $activedate) {
                    $item[\'activated\'] = \'1\';
                    $activeitems[] = $item;
                }
                $tempitems[] = $item;
            }

            //echo \'<pre>\' . print_r($tempitems, 1) . \'</pre>\';

            $items = $tempitems;


            //are there more than half of all items with empty activedates

            if ($emptycount >= $count / 2) {

                // sort items
                if (is_array($sort) && count($sort) > 0) {
                    $items = $migx->sortDbResult($items, $sort);
                }
                if (count($items) > 0) {
                    //shuffle items
                    if ($randomize) {
                        shuffle($items);
                    }
                }

                $tempitems = array();
                foreach ($items as $item) {
                    if (empty($item[\'activedate\'])) {
                        $item[\'activedate\'] = strftime(\'%Y/%m/%d\', $nextdate);
                        $nextdate = $nextdate + (24 * 60 * 60);
                        if ($item[\'activedate\'] == $activedate) {
                            $item[\'activated\'] = \'1\';
                            $activeitems[] = $item;
                        }
                    }

                    $tempitems[] = $item;
                }

                $items = $tempitems;
            }

            //$resource = $modx->getObject(\'modResource\', $docid);
            //echo $modx->toJson($items);
            $sort = \'[{"sortby":"activedate"}]\';
            $items = $migx->sortDbResult($items, $modx->fromJson($sort));

            //echo \'<pre>\' . print_r($items, 1) . \'</pre>\';

            $tv->setValue($docid, $modx->toJson($items));
            $tv->save();

        }
    }

}


$properties = array();
foreach ($scriptProperties as $property => $value) {
    $properties[\'property.\' . $property] = $value;
}

$output = \'\';

foreach ($activeitems as $key => $item) {

    $fields = array();
    foreach ($item as $field => $value) {
        $value = is_array($value) ? implode(\'||\', $value) : $value; //handle arrays (checkboxes, multiselects)
        if ($processTVs && isset($inputTvs[$field])) {
            if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $inputTvs[$field][\'inputTV\']))) {

            } else {
                $tv = $modx->newObject(\'modTemplateVar\');
                $tv->set(\'type\', $inputTvs[$field][\'inputTVtype\']);
            }
            $inputTV = $inputTvs[$field];

            $mTypes = $modx->getOption(\'manipulatable_url_tv_output_types\', null, \'image,file\');
            //don\'t manipulate any urls here
            $modx->setOption(\'manipulatable_url_tv_output_types\', \'\');
            $tv->set(\'default_text\', $value);
            $value = $tv->renderOutput($docid);
            //set option back
            $modx->setOption(\'manipulatable_url_tv_output_types\', $mTypes);
            //now manipulate urls
            if ($mediasource = $migx->getFieldSource($inputTV, $tv)) {
                $mTypes = explode(\',\', $mTypes);
                if (!empty($value) && in_array($tv->get(\'type\'), $mTypes)) {
                    //$value = $mediasource->prepareOutputUrl($value);
                    $value = str_replace(\'/./\', \'/\', $mediasource->prepareOutputUrl($value));
                }
            }

        }
        $fields[$field] = $value;

    }

    $rowtpl = $tpl;
    //get changing tpls from field
    if (substr($tpl, 0, 7) == "@FIELD:") {
        $tplField = substr($tpl, 7);
        $rowtpl = $fields[$tplField];
    }

    if (!isset($template[$rowtpl])) {
        if (substr($rowtpl, 0, 6) == "@FILE:") {
            $template[$rowtpl] = file_get_contents($modx->config[\'base_path\'] . substr($rowtpl, 6));
        } elseif (substr($rowtpl, 0, 6) == "@CODE:") {
            $template[$rowtpl] = substr($tpl, 6);
        } elseif ($chunk = $modx->getObject(\'modChunk\', array(\'name\' => $rowtpl), true)) {
            $template[$rowtpl] = $chunk->getContent();
        } else {
            $template[$rowtpl] = false;
        }
    }

    $fields = array_merge($fields, $properties);

    if ($template[$rowtpl]) {
        $chunk = $modx->newObject(\'modChunk\');
        $chunk->setCacheable(false);
        $chunk->setContent($template[$rowtpl]);
        $output .= $chunk->process($fields);

    } else {
        $output .= \'<pre>\' . print_r($fields, 1) . \'</pre>\';

    }


}


if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
    return \'\';
}

return $output;',
    ),
  ),
  '1b71d0cbcd2ba5365ad69ad5ab087188' => 
  array (
    'criteria' => 
    array (
      'name' => 'filterbytag',
    ),
    'object' => 
    array (
      'id' => 29,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'filterbytag',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => 'if (!is_array($subject)) {
    $subject = explode(\',\',str_replace(array(\'||\',\' \'),array(\',\',\'\'),$subject));
}

return (in_array($operand,$subject));',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => 'if (!is_array($subject)) {
    $subject = explode(\',\',str_replace(array(\'||\',\' \'),array(\',\',\'\'),$subject));
}

return (in_array($operand,$subject));',
    ),
  ),
  'fd5c2555fc30d1433e636c0941e1993a' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxObjectMediaPath',
    ),
    'object' => 
    array (
      'id' => 30,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxObjectMediaPath',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$objectid = $modx->getOption(\'objectid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, \'1\');
$path = \'\';
$createpath = false;
if (empty($objectid) && $modx->getPlaceholder(\'objectid\')) {
    // placeholder was set by some script on frontend for example
    $objectid = $modx->getPlaceholder(\'objectid\');
}
if (empty($objectid) && isset($_REQUEST[\'object_id\'])) {
    $objectid = $_REQUEST[\'object_id\'];
}



if (empty($objectid)) {

    //set Session - var in fields.php - processor
    if (isset($_SESSION[\'migxWorkingObjectid\'])) {
        $objectid = $_SESSION[\'migxWorkingObjectid\'];
        $createpath = !empty($createfolder);
    }

}


$path = str_replace(\'{id}\', $objectid, $pathTpl);

$fullpath = $modx->getOption(\'base_path\') . $path;

if ($createpath && !file_exists($fullpath)) {
        $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
        if (!@mkdir($fullpath, $permissions, true)) {
            $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $fullpath));
        }
        else{
            chmod($fullpath, $permissions); 
        }
}

return $path;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$pathTpl = $modx->getOption(\'pathTpl\', $scriptProperties, \'\');
$objectid = $modx->getOption(\'objectid\', $scriptProperties, \'\');
$createfolder = $modx->getOption(\'createFolder\', $scriptProperties, \'1\');
$path = \'\';
$createpath = false;
if (empty($objectid) && $modx->getPlaceholder(\'objectid\')) {
    // placeholder was set by some script on frontend for example
    $objectid = $modx->getPlaceholder(\'objectid\');
}
if (empty($objectid) && isset($_REQUEST[\'object_id\'])) {
    $objectid = $_REQUEST[\'object_id\'];
}



if (empty($objectid)) {

    //set Session - var in fields.php - processor
    if (isset($_SESSION[\'migxWorkingObjectid\'])) {
        $objectid = $_SESSION[\'migxWorkingObjectid\'];
        $createpath = !empty($createfolder);
    }

}


$path = str_replace(\'{id}\', $objectid, $pathTpl);

$fullpath = $modx->getOption(\'base_path\') . $path;

if ($createpath && !file_exists($fullpath)) {
        $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
        if (!@mkdir($fullpath, $permissions, true)) {
            $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $fullpath));
        }
        else{
            chmod($fullpath, $permissions); 
        }
}

return $path;',
    ),
  ),
  '5e014a04adc84aff17b4108ad875c1f1' => 
  array (
    'criteria' => 
    array (
      'name' => 'exportMIGX2db',
    ),
    'object' => 
    array (
      'id' => 31,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'exportMIGX2db',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '/**
 * exportMIGX2db
 *
 * Copyright 2014 by Bruno Perner <b.perner@gmx.de>
 * 
 * Sponsored by Simon Wurster <info@wurster-medien.de>
 *
 * exportMIGX2db is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * exportMIGX2db is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * exportMIGX2db; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * exportMIGX2db
 *
 * export Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string to db-table 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*
[[!exportMIGX2db? 
&tvname=`references` 
&resources=`25` 
&packageName=`projekte`
&classname=`Projekt` 
&migx_id_field=`migx_id` 
&renamed_fields=`{"Firmen-URL":"Firmen_url","Projekt-URL":"Projekt_URL","main-image":"main_image"}`
]]
*/


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$resources = $modx->getOption(\'resources\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : \'\'));
$resources = explode(\',\', $resources);
$prefix = isset($scriptProperties[\'prefix\']) ? $scriptProperties[\'prefix\'] : null;
$packageName = $modx->getOption(\'packageName\', $scriptProperties, \'\');
$classname = $modx->getOption(\'classname\', $scriptProperties, \'\');
$value = $modx->getOption(\'value\', $scriptProperties, \'\');
$migx_id_field = $modx->getOption(\'migx_id_field\', $scriptProperties, \'\');
$pos_field = $modx->getOption(\'pos_field\', $scriptProperties, \'\');
$renamed_fields = $modx->getOption(\'renamed_fields\', $scriptProperties, \'\');

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName .
    \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$added = 0;
$modified = 0;

foreach ($resources as $docid) {
    
    $outputvalue = \'\';
    if (count($resources)==1){
        $outputvalue = $value;    
    }
    
    if (!empty($tvname)) {
        if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

            $outputvalue = empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
        }
    }

    if (!empty($outputvalue)) {
        $renamed = !empty($renamed_fields) ? $modx->fromJson($renamed_fields) : array();

        $items = $modx->fromJSON($outputvalue);
        $pos = 1;
        $searchfields = array();
        if (is_array($items)) {
            foreach ($items as $fields) {
                $search = array();
                if (!empty($migx_id_field)) {
                    $search[$migx_id_field] = $fields[\'MIGX_id\'];
                }
                if (!empty($resource_id_field)) {
                    $search[$resource_id_field] = $docid;
                }
                if (!empty($migx_id_field) && $object = $modx->getObject($classname, $search)) {
                    $mode = \'mod\';
                } else {
                    $object = $modx->newObject($classname);
                    $object->fromArray($search);
                    $mode = \'add\';
                }
                foreach ($fields as $field => $value) {
                    $fieldname = array_key_exists($field, $renamed) ? $renamed[$field] : $field;
                    $object->set($fieldname, $value);
                }
                if (!empty($pos_field)) {
                    $object->set($pos_field,$pos) ;
                }                
                if ($object->save()) {
                    if ($mode == \'add\') {
                        $added++;
                    } else {
                        $modified++;
                    }
                }
                $pos++;
            }
            
        }
    }
}


return $added . \' rows added to db, \' . $modified . \' existing rows actualized\';',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * exportMIGX2db
 *
 * Copyright 2014 by Bruno Perner <b.perner@gmx.de>
 * 
 * Sponsored by Simon Wurster <info@wurster-medien.de>
 *
 * exportMIGX2db is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * exportMIGX2db is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * exportMIGX2db; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * exportMIGX2db
 *
 * export Items from outputvalue of TV with custom-TV-input-type MIGX or from other JSON-string to db-table 
 *
 * @version 1.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

/*
[[!exportMIGX2db? 
&tvname=`references` 
&resources=`25` 
&packageName=`projekte`
&classname=`Projekt` 
&migx_id_field=`migx_id` 
&renamed_fields=`{"Firmen-URL":"Firmen_url","Projekt-URL":"Projekt_URL","main-image":"main_image"}`
]]
*/


$tvname = $modx->getOption(\'tvname\', $scriptProperties, \'\');
$resources = $modx->getOption(\'resources\', $scriptProperties, (isset($modx->resource) ? $modx->resource->get(\'id\') : \'\'));
$resources = explode(\',\', $resources);
$prefix = isset($scriptProperties[\'prefix\']) ? $scriptProperties[\'prefix\'] : null;
$packageName = $modx->getOption(\'packageName\', $scriptProperties, \'\');
$classname = $modx->getOption(\'classname\', $scriptProperties, \'\');
$value = $modx->getOption(\'value\', $scriptProperties, \'\');
$migx_id_field = $modx->getOption(\'migx_id_field\', $scriptProperties, \'\');
$pos_field = $modx->getOption(\'pos_field\', $scriptProperties, \'\');
$renamed_fields = $modx->getOption(\'renamed_fields\', $scriptProperties, \'\');

$packagepath = $modx->getOption(\'core_path\') . \'components/\' . $packageName .
    \'/\';
$modelpath = $packagepath . \'model/\';

$modx->addPackage($packageName, $modelpath, $prefix);
$added = 0;
$modified = 0;

foreach ($resources as $docid) {
    
    $outputvalue = \'\';
    if (count($resources)==1){
        $outputvalue = $value;    
    }
    
    if (!empty($tvname)) {
        if ($tv = $modx->getObject(\'modTemplateVar\', array(\'name\' => $tvname))) {

            $outputvalue = empty($outputvalue) ? $tv->renderOutput($docid) : $outputvalue;
        }
    }

    if (!empty($outputvalue)) {
        $renamed = !empty($renamed_fields) ? $modx->fromJson($renamed_fields) : array();

        $items = $modx->fromJSON($outputvalue);
        $pos = 1;
        $searchfields = array();
        if (is_array($items)) {
            foreach ($items as $fields) {
                $search = array();
                if (!empty($migx_id_field)) {
                    $search[$migx_id_field] = $fields[\'MIGX_id\'];
                }
                if (!empty($resource_id_field)) {
                    $search[$resource_id_field] = $docid;
                }
                if (!empty($migx_id_field) && $object = $modx->getObject($classname, $search)) {
                    $mode = \'mod\';
                } else {
                    $object = $modx->newObject($classname);
                    $object->fromArray($search);
                    $mode = \'add\';
                }
                foreach ($fields as $field => $value) {
                    $fieldname = array_key_exists($field, $renamed) ? $renamed[$field] : $field;
                    $object->set($fieldname, $value);
                }
                if (!empty($pos_field)) {
                    $object->set($pos_field,$pos) ;
                }                
                if ($object->save()) {
                    if ($mode == \'add\') {
                        $added++;
                    } else {
                        $modified++;
                    }
                }
                $pos++;
            }
            
        }
    }
}


return $added . \' rows added to db, \' . $modified . \' existing rows actualized\';',
    ),
  ),
  'cc87ac8be9cf2eb522ec42858f33e220' => 
  array (
    'criteria' => 
    array (
      'name' => 'preparedatewhere',
    ),
    'object' => 
    array (
      'id' => 32,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'preparedatewhere',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$name = $modx->getOption(\'name\', $scriptProperties, \'\');
$date = $modx->getOption($name . \'_date\', $_REQUEST, \'\');
$dir = str_replace(\'T\', \' \', $modx->getOption($name . \'_dir\', $_REQUEST, \'\'));

if (!empty($date) && !empty($dir) && $dir != \'all\') {
    switch ($dir) {
        case \'=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date)),
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );
            break;
        case \'>=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date))
            );
            break;
        case \'<=\':
            $where = array(
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );            
            break;

    }

    return $modx->toJson($where);
}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$name = $modx->getOption(\'name\', $scriptProperties, \'\');
$date = $modx->getOption($name . \'_date\', $_REQUEST, \'\');
$dir = str_replace(\'T\', \' \', $modx->getOption($name . \'_dir\', $_REQUEST, \'\'));

if (!empty($date) && !empty($dir) && $dir != \'all\') {
    switch ($dir) {
        case \'=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date)),
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );
            break;
        case \'>=\':
            $where = array(
            \'enddate:>=\' => strftime(\'%Y-%m-%d 00:00:00\',strtotime($date))
            );
            break;
        case \'<=\':
            $where = array(
            \'startdate:<=\' => strftime(\'%Y-%m-%d 23:59:59\',strtotime($date))
            );            
            break;

    }

    return $modx->toJson($where);
}',
    ),
  ),
  'f9f1c6452c9874f94c30c1b7674d11e6' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxJsonToPlaceholders',
    ),
    'object' => 
    array (
      'id' => 33,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxJsonToPlaceholders',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$value = $modx->getOption(\'value\',$scriptProperties,\'\');
$prefix = $modx->getOption(\'prefix\',$scriptProperties,\'\');

//$modx->setPlaceholders($modx->fromJson($value),$prefix,\'\',true);

$values = json_decode($value, true);

$it = new RecursiveIteratorIterator(new RecursiveArrayIterator($values));

if (is_array($values)){
    foreach ($it as $key => $value){
        $value = $value == null ? \'\' : $value;
        $modx->setPlaceholder($prefix . $key, $value);
    }
}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$value = $modx->getOption(\'value\',$scriptProperties,\'\');
$prefix = $modx->getOption(\'prefix\',$scriptProperties,\'\');

//$modx->setPlaceholders($modx->fromJson($value),$prefix,\'\',true);

$values = json_decode($value, true);

$it = new RecursiveIteratorIterator(new RecursiveArrayIterator($values));

if (is_array($values)){
    foreach ($it as $key => $value){
        $value = $value == null ? \'\' : $value;
        $modx->setPlaceholder($prefix . $key, $value);
    }
}',
    ),
  ),
  '57b8c4b75cc0edc1d09be13c1ad97008' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxGetCollectionTree',
    ),
    'object' => 
    array (
      'id' => 34,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxGetCollectionTree',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '/**
 * migxGetCollectionTree
 *
 * Copyright 2014 by Bruno Perner <b.perner@gmx.de>
 *
 * migxGetCollectionTree is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * migxGetCollectionTree is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * migxGetCollectionTree; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * migxGetCollectionTree
 *
 *          display nested items from different objects. The tree-schema is defined by a json-property. 
 *
 * @version 1.0.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

$treeSchema = $modx->getOption(\'treeSchema\', $scriptProperties, \'\');
$treeSchema = $modx->fromJson($treeSchema);

$scriptProperties[\'current\'] = $modx->getOption(\'current\', $scriptProperties, \'\');
$scriptProperties[\'currentClassname\'] = $modx->getOption(\'currentClassname\', $scriptProperties, \'\');
$scriptProperties[\'currentKeyField\'] = $modx->getOption(\'currentKeyField\', $scriptProperties, \'id\');
$return = $modx->getOption(\'return\', $scriptProperties, \'parsed\'); //parsed,json,arrayprint

/*
Examples:

Get Resource-Tree, 4 levels deep

[[!migxGetCollectionTree?
&current=`57`
&currentClassname=`modResource`
&treeSchema=`
{
"classname": "modResource",
"debug": "1",
"tpl": "mgctResourceTree",
"wrapperTpl": "@CODE:<ul>[[+output]]</ul>",
"selectfields": "id,pagetitle",
"where": {
"parent": "0",
"published": "1",
"deleted": "0"
},
"_branches": [{
"alias": "children",
"classname": "modResource",
"local": "parent",
"foreign": "id",
"tpl": "mgctResourceTree",
"debug": "1",
"selectfields": "id,pagetitle,parent",
"_branches": [{
"alias": "children",
"classname": "modResource",
"local": "parent",
"foreign": "id",
"tpl": "mgctResourceTree",
"debug": "1",
"selectfields": "id,pagetitle,parent",
"where": {
"published": "1",
"deleted": "0"
},
"_branches": [{
"alias": "children",
"classname": "modResource",
"local": "parent",
"foreign": "id",
"tpl": "mgctResourceTree",
"debug": "1",
"selectfields": "id,pagetitle,parent",
"where": {
"published": "1",
"deleted": "0"
}
}]
}]
}]
}
`]]

the chunk mgctResourceTree:
<li class="[[+_activelabel]] [[+_currentlabel]]" ><a href="[[~[[+id]]]]">[[+pagetitle]]([[+id]])</a></li>
[[+innercounts.children:gt=`0`:then=`
<ul>[[+innerrows.children]]</ul>
`:else=``]]

get all Templates and its Resources:

[[!migxGetCollectionTree?
&treeSchema=`
{
"classname": "modTemplate",
"debug": "1",
"tpl": "@CODE:<h3>[[+templatename]]</h3><ul>[[+innerrows.resource]]</ul>",
"selectfields": "id,templatename",
"_branches": [{
"alias": "resource",
"classname": "modResource",
"local": "template",
"foreign": "id",
"tpl": "@CODE:<li>[[+pagetitle]]([[+id]])</li>",
"debug": "1",
"selectfields": "id,pagetitle,template"
}]
}
`]]
*/

if (!class_exists(\'MigxGetCollectionTree\')) {
    class MigxGetCollectionTree
    {
        function __construct(modX & $modx, array $config = array())
        {
            $this->modx = &$modx;
            $this->config = $config;
        }

        function getBranch($branch, $foreigns = array(), $level = 1)
        {

            $rows = array();

            if (count($foreigns) > 0) {
                $modx = &$this->modx;

                $local = $modx->getOption(\'local\', $branch, \'\');
                $where = $modx->getOption(\'where\', $branch, array());
                $where = !empty($where) && !is_array($where) ? $modx->fromJSON($where) : $where;
                $where[] = array($local . \':IN\' => $foreigns);

                $branch[\'where\'] = $modx->toJson($where);

                $level++;
                /*
                if ($levelFromCurrent > 0){
                $levelFromCurrent++;    
                }
                */

                $rows = $this->getRows($branch, $level);
            }

            return $rows;
        }

        function getRows($scriptProperties, $level)
        {
            $migx = &$this->migx;
            $modx = &$this->modx;

            $current = $modx->getOption(\'current\', $this->config, \'\');
            $currentKeyField = $modx->getOption(\'currentKeyField\', $this->config, \'id\');
            $currentlabel = $modx->getOption(\'currentlabel\', $this->config, \'current\');
            $classname = $modx->getOption(\'classname\', $scriptProperties, \'\');
			$sortResult = $modx->getOption(\'sortResult\', $scriptProperties, \'\');
            $currentClassname = !empty($this->config[\'currentClassname\']) ? $this->config[\'currentClassname\'] : $classname;

            $activelabel = $modx->getOption(\'activelabel\', $this->config, \'active\');
            $return = $modx->getOption(\'return\', $this->config, \'parsed\');

            $xpdo = $migx->getXpdoInstanceAndAddPackage($scriptProperties);
            $c = $migx->prepareQuery($xpdo, $scriptProperties);
            $rows = $migx->getCollection($c);

            $branches = $modx->getOption(\'_branches\', $scriptProperties, array());

            $collectedSubrows = array();
            foreach ($branches as $branch) {
                $foreign = $modx->getOption(\'foreign\', $branch, \'\');
                $local = $modx->getOption(\'local\', $branch, \'\');
                $alias = $modx->getOption(\'alias\', $branch, \'\');
                //$activeonly = $modx->getOption(\'activeonly\', $branch, \'\');
                $foreigns = array();
                foreach ($rows as $row) {
                    $foreigns[] = $row[$foreign];
                }

                $subrows = $this->getBranch($branch, $foreigns, $level);
                foreach ($subrows as $subrow) {

                    $collectedSubrows[$subrow[$local]][] = $subrow;
                    $subrow[\'_active\'] = $modx->getOption(\'_active\', $subrow, \'0\');
                    /*
                    if (!empty($activeonly) && $subrow[\'_active\'] != \'1\') {
                    $output = \'\';
                    } else {
                    $collectedSubrows[$subrow[$local]][] = $subrow;
                    }
                    */
                    if ($subrow[\'_active\'] == \'1\') {
                        //echo \'active subrow:<pre>\' . print_r($subrow,1) . \'</pre>\';
                        $activesubrow[$subrow[$local]] = true;
                    }
                    if ($subrow[\'_current\'] == \'1\') {
                        //echo \'active subrow:<pre>\' . print_r($subrow,1) . \'</pre>\';
                        $currentsubrow[$subrow[$local]] = true;
                    }


                }
                //insert subrows
                $temprows = $rows;
                $rows = array();
                foreach ($temprows as $row) {
                    if (isset($collectedSubrows[$row[$foreign]])) {
                        $row[\'_active\'] = \'0\';
                        $row[\'_currentparent\'] = \'0\';
                        if (isset($activesubrow[$row[$foreign]]) && $activesubrow[$row[$foreign]]) {
                            $row[\'_active\'] = \'1\';
                            //echo \'active row:<pre>\' . print_r($row,1) . \'</pre>\';
                        }
                        if (isset($currentsubrow[$row[$foreign]]) && $currentsubrow[$row[$foreign]]) {
                            $row[\'_currentparent\'] = \'1\';
                            //echo \'active row:<pre>\' . print_r($row,1) . \'</pre>\';
                        }

                        //render innerrows
                        //$output = $migx->renderOutput($collectedSubrows[$row[$foreign]],$scriptProperties);
                        //$output = $collectedSubrows[$row[$foreign]];

                        $row[\'innercounts.\' . $alias] = count($collectedSubrows[$row[$foreign]]);
                        $row[\'_scriptProperties\'][$alias] = $branch;
                        /*
                        switch ($return) {
                        case \'parsed\':
                        $output = $migx->renderOutput($collectedSubrows[$row[$foreign]], $branch);
                        //$subbranches = $modx->getOption(\'_branches\', $branch, array());
                        //if there are any placeholders left with the same alias from subbranch, remove them
                        $output = str_replace(\'[[+innerrows.\' . $alias . \']]\', \'\', $output);
                        break;
                        case \'json\':
                        case \'arrayprint\':
                        $output = $collectedSubrows[$row[$foreign]];
                        break;
                        }
                        */
                        $output = $collectedSubrows[$row[$foreign]];

                        $row[\'innerrows.\' . $alias] = $output;

                    }
                    $rows[] = $row;
                }

            }

            $temprows = $rows;
            $rows = array();
            foreach ($temprows as $row) {
                //add additional placeholders
                $row[\'_level\'] = $level;
                $row[\'_active\'] = $modx->getOption(\'_active\', $row, \'0\');
                if ($currentClassname == $classname && $row[$currentKeyField] == $current) {
                    $row[\'_current\'] = \'1\';
                    $row[\'_currentlabel\'] = $currentlabel;
                    $row[\'_active\'] = \'1\';
                } else {
                    $row[\'_current\'] = \'0\';
                    $row[\'_currentlabel\'] = \'\';
                }
                if ($row[\'_active\'] == \'1\') {
                    $row[\'_activelabel\'] = $activelabel;
                } else {
                    $row[\'_activelabel\'] = \'\';
                }
                $rows[] = $row;
            }

            if (!empty($sortResult) && is_array($sortResult)){
                $rows = $migx->sortDbResult($rows, $sortResult);
			}

            return $rows;
        }

        function renderRow($row, $levelFromCurrent = 0)
        {
            $migx = &$this->migx;
            $modx = &$this->modx;
            $return = $modx->getOption(\'return\', $this->config, \'parsed\');
            $branchProperties = $modx->getOption(\'_scriptProperties\', $row, array());
            $current = $modx->getOption(\'_current\', $row, \'0\');
            $currentparent = $modx->getOption(\'_currentparent\', $row, \'0\');
            $levelFromCurrent = $current == \'1\' ? 1 : $levelFromCurrent;
            $row[\'_levelFromCurrent\'] = $levelFromCurrent;
            foreach ($branchProperties as $alias => $properties) {
                $innerrows = $modx->getOption(\'innerrows.\' . $alias, $row, array());
                $subrows = $this->renderRows($innerrows, $properties, $levelFromCurrent, $currentparent);
                if ($return == \'parsed\') {
                    $subrows = $migx->renderOutput($subrows, $properties);
                }
                $row[\'innerrows.\' . $alias] = $subrows;
            }

            return $row;
        }

        function renderRows($rows, $scriptProperties, $levelFromCurrent = 0, $siblingOfCurrent = \'0\')
        {

            $modx = &$this->modx;
            $temprows = $rows;
            $rows = array();
            if ($levelFromCurrent > 0) {
                $levelFromCurrent++;
            }
            foreach ($temprows as $row) {
                $row[\'_siblingOfCurrent\'] = $siblingOfCurrent;
                $row = $this->renderRow($row, $levelFromCurrent);
                $rows[] = $row;
            }
            return $rows;
        }
    }
}

$instance = new MigxGetCollectionTree($modx, $scriptProperties);

if (is_array($treeSchema)) {
    $scriptProperties = $treeSchema;

    $migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
    if (!($migx instanceof Migx))
        return \'\';

    $defaultcontext = \'web\';
    $migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;
    $instance->migx = &$migx;

    $level = 1;
    $scriptProperties[\'alias\'] = \'row\';
    $rows = $instance->getRows($scriptProperties, $level);

    $row = array();
    $row[\'innercounts.row\'] = count($rows);
    $row[\'innerrows.row\'] = $rows;
    $row[\'_scriptProperties\'][\'row\'] = $scriptProperties;

    $rows = $instance->renderRow($row);

    $output = \'\';
    switch ($return) {
        case \'parsed\':
            $output = $modx->getOption(\'innerrows.row\', $rows, \'\');
            break;
        case \'json\':
            $output = $modx->toJson($rows);
            break;
        case \'arrayprint\':
            $output = \'<pre>\' . print_r($rows, 1) . \'</pre>\';
            break;
    }

    return $output;

}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * migxGetCollectionTree
 *
 * Copyright 2014 by Bruno Perner <b.perner@gmx.de>
 *
 * migxGetCollectionTree is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * migxGetCollectionTree is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * migxGetCollectionTree; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package migx
 */
/**
 * migxGetCollectionTree
 *
 *          display nested items from different objects. The tree-schema is defined by a json-property. 
 *
 * @version 1.0.0
 * @author Bruno Perner <b.perner@gmx.de>
 * @copyright Copyright &copy; 2014
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License
 * version 2 or (at your option) any later version.
 * @package migx
 */

$treeSchema = $modx->getOption(\'treeSchema\', $scriptProperties, \'\');
$treeSchema = $modx->fromJson($treeSchema);

$scriptProperties[\'current\'] = $modx->getOption(\'current\', $scriptProperties, \'\');
$scriptProperties[\'currentClassname\'] = $modx->getOption(\'currentClassname\', $scriptProperties, \'\');
$scriptProperties[\'currentKeyField\'] = $modx->getOption(\'currentKeyField\', $scriptProperties, \'id\');
$return = $modx->getOption(\'return\', $scriptProperties, \'parsed\'); //parsed,json,arrayprint

/*
Examples:

Get Resource-Tree, 4 levels deep

[[!migxGetCollectionTree?
&current=`57`
&currentClassname=`modResource`
&treeSchema=`
{
"classname": "modResource",
"debug": "1",
"tpl": "mgctResourceTree",
"wrapperTpl": "@CODE:<ul>[[+output]]</ul>",
"selectfields": "id,pagetitle",
"where": {
"parent": "0",
"published": "1",
"deleted": "0"
},
"_branches": [{
"alias": "children",
"classname": "modResource",
"local": "parent",
"foreign": "id",
"tpl": "mgctResourceTree",
"debug": "1",
"selectfields": "id,pagetitle,parent",
"_branches": [{
"alias": "children",
"classname": "modResource",
"local": "parent",
"foreign": "id",
"tpl": "mgctResourceTree",
"debug": "1",
"selectfields": "id,pagetitle,parent",
"where": {
"published": "1",
"deleted": "0"
},
"_branches": [{
"alias": "children",
"classname": "modResource",
"local": "parent",
"foreign": "id",
"tpl": "mgctResourceTree",
"debug": "1",
"selectfields": "id,pagetitle,parent",
"where": {
"published": "1",
"deleted": "0"
}
}]
}]
}]
}
`]]

the chunk mgctResourceTree:
<li class="[[+_activelabel]] [[+_currentlabel]]" ><a href="[[~[[+id]]]]">[[+pagetitle]]([[+id]])</a></li>
[[+innercounts.children:gt=`0`:then=`
<ul>[[+innerrows.children]]</ul>
`:else=``]]

get all Templates and its Resources:

[[!migxGetCollectionTree?
&treeSchema=`
{
"classname": "modTemplate",
"debug": "1",
"tpl": "@CODE:<h3>[[+templatename]]</h3><ul>[[+innerrows.resource]]</ul>",
"selectfields": "id,templatename",
"_branches": [{
"alias": "resource",
"classname": "modResource",
"local": "template",
"foreign": "id",
"tpl": "@CODE:<li>[[+pagetitle]]([[+id]])</li>",
"debug": "1",
"selectfields": "id,pagetitle,template"
}]
}
`]]
*/

if (!class_exists(\'MigxGetCollectionTree\')) {
    class MigxGetCollectionTree
    {
        function __construct(modX & $modx, array $config = array())
        {
            $this->modx = &$modx;
            $this->config = $config;
        }

        function getBranch($branch, $foreigns = array(), $level = 1)
        {

            $rows = array();

            if (count($foreigns) > 0) {
                $modx = &$this->modx;

                $local = $modx->getOption(\'local\', $branch, \'\');
                $where = $modx->getOption(\'where\', $branch, array());
                $where = !empty($where) && !is_array($where) ? $modx->fromJSON($where) : $where;
                $where[] = array($local . \':IN\' => $foreigns);

                $branch[\'where\'] = $modx->toJson($where);

                $level++;
                /*
                if ($levelFromCurrent > 0){
                $levelFromCurrent++;    
                }
                */

                $rows = $this->getRows($branch, $level);
            }

            return $rows;
        }

        function getRows($scriptProperties, $level)
        {
            $migx = &$this->migx;
            $modx = &$this->modx;

            $current = $modx->getOption(\'current\', $this->config, \'\');
            $currentKeyField = $modx->getOption(\'currentKeyField\', $this->config, \'id\');
            $currentlabel = $modx->getOption(\'currentlabel\', $this->config, \'current\');
            $classname = $modx->getOption(\'classname\', $scriptProperties, \'\');
			$sortResult = $modx->getOption(\'sortResult\', $scriptProperties, \'\');
            $currentClassname = !empty($this->config[\'currentClassname\']) ? $this->config[\'currentClassname\'] : $classname;

            $activelabel = $modx->getOption(\'activelabel\', $this->config, \'active\');
            $return = $modx->getOption(\'return\', $this->config, \'parsed\');

            $xpdo = $migx->getXpdoInstanceAndAddPackage($scriptProperties);
            $c = $migx->prepareQuery($xpdo, $scriptProperties);
            $rows = $migx->getCollection($c);

            $branches = $modx->getOption(\'_branches\', $scriptProperties, array());

            $collectedSubrows = array();
            foreach ($branches as $branch) {
                $foreign = $modx->getOption(\'foreign\', $branch, \'\');
                $local = $modx->getOption(\'local\', $branch, \'\');
                $alias = $modx->getOption(\'alias\', $branch, \'\');
                //$activeonly = $modx->getOption(\'activeonly\', $branch, \'\');
                $foreigns = array();
                foreach ($rows as $row) {
                    $foreigns[] = $row[$foreign];
                }

                $subrows = $this->getBranch($branch, $foreigns, $level);
                foreach ($subrows as $subrow) {

                    $collectedSubrows[$subrow[$local]][] = $subrow;
                    $subrow[\'_active\'] = $modx->getOption(\'_active\', $subrow, \'0\');
                    /*
                    if (!empty($activeonly) && $subrow[\'_active\'] != \'1\') {
                    $output = \'\';
                    } else {
                    $collectedSubrows[$subrow[$local]][] = $subrow;
                    }
                    */
                    if ($subrow[\'_active\'] == \'1\') {
                        //echo \'active subrow:<pre>\' . print_r($subrow,1) . \'</pre>\';
                        $activesubrow[$subrow[$local]] = true;
                    }
                    if ($subrow[\'_current\'] == \'1\') {
                        //echo \'active subrow:<pre>\' . print_r($subrow,1) . \'</pre>\';
                        $currentsubrow[$subrow[$local]] = true;
                    }


                }
                //insert subrows
                $temprows = $rows;
                $rows = array();
                foreach ($temprows as $row) {
                    if (isset($collectedSubrows[$row[$foreign]])) {
                        $row[\'_active\'] = \'0\';
                        $row[\'_currentparent\'] = \'0\';
                        if (isset($activesubrow[$row[$foreign]]) && $activesubrow[$row[$foreign]]) {
                            $row[\'_active\'] = \'1\';
                            //echo \'active row:<pre>\' . print_r($row,1) . \'</pre>\';
                        }
                        if (isset($currentsubrow[$row[$foreign]]) && $currentsubrow[$row[$foreign]]) {
                            $row[\'_currentparent\'] = \'1\';
                            //echo \'active row:<pre>\' . print_r($row,1) . \'</pre>\';
                        }

                        //render innerrows
                        //$output = $migx->renderOutput($collectedSubrows[$row[$foreign]],$scriptProperties);
                        //$output = $collectedSubrows[$row[$foreign]];

                        $row[\'innercounts.\' . $alias] = count($collectedSubrows[$row[$foreign]]);
                        $row[\'_scriptProperties\'][$alias] = $branch;
                        /*
                        switch ($return) {
                        case \'parsed\':
                        $output = $migx->renderOutput($collectedSubrows[$row[$foreign]], $branch);
                        //$subbranches = $modx->getOption(\'_branches\', $branch, array());
                        //if there are any placeholders left with the same alias from subbranch, remove them
                        $output = str_replace(\'[[+innerrows.\' . $alias . \']]\', \'\', $output);
                        break;
                        case \'json\':
                        case \'arrayprint\':
                        $output = $collectedSubrows[$row[$foreign]];
                        break;
                        }
                        */
                        $output = $collectedSubrows[$row[$foreign]];

                        $row[\'innerrows.\' . $alias] = $output;

                    }
                    $rows[] = $row;
                }

            }

            $temprows = $rows;
            $rows = array();
            foreach ($temprows as $row) {
                //add additional placeholders
                $row[\'_level\'] = $level;
                $row[\'_active\'] = $modx->getOption(\'_active\', $row, \'0\');
                if ($currentClassname == $classname && $row[$currentKeyField] == $current) {
                    $row[\'_current\'] = \'1\';
                    $row[\'_currentlabel\'] = $currentlabel;
                    $row[\'_active\'] = \'1\';
                } else {
                    $row[\'_current\'] = \'0\';
                    $row[\'_currentlabel\'] = \'\';
                }
                if ($row[\'_active\'] == \'1\') {
                    $row[\'_activelabel\'] = $activelabel;
                } else {
                    $row[\'_activelabel\'] = \'\';
                }
                $rows[] = $row;
            }

            if (!empty($sortResult) && is_array($sortResult)){
                $rows = $migx->sortDbResult($rows, $sortResult);
			}

            return $rows;
        }

        function renderRow($row, $levelFromCurrent = 0)
        {
            $migx = &$this->migx;
            $modx = &$this->modx;
            $return = $modx->getOption(\'return\', $this->config, \'parsed\');
            $branchProperties = $modx->getOption(\'_scriptProperties\', $row, array());
            $current = $modx->getOption(\'_current\', $row, \'0\');
            $currentparent = $modx->getOption(\'_currentparent\', $row, \'0\');
            $levelFromCurrent = $current == \'1\' ? 1 : $levelFromCurrent;
            $row[\'_levelFromCurrent\'] = $levelFromCurrent;
            foreach ($branchProperties as $alias => $properties) {
                $innerrows = $modx->getOption(\'innerrows.\' . $alias, $row, array());
                $subrows = $this->renderRows($innerrows, $properties, $levelFromCurrent, $currentparent);
                if ($return == \'parsed\') {
                    $subrows = $migx->renderOutput($subrows, $properties);
                }
                $row[\'innerrows.\' . $alias] = $subrows;
            }

            return $row;
        }

        function renderRows($rows, $scriptProperties, $levelFromCurrent = 0, $siblingOfCurrent = \'0\')
        {

            $modx = &$this->modx;
            $temprows = $rows;
            $rows = array();
            if ($levelFromCurrent > 0) {
                $levelFromCurrent++;
            }
            foreach ($temprows as $row) {
                $row[\'_siblingOfCurrent\'] = $siblingOfCurrent;
                $row = $this->renderRow($row, $levelFromCurrent);
                $rows[] = $row;
            }
            return $rows;
        }
    }
}

$instance = new MigxGetCollectionTree($modx, $scriptProperties);

if (is_array($treeSchema)) {
    $scriptProperties = $treeSchema;

    $migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
    if (!($migx instanceof Migx))
        return \'\';

    $defaultcontext = \'web\';
    $migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;
    $instance->migx = &$migx;

    $level = 1;
    $scriptProperties[\'alias\'] = \'row\';
    $rows = $instance->getRows($scriptProperties, $level);

    $row = array();
    $row[\'innercounts.row\'] = count($rows);
    $row[\'innerrows.row\'] = $rows;
    $row[\'_scriptProperties\'][\'row\'] = $scriptProperties;

    $rows = $instance->renderRow($row);

    $output = \'\';
    switch ($return) {
        case \'parsed\':
            $output = $modx->getOption(\'innerrows.row\', $rows, \'\');
            break;
        case \'json\':
            $output = $modx->toJson($rows);
            break;
        case \'arrayprint\':
            $output = \'<pre>\' . print_r($rows, 1) . \'</pre>\';
            break;
    }

    return $output;

}',
    ),
  ),
  'e1a8e3f3fc18fdde95c5e49736990be2' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxIsNewObject',
    ),
    'object' => 
    array (
      'id' => 35,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxIsNewObject',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => 'if (isset($_REQUEST[\'object_id\']) && $_REQUEST[\'object_id\']==\'new\'){
    return 1;
}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => 'if (isset($_REQUEST[\'object_id\']) && $_REQUEST[\'object_id\']==\'new\'){
    return 1;
}',
    ),
  ),
  '7714923e7c08f277c60a3b52cdf54d07' => 
  array (
    'criteria' => 
    array (
      'name' => 'migx_example_validate',
    ),
    'object' => 
    array (
      'id' => 36,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migx_example_validate',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$properties = &$modx->getOption(\'scriptProperties\', $scriptProperties, array());
$object = &$modx->getOption(\'object\', $scriptProperties, null);
$postvalues = &$modx->getOption(\'postvalues\', $scriptProperties, array());
$form_field = $modx->getOption(\'form_field\', $scriptProperties, array());
$value = $modx->getOption(\'value\', $scriptProperties, \'\');
$validation_type = $modx->getOption(\'validation_type\', $scriptProperties, \'\');
$result = \'\';
switch ($validation_type) {
    case \'gt25\':
        if ((int) $value > 25) {
        } else {
            $error_message = $validation_type; // may be custom validation message
            $error[\'caption\'] = $form_field;
            $error[\'validation_type\'] = $error_message;
            $result[\'error\'] = $error;
            $result = $modx->toJson($result);
        }
        break;
}
return $result;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$properties = &$modx->getOption(\'scriptProperties\', $scriptProperties, array());
$object = &$modx->getOption(\'object\', $scriptProperties, null);
$postvalues = &$modx->getOption(\'postvalues\', $scriptProperties, array());
$form_field = $modx->getOption(\'form_field\', $scriptProperties, array());
$value = $modx->getOption(\'value\', $scriptProperties, \'\');
$validation_type = $modx->getOption(\'validation_type\', $scriptProperties, \'\');
$result = \'\';
switch ($validation_type) {
    case \'gt25\':
        if ((int) $value > 25) {
        } else {
            $error_message = $validation_type; // may be custom validation message
            $error[\'caption\'] = $form_field;
            $error[\'validation_type\'] = $error_message;
            $result[\'error\'] = $error;
            $result = $modx->toJson($result);
        }
        break;
}
return $result;',
    ),
  ),
  '81fe107ea4957f4f60fb6fc67de4b6d2' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxHookAftercollectmigxitems',
    ),
    'object' => 
    array (
      'id' => 37,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxHookAftercollectmigxitems',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$configs = $modx->getOption(\'configs\', $_REQUEST, \'\');

$rows = $modx->getOption(\'rows\', $scriptProperties, array());
$newrows = array();


if (is_array($rows)) {
    $max_id = 0;
    $dbfields = array();
    $existing_dbfields = array();
    foreach ($rows as $key => $row) {
        if (isset($row[\'MIGX_id\']) && $row[\'MIGX_id\'] > $max_id) {
            $max_id = $row[\'MIGX_id\'];
        }
        if (isset($row[\'selected_dbfields\']) && isset($row[\'existing_dbfields\'])) {
            $dbfields = is_array($row[\'selected_dbfields\']) ? $row[\'selected_dbfields\'] : array($row[\'selected_dbfields\']);
            
            $existing_dbfields = explode(\'||\', $row[\'existing_dbfields\']);
            //echo \'<pre>\' . print_r($existing_dbfields,1) . \'</pre>\';die();

        } else {
            $newrows[] = $row;
        }

    }

    foreach ($dbfields as $dbfield) {
        if (!empty($dbfield) && !in_array($dbfield, $existing_dbfields)) {
            $max_id++;
            $newrow = array();
            $newrow[\'MIGX_id\'] = $max_id;

            switch ($configs) {
                case \'migxformtabfields\':
                    $newrow[\'field\'] = $dbfield;
                    $newrow[\'caption\'] = $dbfield;
                    break;
                case \'migxcolumns\':
                    $newrow[\'dataIndex\'] = $dbfield;
                    $newrow[\'header\'] = $dbfield;
                    break;                    
            }


            $newrows[] = $newrow;
        }
    }


}


return json_encode($newrows);',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$configs = $modx->getOption(\'configs\', $_REQUEST, \'\');

$rows = $modx->getOption(\'rows\', $scriptProperties, array());
$newrows = array();


if (is_array($rows)) {
    $max_id = 0;
    $dbfields = array();
    $existing_dbfields = array();
    foreach ($rows as $key => $row) {
        if (isset($row[\'MIGX_id\']) && $row[\'MIGX_id\'] > $max_id) {
            $max_id = $row[\'MIGX_id\'];
        }
        if (isset($row[\'selected_dbfields\']) && isset($row[\'existing_dbfields\'])) {
            $dbfields = is_array($row[\'selected_dbfields\']) ? $row[\'selected_dbfields\'] : array($row[\'selected_dbfields\']);
            
            $existing_dbfields = explode(\'||\', $row[\'existing_dbfields\']);
            //echo \'<pre>\' . print_r($existing_dbfields,1) . \'</pre>\';die();

        } else {
            $newrows[] = $row;
        }

    }

    foreach ($dbfields as $dbfield) {
        if (!empty($dbfield) && !in_array($dbfield, $existing_dbfields)) {
            $max_id++;
            $newrow = array();
            $newrow[\'MIGX_id\'] = $max_id;

            switch ($configs) {
                case \'migxformtabfields\':
                    $newrow[\'field\'] = $dbfield;
                    $newrow[\'caption\'] = $dbfield;
                    break;
                case \'migxcolumns\':
                    $newrow[\'dataIndex\'] = $dbfield;
                    $newrow[\'header\'] = $dbfield;
                    break;                    
            }


            $newrows[] = $newrow;
        }
    }


}


return json_encode($newrows);',
    ),
  ),
  '37346a648277b805cf1bc7d8c0bdddf0' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxAutoPublish',
    ),
    'object' => 
    array (
      'id' => 38,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxAutoPublish',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '$classnames = explode(\',\', $modx->getOption(\'classnames\',$scriptProperties,\'\'));
$packageName = $modx->getOption(\'packageName\',$scriptProperties,\'\');

switch ($mode) {
    case \'datetime\' :
        $timeNow = strftime(\'%Y-%m-%d %H:%M:%S\');
        break;
    case \'unixtime\' :
        $timeNow = time();
        break;
    default :
        $timeNow = strftime(\'%Y-%m-%d %H:%M:%S\');
        break;
}

$modx->addPackage($packageName, $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/model/\');

foreach ($classnames as $classname) {
    if (!empty($classname)) {
        $tblResource = $modx->getTableName($classname);
        if (!$result = $modx->exec("UPDATE {$tblResource} SET published=1,publishedon=pub_date,pub_date=null WHERE pub_date < \'{$timeNow}\' AND pub_date > 0 AND published=0")) {
            $modx->log(modX::LOG_LEVEL_ERROR, \'Error while refreshing resource publishing data: \' . print_r($modx->errorInfo(), true));
        }
        if (!$result = $modx->exec("UPDATE $tblResource SET published=0,unpub_date=null WHERE unpub_date < \'{$timeNow}\' AND unpub_date IS NOT NULL AND unpub_date > 0 AND published=1")) {
            $modx->log(modX::LOG_LEVEL_ERROR, \'Error while refreshing resource unpublishing data: \' . print_r($modx->errorInfo(), true));
        }
    }

}
$modx->cacheManager->refresh();',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$classnames = explode(\',\', $modx->getOption(\'classnames\',$scriptProperties,\'\'));
$packageName = $modx->getOption(\'packageName\',$scriptProperties,\'\');

switch ($mode) {
    case \'datetime\' :
        $timeNow = strftime(\'%Y-%m-%d %H:%M:%S\');
        break;
    case \'unixtime\' :
        $timeNow = time();
        break;
    default :
        $timeNow = strftime(\'%Y-%m-%d %H:%M:%S\');
        break;
}

$modx->addPackage($packageName, $modx->getOption(\'core_path\') . \'components/\' . $packageName . \'/model/\');

foreach ($classnames as $classname) {
    if (!empty($classname)) {
        $tblResource = $modx->getTableName($classname);
        if (!$result = $modx->exec("UPDATE {$tblResource} SET published=1,publishedon=pub_date,pub_date=null WHERE pub_date < \'{$timeNow}\' AND pub_date > 0 AND published=0")) {
            $modx->log(modX::LOG_LEVEL_ERROR, \'Error while refreshing resource publishing data: \' . print_r($modx->errorInfo(), true));
        }
        if (!$result = $modx->exec("UPDATE $tblResource SET published=0,unpub_date=null WHERE unpub_date < \'{$timeNow}\' AND unpub_date IS NOT NULL AND unpub_date > 0 AND published=1")) {
            $modx->log(modX::LOG_LEVEL_ERROR, \'Error while refreshing resource unpublishing data: \' . print_r($modx->errorInfo(), true));
        }
    }

}
$modx->cacheManager->refresh();',
    ),
  ),
  'd14c76dfe68f724b69812aa628e1eca7' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxGetObject',
    ),
    'object' => 
    array (
      'id' => 39,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxGetObject',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'snippet' => '/*
getXpdoInstanceAndAddPackage - properties

$prefix
$usecustomprefix
$packageName


prepareQuery - properties:

$limit
$offset
$totalVar
$where
$queries
$sortConfig
$groupby
$joins
$selectfields
$classname
$debug

renderOutput - properties:

$tpl
$wrapperTpl
$toSeparatePlaceholders
$toPlaceholder
$outputSeparator
$placeholdersKeyField
$toJsonPlaceholder
$jsonVarKey
$addfields

migxGetObject - properties

$id
$toPlaceholders - if not empty, output to placeholders with specified prefix or print the array, if \'print_r\' is the property-value

*/

$id = $modx->getOption(\'id\',$scriptProperties,\'\');
$scriptProperties[\'limit\'] = 1;

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;

$xpdo = $migx->getXpdoInstanceAndAddPackage($scriptProperties);

$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

$c = $migx->prepareQuery($xpdo,$scriptProperties);
if (!empty($id)){
    $c->where(array(\'id\'=>$id));
	$c->prepare();
}	
$rows = $migx->getCollection($c);

$output = $migx->renderOutput($rows,$scriptProperties);

return $output;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/*
getXpdoInstanceAndAddPackage - properties

$prefix
$usecustomprefix
$packageName


prepareQuery - properties:

$limit
$offset
$totalVar
$where
$queries
$sortConfig
$groupby
$joins
$selectfields
$classname
$debug

renderOutput - properties:

$tpl
$wrapperTpl
$toSeparatePlaceholders
$toPlaceholder
$outputSeparator
$placeholdersKeyField
$toJsonPlaceholder
$jsonVarKey
$addfields

migxGetObject - properties

$id
$toPlaceholders - if not empty, output to placeholders with specified prefix or print the array, if \'print_r\' is the property-value

*/

$id = $modx->getOption(\'id\',$scriptProperties,\'\');
$scriptProperties[\'limit\'] = 1;

$migx = $modx->getService(\'migx\', \'Migx\', $modx->getOption(\'migx.core_path\', null, $modx->getOption(\'core_path\') . \'components/migx/\') . \'model/migx/\', $scriptProperties);
if (!($migx instanceof Migx))
    return \'\';
//$modx->migx = &$migx;

$xpdo = $migx->getXpdoInstanceAndAddPackage($scriptProperties);

$defaultcontext = \'web\';
$migx->working_context = isset($modx->resource) ? $modx->resource->get(\'context_key\') : $defaultcontext;

$c = $migx->prepareQuery($xpdo,$scriptProperties);
if (!empty($id)){
    $c->where(array(\'id\'=>$id));
	$c->prepare();
}	
$rows = $migx->getCollection($c);

$output = $migx->renderOutput($rows,$scriptProperties);

return $output;',
    ),
  ),
  '248bb46f65e19c271326d86542fe5979' => 
  array (
    'criteria' => 
    array (
      'name' => 'MIGX',
    ),
    'object' => 
    array (
      'id' => 6,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'MIGX',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'plugincode' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
    ),
  ),
  'be98b587d647257318b441a7d386fded' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 6,
      'event' => 'OnDocFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 6,
      'event' => 'OnDocFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '8b49450a8cfdfa3f6af204f83ca8442e' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 6,
      'event' => 'OnTVInputPropertiesList',
    ),
    'object' => 
    array (
      'pluginid' => 6,
      'event' => 'OnTVInputPropertiesList',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '868e24c7994b884e7e3f8b34a5b80ee5' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 6,
      'event' => 'OnTVInputRenderList',
    ),
    'object' => 
    array (
      'pluginid' => 6,
      'event' => 'OnTVInputRenderList',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '4ebe6326c60be8aff038396025755cb4' => 
  array (
    'criteria' => 
    array (
      'name' => 'MIGXquip',
    ),
    'object' => 
    array (
      'id' => 7,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'MIGXquip',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'plugincode' => '$quipCorePath = $modx->getOption(\'quip.core_path\', null, $modx->getOption(\'core_path\') . \'components/quip/\');
//$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name)
{

    case \'OnDocFormPrerender\':

        
        require_once $quipCorePath . \'model/quip/quip.class.php\';
        $modx->quip = new Quip($modx);

        $modx->lexicon->load(\'quip:default\');
        $quipconfig = $modx->toJson($modx->quip->config);
        
        $js = "
        Quip.config = Ext.util.JSON.decode(\'{$quipconfig}\');
        console.log(Quip);";

        //$modx->controller->addCss($assetsUrl . \'css/mgr.css\');
        $modx->controller->addJavascript($modx->quip->config[\'jsUrl\'].\'quip.js\');
        $modx->controller->addHtml(\'<script type="text/javascript">\' . $js . \'</script>\');
        break;

}
return;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 1,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '$quipCorePath = $modx->getOption(\'quip.core_path\', null, $modx->getOption(\'core_path\') . \'components/quip/\');
//$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name)
{

    case \'OnDocFormPrerender\':

        
        require_once $quipCorePath . \'model/quip/quip.class.php\';
        $modx->quip = new Quip($modx);

        $modx->lexicon->load(\'quip:default\');
        $quipconfig = $modx->toJson($modx->quip->config);
        
        $js = "
        Quip.config = Ext.util.JSON.decode(\'{$quipconfig}\');
        console.log(Quip);";

        //$modx->controller->addCss($assetsUrl . \'css/mgr.css\');
        $modx->controller->addJavascript($modx->quip->config[\'jsUrl\'].\'quip.js\');
        $modx->controller->addHtml(\'<script type="text/javascript">\' . $js . \'</script>\');
        break;

}
return;',
    ),
  ),
  '39ca5260d86079804c9d09d546dd3122' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 7,
      'event' => 'OnDocFormPrerender',
    ),
    'object' => 
    array (
      'pluginid' => 7,
      'event' => 'OnDocFormPrerender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'cfe4b9e4fed7a89219663ef9bc88d44b' => 
  array (
    'criteria' => 
    array (
      'name' => 'migxResizeOnUpload',
    ),
    'object' => 
    array (
      'id' => 8,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxResizeOnUpload',
      'description' => '',
      'editor_type' => 0,
      'category' => 7,
      'cache_type' => 0,
      'plugincode' => '/**
 * migxResizeOnUpload Plugin
 *
 * Events: OnFileManagerUpload
 * Author: Bruno Perner <b.perner@gmx.de>
 * Modified to read multiple configs from mediasource-property
 * 
 * First Author: Vasiliy Naumkin <bezumkin@yandex.ru>
 * Required: PhpThumbOf snippet for resizing images
 * 
 * Example: mediasource - property \'resizeConfig\':
 * [{"alias":"origin","w":"500","h":"500","far":1},{"alias":"thumb","w":"150","h":"150","far":1}]
 */

if ($modx->event->name != \'OnFileManagerUpload\') {
    return;
}


$file = $modx->event->params[\'files\'][\'file\'];
$directory = $modx->event->params[\'directory\'];

if ($file[\'error\'] != 0) {
    return;
}

$name = $file[\'name\'];
//$extensions = explode(\',\', $modx->getOption(\'upload_images\'));

$source = $modx->event->params[\'source\'];

if ($source instanceof modMediaSource) {
    //$dirTree = $modx->getOption(\'dirtree\', $_REQUEST, \'\');
    //$modx->setPlaceholder(\'docid\', $resource_id);
    $source->initialize();
    $basePath = str_replace(\'/./\', \'/\', $source->getBasePath());
    //$cachepath = $cachepath . $dirTree;
    $baseUrl = $modx->getOption(\'site_url\') . $source->getBaseUrl();
    //$baseUrl = $baseUrl . $dirTree;
    $sourceProperties = $source->getPropertyList();

    //echo \'<pre>\' . print_r($sourceProperties, 1) . \'</pre>\';
    //$allowedExtensions = $modx->getOption(\'allowedFileTypes\', $sourceProperties, \'\');
    //$allowedExtensions = empty($allowedExtensions) ? \'jpg,jpeg,png,gif\' : $allowedExtensions;
    //$maxFilesizeMb = $modx->getOption(\'maxFilesizeMb\', $sourceProperties, \'8\');
    //$maxFiles = $modx->getOption(\'maxFiles\', $sourceProperties, \'0\');
    //$thumbX = $modx->getOption(\'thumbX\', $sourceProperties, \'100\');
    //$thumbY = $modx->getOption(\'thumbY\', $sourceProperties, \'100\');
    $resizeConfigs = $modx->getOption(\'resizeConfigs\', $sourceProperties, \'\');
    $resizeConfigs = $modx->fromJson($resizeConfigs);
    $thumbscontainer = $modx->getOption(\'thumbscontainer\', $sourceProperties, \'thumbs/\');
    $imageExtensions = $modx->getOption(\'imageExtensions\', $sourceProperties, \'jpg,jpeg,png,gif,JPG\');
    $imageExtensions = explode(\',\', $imageExtensions);
    //$uniqueFilenames = $modx->getOption(\'uniqueFilenames\', $sourceProperties, false);
    //$onImageUpload = $modx->getOption(\'onImageUpload\', $sourceProperties, \'\');
    //$onImageRemove = $modx->getOption(\'onImageRemove\', $sourceProperties, \'\');
    $cleanalias = $modx->getOption(\'cleanFilename\', $sourceProperties, false);

}

if (is_array($resizeConfigs) && count($resizeConfigs) > 0) {
    foreach ($resizeConfigs as $rc) {
        if (isset($rc[\'alias\'])) {
            $filePath = $basePath . $directory;
            $filePath = str_replace(\'//\',\'/\',$filePath);
            if ($rc[\'alias\'] == \'origin\') {
                $thumbPath = $filePath;
            } else {
                $thumbPath = $filePath . $rc[\'alias\'] . \'/\';
                $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
                if (!@mkdir($thumbPath, $permissions, true)) {
                    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $thumbPath));
                } else {
                    chmod($thumbPath, $permissions);
                }

            }


            $filename = $filePath . $name;
            $thumbname = $thumbPath . $name;
            $ext = substr(strrchr($name, \'.\'), 1);
            if (in_array($ext, $imageExtensions)) {
                $sizes = getimagesize($filename);
                echo $sizes[0]; 
                //$format = substr($sizes[\'mime\'], 6);
                if ($sizes[0] > $rc[\'w\'] || $sizes[1] > $rc[\'h\']) {
                    if ($sizes[0] < $rc[\'w\']) {
                        $rc[\'w\'] = $sizes[0];
                    }
                    if ($sizes[1] < $rc[\'h\']) {
                        $rc[\'h\'] = $sizes[1];
                    }
                    $type = $sizes[0] > $sizes[1] ? \'landscape\' : \'portrait\';
                    if (isset($rc[\'far\']) && $rc[\'far\'] == \'1\' && isset($rc[\'w\']) && isset($rc[\'h\'])) {
                        if ($type = \'landscape\') {
                            unset($rc[\'h\']);
                        }else {
                            unset($rc[\'w\']);
                        }
                    }

                    $options = \'\';
                    foreach ($rc as $k => $v) {
                        if ($k != \'alias\') {
                            $options .= \'&\' . $k . \'=\' . $v;
                        }
                    }
                    $resized = $modx->runSnippet(\'phpthumbof\', array(\'input\' => $filePath . $name, \'options\' => $options));
                    rename(MODX_BASE_PATH . substr($resized, 1), $thumbname);
                }
            }


        }
    }
}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * migxResizeOnUpload Plugin
 *
 * Events: OnFileManagerUpload
 * Author: Bruno Perner <b.perner@gmx.de>
 * Modified to read multiple configs from mediasource-property
 * 
 * First Author: Vasiliy Naumkin <bezumkin@yandex.ru>
 * Required: PhpThumbOf snippet for resizing images
 * 
 * Example: mediasource - property \'resizeConfig\':
 * [{"alias":"origin","w":"500","h":"500","far":1},{"alias":"thumb","w":"150","h":"150","far":1}]
 */

if ($modx->event->name != \'OnFileManagerUpload\') {
    return;
}


$file = $modx->event->params[\'files\'][\'file\'];
$directory = $modx->event->params[\'directory\'];

if ($file[\'error\'] != 0) {
    return;
}

$name = $file[\'name\'];
//$extensions = explode(\',\', $modx->getOption(\'upload_images\'));

$source = $modx->event->params[\'source\'];

if ($source instanceof modMediaSource) {
    //$dirTree = $modx->getOption(\'dirtree\', $_REQUEST, \'\');
    //$modx->setPlaceholder(\'docid\', $resource_id);
    $source->initialize();
    $basePath = str_replace(\'/./\', \'/\', $source->getBasePath());
    //$cachepath = $cachepath . $dirTree;
    $baseUrl = $modx->getOption(\'site_url\') . $source->getBaseUrl();
    //$baseUrl = $baseUrl . $dirTree;
    $sourceProperties = $source->getPropertyList();

    //echo \'<pre>\' . print_r($sourceProperties, 1) . \'</pre>\';
    //$allowedExtensions = $modx->getOption(\'allowedFileTypes\', $sourceProperties, \'\');
    //$allowedExtensions = empty($allowedExtensions) ? \'jpg,jpeg,png,gif\' : $allowedExtensions;
    //$maxFilesizeMb = $modx->getOption(\'maxFilesizeMb\', $sourceProperties, \'8\');
    //$maxFiles = $modx->getOption(\'maxFiles\', $sourceProperties, \'0\');
    //$thumbX = $modx->getOption(\'thumbX\', $sourceProperties, \'100\');
    //$thumbY = $modx->getOption(\'thumbY\', $sourceProperties, \'100\');
    $resizeConfigs = $modx->getOption(\'resizeConfigs\', $sourceProperties, \'\');
    $resizeConfigs = $modx->fromJson($resizeConfigs);
    $thumbscontainer = $modx->getOption(\'thumbscontainer\', $sourceProperties, \'thumbs/\');
    $imageExtensions = $modx->getOption(\'imageExtensions\', $sourceProperties, \'jpg,jpeg,png,gif,JPG\');
    $imageExtensions = explode(\',\', $imageExtensions);
    //$uniqueFilenames = $modx->getOption(\'uniqueFilenames\', $sourceProperties, false);
    //$onImageUpload = $modx->getOption(\'onImageUpload\', $sourceProperties, \'\');
    //$onImageRemove = $modx->getOption(\'onImageRemove\', $sourceProperties, \'\');
    $cleanalias = $modx->getOption(\'cleanFilename\', $sourceProperties, false);

}

if (is_array($resizeConfigs) && count($resizeConfigs) > 0) {
    foreach ($resizeConfigs as $rc) {
        if (isset($rc[\'alias\'])) {
            $filePath = $basePath . $directory;
            $filePath = str_replace(\'//\',\'/\',$filePath);
            if ($rc[\'alias\'] == \'origin\') {
                $thumbPath = $filePath;
            } else {
                $thumbPath = $filePath . $rc[\'alias\'] . \'/\';
                $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
                if (!@mkdir($thumbPath, $permissions, true)) {
                    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $thumbPath));
                } else {
                    chmod($thumbPath, $permissions);
                }

            }


            $filename = $filePath . $name;
            $thumbname = $thumbPath . $name;
            $ext = substr(strrchr($name, \'.\'), 1);
            if (in_array($ext, $imageExtensions)) {
                $sizes = getimagesize($filename);
                echo $sizes[0]; 
                //$format = substr($sizes[\'mime\'], 6);
                if ($sizes[0] > $rc[\'w\'] || $sizes[1] > $rc[\'h\']) {
                    if ($sizes[0] < $rc[\'w\']) {
                        $rc[\'w\'] = $sizes[0];
                    }
                    if ($sizes[1] < $rc[\'h\']) {
                        $rc[\'h\'] = $sizes[1];
                    }
                    $type = $sizes[0] > $sizes[1] ? \'landscape\' : \'portrait\';
                    if (isset($rc[\'far\']) && $rc[\'far\'] == \'1\' && isset($rc[\'w\']) && isset($rc[\'h\'])) {
                        if ($type = \'landscape\') {
                            unset($rc[\'h\']);
                        }else {
                            unset($rc[\'w\']);
                        }
                    }

                    $options = \'\';
                    foreach ($rc as $k => $v) {
                        if ($k != \'alias\') {
                            $options .= \'&\' . $k . \'=\' . $v;
                        }
                    }
                    $resized = $modx->runSnippet(\'phpthumbof\', array(\'input\' => $filePath . $name, \'options\' => $options));
                    rename(MODX_BASE_PATH . substr($resized, 1), $thumbname);
                }
            }


        }
    }
}',
    ),
  ),
  '5cfab34fe7ff80fd4b01b14f76e088da' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 8,
      'event' => 'OnFileManagerUpload',
    ),
    'object' => 
    array (
      'pluginid' => 8,
      'event' => 'OnFileManagerUpload',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '7e12e9515922dce540e1f60a35bfbe35' => 
  array (
    'criteria' => 
    array (
      'text' => 'MIGX',
    ),
    'object' => 
    array (
      'text' => 'MIGX',
      'parent' => 'components',
      'action' => 'index',
      'description' => '',
      'icon' => '',
      'menuindex' => 1,
      'params' => '&configs=migxconfigs||packagemanager',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'migx',
    ),
  ),
);