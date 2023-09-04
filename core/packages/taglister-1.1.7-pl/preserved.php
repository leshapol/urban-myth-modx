<?php return array (
  '6344903f5c5c58ef106aa5df8dbef3c8' => 
  array (
    'criteria' => 
    array (
      'name' => 'taglister',
    ),
    'object' => 
    array (
      'name' => 'taglister',
      'path' => '{core_path}components/taglister/',
      'assets_path' => NULL,
    ),
  ),
  '28e2d62e9e781a9361794110c7c7e19e' => 
  array (
    'criteria' => 
    array (
      'category' => 'tagLister',
    ),
    'object' => 
    array (
      'id' => 13,
      'parent' => 0,
      'category' => 'tagLister',
      'rank' => 0,
    ),
  ),
  'b1ea84500892fffa38bc4bb3df496513' => 
  array (
    'criteria' => 
    array (
      'name' => 'tagLister',
    ),
    'object' => 
    array (
      'id' => 40,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'tagLister',
      'description' => 'A simple tag listing snippet that grabs tags from a TV value.',
      'editor_type' => 0,
      'category' => 13,
      'cache_type' => 0,
      'snippet' => '/**
 * tagLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of tagLister, a simple tag listing snippet for MODx
 * Revolution.
 *
 * tagLister is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * tagLister is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * tagLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package taglister
 */
/**
 * tagLister snippet
 *
 * @var modX $modx
 * @var TagLister $tagLister
 * @var array $scriptProperties
 *
 * @package taglister
 */
$tagLister = $modx->getService(\'taglister\',\'TagLister\',$modx->getOption(\'taglister.core_path\',null,$modx->getOption(\'core_path\').\'components/taglister/\').\'model/taglister/\',$scriptProperties);
if (!($tagLister instanceof TagLister)) return \'\';
$modx->lexicon->load(\'taglister:default\');

/* setup default properties */
$tpl = $modx->getOption(\'tpl\',$scriptProperties,\'tag\');
$tv = $modx->getOption(\'tv\',$scriptProperties,\'tags\');
$tvDelimiter = $modx->getOption(\'tvDelimiter\',$scriptProperties,\',\');
$target = $modx->getOption(\'target\',$scriptProperties,1);
$tagVar = $modx->getOption(\'tagVar\',$scriptProperties,\'tag\');
$tagKeyVar = $modx->getOption(\'tagKeyVar\',$scriptProperties,\'key\');
$limit = $modx->getOption(\'limit\',$scriptProperties,10);
$sortBy = strtolower($modx->getOption(\'sortBy\',$scriptProperties,\'count\'));
$sortDir = strtoupper($modx->getOption(\'sortDir\',$scriptProperties,\'ASC\'));
$cls = $modx->getOption(\'cls\',$scriptProperties,\'\');
$altCls = $modx->getOption(\'altCls\',$scriptProperties,\'\');
$firstCls = $modx->getOption(\'firstCls\',$scriptProperties,\'\');
$lastCls = $modx->getOption(\'lastCls\',$scriptProperties,\'\');
$activeCls = $modx->getOption(\'activeCls\',$scriptProperties,\'\');
$activeTag = isset($_REQUEST[$tagVar]) ? $modx->stripTags(urldecode($_REQUEST[$tagVar])) : \'\';
$activeKey = isset($_REQUEST[$tagKeyVar]) ? $modx->stripTags(urldecode($_REQUEST[$tagKeyVar])) : \'\';
$all = $modx->getOption(\'all\',$scriptProperties,false);
$toLower = $modx->getOption(\'toLower\',$scriptProperties,false);
$weights = $modx->getOption(\'weights\',$scriptProperties,0);
$weightCls = $modx->getOption(\'weightCls\',$scriptProperties,\'\');
$useTagFurl = $modx->getOption(\'useTagFurl\',$scriptProperties,false);
$furlKey = $modx->getOption(\'furlKey\',$scriptProperties,\'tags\');


/* get TV values */
$c = $modx->newQuery(\'modTemplateVarResource\');
$c->innerJoin(\'modTemplateVar\',\'TemplateVar\');
$c->innerJoin(\'modResource\',\'Resource\');
$c->leftJoin(\'modUser\',\'CreatedBy\',\'CreatedBy.id = Resource.createdby\');
$c->leftJoin(\'modUser\',\'PublishedBy\',\'PublishedBy.id = Resource.publishedby\');
$c->leftJoin(\'modUser\',\'EditedBy\',\'EditedBy.id = Resource.editedby\');
$tvPk = (int)$tv;
if (!empty($tvPk)) {
    $c->where(array(\'TemplateVar.id\' => $tvPk));
} else {
    $c->where(array(\'TemplateVar.name\' => $tv));
}
/* parents support */
$parents = isset($parents) ? explode(\',\', $parents) : array();
if (!empty($parents)) {
    $depth = isset($depth) ? (integer) $depth : 10;
    $children = array();
    foreach ($parents as $parent) {
        $kids = $modx->getChildIds($parent,$depth);
        if (!empty($kids)) {
            $children = array_merge($children,$kids);
        }
    }
    if (!empty($children)) {
        $children = array_unique($children);
        $parents = array_merge($parents,$children);
    }
    $parents = array_unique($parents);
    if (!empty($parents)) {
        $c->where(array(
            \'Resource.id:IN\' => $parents,
        ));
    }
}
if (!$modx->getOption(\'includeDeleted\',$scriptProperties,false)) {
    $c->where(array(\'Resource.deleted\' => 0));
}
if (!$modx->getOption(\'includeUnpublished\',$scriptProperties,false)) {
    $c->where(array(\'Resource.published\' => 1));
}
/* json where support */
$where = $modx->getOption(\'where\',$scriptProperties,\'\');
if (!empty($where)) {
    $where = $modx->fromJSON($where);
    if (is_array($where) && !empty($where)) {
        $c->where($where);
    }
}
if ($sortBy == \'publishedon\') {
    $c->sortby(\'Resource.publishedon\',$sortDir);
} else if (in_array($sortBy,array(\'rand\',\'random\',\'rand()\'))) {
    $c->sortby(\'RAND()\',\'\');
}
$tags = $modx->getCollection(\'modTemplateVarResource\',$c);

/* parse TV values */
$output = array();
$tagList = array();
$encoding = $modx->getOption(\'modx_charset\',$scriptProperties,\'UTF-8\');
$useMultibyte = $modx->getOption(\'use_multibyte\',$scriptProperties,false);
/** @var modTemplateVarResource $tag */
foreach ($tags as $tag) {
   $v = $tag->get(\'value\');
   $vs = explode($tvDelimiter,$v);
   foreach ($vs as $key) {
      $key = trim($key);
      if (empty($key)) continue;
      if ($toLower) { /* allow for case-insensitive filtering */
          $key = $useMultibyte ? mb_strtolower($key,$encoding) : strtolower($key);
      }
      /* increment tag count */
      if (empty($tagList[$key])) {
         $tagList[$key] = 1;
      } else { $tagList[$key]++; }
   }
}

/* sort */
switch ($sortBy.\'-\'.$sortDir) {
    case \'publishedon-DESC\': case \'publishedon-ASC\': break;
    case \'tag-ASC\': ksort($tagList); break;
    case \'tag-DESC\': krsort($tagList); break;
    case \'count-DESC\': asort($tagList); break;
    case \'count-ASC\': default: arsort($tagList); break;
    case \'rand-ASC\': case \'random-ASC\': case \'rand()-asc\': $tagList = $tagLister->ashuffle($tagList); break;
}

/* iterate */
$totalTags = 0;
$i = $all ? 1 : 0;
foreach ($tagList as $tag => $count) {
    if ($i >= $limit) break;
    $tagCls = $cls.((!empty($altCls) && $i % 2)? \' \'.$altCls : \'\');
    if (!empty($firstCls) && $i == 0) $tagCls .= \' \'.$firstCls;
    if (!empty($lastCls) && ($i+1 >= $limit || $i == $count)) $tagCls .= \' \'.$lastCls;
    /* if tag is currently being viewed, mark as active */
    if (!empty($activeCls) && $tag==$activeTag && (empty($activeKey) || $tv==$activeKey)) $tagCls .= \' \'.$activeCls;
    /* handle weighting for css */
    if (!empty($weights) && !empty($weightCls)) $tagCls .= \' \'.$weightCls.ceil($count / (max($tagList) / $weights));

    $tagArray = array(
        \'tag\' => $tag,
        \'tagVar\' => $tagVar,
        \'tagKey\' => $tv,
        \'tagKeyVar\' => $tagKeyVar,
        \'count\' => $count,
        \'target\' => $target,
        \'cls\' => $tagCls,
        \'idx\' => $i,
    );
    $tagParams = array();
    if (empty($useTagFurl)) {
        $tagParams[$tagVar] = $tag;
        $tagParams[$tagKeyVar] = $tv;
    }
    $tagArray[\'url\'] = $modx->makeUrl($target,\'\',$tagParams);
    if (!empty($useTagFurl)) {
        $tagArray[\'url\'] = rtrim($tagArray[\'url\'],\'/\').\'/\'.(!empty($furlKey) ? $furlKey : $tv).\'/\'.urlencode($tag);
    }

    $output[] = $tagLister->getChunk($tpl,$tagArray);
    $totalTags += $count;
    $i++;
}

if ($all) {
    $allTpl = $modx->getOption(\'allTpl\',$scriptProperties,\'all\');
    $allChunk = $tagLister->getChunk($allTpl,array(
        \'tag\' => !empty($scriptProperties[\'allText\']) ? $scriptProperties[\'allText\'] : $modx->lexicon(\'all_tags\'),
        \'tagVar\' => $tagVar,
        \'tagKey\' => $tv,
        \'tagKeyVar\' => $tagKeyVar,
        \'count\' => $totalTags,
        \'target\' => $target,
        \'cls\' => $cls,
        \'url\' => $useTagFurl ? $modx->makeUrl($target).$tv.\'/\' : $modx->makeUrl($target,\'\',array(
            $tagVar => \'\',
            $tagKeyVar => $tv,
        )),
    ));
    if ($modx->getOption(\'allPosition\',$scriptProperties,\'B\') == \'T\') {
        array_unshift($output,$allChunk);
    } else {
        array_push($output,$allChunk);
    }
}

/* output */
$outputSeparator = $modx->getOption(\'outputSeparator\',$scriptProperties,"\\n");
$output = implode($outputSeparator,$output);
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
      'locked' => 0,
      'properties' => 'a:28:{s:3:"tpl";a:7:{s:4:"name";s:3:"tpl";s:4:"desc";s:23:"prop_taglister.tpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"tag";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:2:"tv";a:7:{s:4:"name";s:2:"tv";s:4:"desc";s:22:"prop_taglister.tv_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"tags";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:11:"tvDelimiter";a:7:{s:4:"name";s:11:"tvDelimiter";s:4:"desc";s:31:"prop_taglister.tvdelimiter_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:",";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"target";a:7:{s:4:"name";s:6:"target";s:4:"desc";s:26:"prop_taglister.target_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"tagVar";a:7:{s:4:"name";s:6:"tagVar";s:4:"desc";s:26:"prop_taglister.tagvar_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"tag";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"tagKeyVar";a:7:{s:4:"name";s:9:"tagKeyVar";s:4:"desc";s:29:"prop_taglister.tagkeyvar_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"key";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"sortBy";a:7:{s:4:"name";s:6:"sortBy";s:4:"desc";s:26:"prop_taglister.sortby_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:5:"count";s:5:"value";s:5:"count";}i:1;a:2:{s:4:"text";s:3:"tag";s:5:"value";s:3:"tag";}}s:5:"value";s:5:"count";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"sortDir";a:7:{s:4:"name";s:7:"sortDir";s:4:"desc";s:27:"prop_taglister.sortdir_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:9:"ascending";s:4:"vaue";s:3:"ASC";}i:1;a:2:{s:4:"text";s:10:"descending";s:5:"value";s:4:"DESC";}}s:5:"value";s:3:"ASC";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:5:"limit";a:7:{s:4:"name";s:5:"limit";s:4:"desc";s:25:"prop_taglister.limit_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";i:10;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"parents";a:7:{s:4:"name";s:7:"parents";s:4:"desc";s:27:"prop_taglister.parents_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:5:"depth";a:7:{s:4:"name";s:5:"depth";s:4:"desc";s:25:"prop_taglister.depth_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";i:10;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:14:"includeDeleted";a:7:{s:4:"name";s:14:"includeDeleted";s:4:"desc";s:34:"prop_taglister.includedeleted_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:18:"includeUnpublished";a:7:{s:4:"name";s:18:"includeUnpublished";s:4:"desc";s:38:"prop_taglister.includeunpublished_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:5:"where";a:7:{s:4:"name";s:5:"where";s:4:"desc";s:25:"prop_taglister.where_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:3:"cls";a:7:{s:4:"name";s:3:"cls";s:4:"desc";s:23:"prop_taglister.cls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:6:"tl-tag";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"altCls";a:7:{s:4:"name";s:6:"altCls";s:4:"desc";s:26:"prop_taglister.altcls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:10:"tl-tag-alt";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:8:"firstCls";a:7:{s:4:"name";s:8:"firstCls";s:4:"desc";s:28:"prop_taglister.firstcls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"lastCls";a:7:{s:4:"name";s:7:"lastCls";s:4:"desc";s:27:"prop_taglister.lastcls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"toLower";a:7:{s:4:"name";s:7:"toLower";s:4:"desc";s:27:"prop_taglister.tolower_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:3:"all";a:7:{s:4:"name";s:3:"all";s:4:"desc";s:23:"prop_taglister.all_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"allTpl";a:7:{s:4:"name";s:6:"allTpl";s:4:"desc";s:26:"prop_taglister.alltpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"all";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:11:"allPosition";a:7:{s:4:"name";s:11:"allPosition";s:4:"desc";s:31:"prop_taglister.allposition_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:6:"bottom";s:5:"value";s:1:"B";}i:1;a:2:{s:4:"text";s:3:"top";s:5:"value";s:1:"T";}}s:5:"value";s:1:"B";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"allText";a:7:{s:4:"name";s:7:"allText";s:4:"desc";s:27:"prop_taglister.alltext_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:13:"toPlaceholder";a:7:{s:4:"name";s:13:"toPlaceholder";s:4:"desc";s:33:"prop_taglister.toplaceholder_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:15:"outputSeparator";a:7:{s:4:"name";s:15:"outputSeparator";s:4:"desc";s:35:"prop_taglister.outputseparator_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"
";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"activeCls";a:7:{s:4:"name";s:9:"activeCls";s:4:"desc";s:29:"prop_taglister.activecls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"weightCls";a:7:{s:4:"name";s:9:"weightCls";s:4:"desc";s:29:"prop_taglister.weightcls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:13:"tl-tag-weight";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"weights";a:7:{s:4:"name";s:7:"weights";s:4:"desc";s:27:"prop_taglister.weights_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"5";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * tagLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of tagLister, a simple tag listing snippet for MODx
 * Revolution.
 *
 * tagLister is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * tagLister is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * tagLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package taglister
 */
/**
 * tagLister snippet
 *
 * @var modX $modx
 * @var TagLister $tagLister
 * @var array $scriptProperties
 *
 * @package taglister
 */
$tagLister = $modx->getService(\'taglister\',\'TagLister\',$modx->getOption(\'taglister.core_path\',null,$modx->getOption(\'core_path\').\'components/taglister/\').\'model/taglister/\',$scriptProperties);
if (!($tagLister instanceof TagLister)) return \'\';
$modx->lexicon->load(\'taglister:default\');

/* setup default properties */
$tpl = $modx->getOption(\'tpl\',$scriptProperties,\'tag\');
$tv = $modx->getOption(\'tv\',$scriptProperties,\'tags\');
$tvDelimiter = $modx->getOption(\'tvDelimiter\',$scriptProperties,\',\');
$target = $modx->getOption(\'target\',$scriptProperties,1);
$tagVar = $modx->getOption(\'tagVar\',$scriptProperties,\'tag\');
$tagKeyVar = $modx->getOption(\'tagKeyVar\',$scriptProperties,\'key\');
$limit = $modx->getOption(\'limit\',$scriptProperties,10);
$sortBy = strtolower($modx->getOption(\'sortBy\',$scriptProperties,\'count\'));
$sortDir = strtoupper($modx->getOption(\'sortDir\',$scriptProperties,\'ASC\'));
$cls = $modx->getOption(\'cls\',$scriptProperties,\'\');
$altCls = $modx->getOption(\'altCls\',$scriptProperties,\'\');
$firstCls = $modx->getOption(\'firstCls\',$scriptProperties,\'\');
$lastCls = $modx->getOption(\'lastCls\',$scriptProperties,\'\');
$activeCls = $modx->getOption(\'activeCls\',$scriptProperties,\'\');
$activeTag = isset($_REQUEST[$tagVar]) ? $modx->stripTags(urldecode($_REQUEST[$tagVar])) : \'\';
$activeKey = isset($_REQUEST[$tagKeyVar]) ? $modx->stripTags(urldecode($_REQUEST[$tagKeyVar])) : \'\';
$all = $modx->getOption(\'all\',$scriptProperties,false);
$toLower = $modx->getOption(\'toLower\',$scriptProperties,false);
$weights = $modx->getOption(\'weights\',$scriptProperties,0);
$weightCls = $modx->getOption(\'weightCls\',$scriptProperties,\'\');
$useTagFurl = $modx->getOption(\'useTagFurl\',$scriptProperties,false);
$furlKey = $modx->getOption(\'furlKey\',$scriptProperties,\'tags\');


/* get TV values */
$c = $modx->newQuery(\'modTemplateVarResource\');
$c->innerJoin(\'modTemplateVar\',\'TemplateVar\');
$c->innerJoin(\'modResource\',\'Resource\');
$c->leftJoin(\'modUser\',\'CreatedBy\',\'CreatedBy.id = Resource.createdby\');
$c->leftJoin(\'modUser\',\'PublishedBy\',\'PublishedBy.id = Resource.publishedby\');
$c->leftJoin(\'modUser\',\'EditedBy\',\'EditedBy.id = Resource.editedby\');
$tvPk = (int)$tv;
if (!empty($tvPk)) {
    $c->where(array(\'TemplateVar.id\' => $tvPk));
} else {
    $c->where(array(\'TemplateVar.name\' => $tv));
}
/* parents support */
$parents = isset($parents) ? explode(\',\', $parents) : array();
if (!empty($parents)) {
    $depth = isset($depth) ? (integer) $depth : 10;
    $children = array();
    foreach ($parents as $parent) {
        $kids = $modx->getChildIds($parent,$depth);
        if (!empty($kids)) {
            $children = array_merge($children,$kids);
        }
    }
    if (!empty($children)) {
        $children = array_unique($children);
        $parents = array_merge($parents,$children);
    }
    $parents = array_unique($parents);
    if (!empty($parents)) {
        $c->where(array(
            \'Resource.id:IN\' => $parents,
        ));
    }
}
if (!$modx->getOption(\'includeDeleted\',$scriptProperties,false)) {
    $c->where(array(\'Resource.deleted\' => 0));
}
if (!$modx->getOption(\'includeUnpublished\',$scriptProperties,false)) {
    $c->where(array(\'Resource.published\' => 1));
}
/* json where support */
$where = $modx->getOption(\'where\',$scriptProperties,\'\');
if (!empty($where)) {
    $where = $modx->fromJSON($where);
    if (is_array($where) && !empty($where)) {
        $c->where($where);
    }
}
if ($sortBy == \'publishedon\') {
    $c->sortby(\'Resource.publishedon\',$sortDir);
} else if (in_array($sortBy,array(\'rand\',\'random\',\'rand()\'))) {
    $c->sortby(\'RAND()\',\'\');
}
$tags = $modx->getCollection(\'modTemplateVarResource\',$c);

/* parse TV values */
$output = array();
$tagList = array();
$encoding = $modx->getOption(\'modx_charset\',$scriptProperties,\'UTF-8\');
$useMultibyte = $modx->getOption(\'use_multibyte\',$scriptProperties,false);
/** @var modTemplateVarResource $tag */
foreach ($tags as $tag) {
   $v = $tag->get(\'value\');
   $vs = explode($tvDelimiter,$v);
   foreach ($vs as $key) {
      $key = trim($key);
      if (empty($key)) continue;
      if ($toLower) { /* allow for case-insensitive filtering */
          $key = $useMultibyte ? mb_strtolower($key,$encoding) : strtolower($key);
      }
      /* increment tag count */
      if (empty($tagList[$key])) {
         $tagList[$key] = 1;
      } else { $tagList[$key]++; }
   }
}

/* sort */
switch ($sortBy.\'-\'.$sortDir) {
    case \'publishedon-DESC\': case \'publishedon-ASC\': break;
    case \'tag-ASC\': ksort($tagList); break;
    case \'tag-DESC\': krsort($tagList); break;
    case \'count-DESC\': asort($tagList); break;
    case \'count-ASC\': default: arsort($tagList); break;
    case \'rand-ASC\': case \'random-ASC\': case \'rand()-asc\': $tagList = $tagLister->ashuffle($tagList); break;
}

/* iterate */
$totalTags = 0;
$i = $all ? 1 : 0;
foreach ($tagList as $tag => $count) {
    if ($i >= $limit) break;
    $tagCls = $cls.((!empty($altCls) && $i % 2)? \' \'.$altCls : \'\');
    if (!empty($firstCls) && $i == 0) $tagCls .= \' \'.$firstCls;
    if (!empty($lastCls) && ($i+1 >= $limit || $i == $count)) $tagCls .= \' \'.$lastCls;
    /* if tag is currently being viewed, mark as active */
    if (!empty($activeCls) && $tag==$activeTag && (empty($activeKey) || $tv==$activeKey)) $tagCls .= \' \'.$activeCls;
    /* handle weighting for css */
    if (!empty($weights) && !empty($weightCls)) $tagCls .= \' \'.$weightCls.ceil($count / (max($tagList) / $weights));

    $tagArray = array(
        \'tag\' => $tag,
        \'tagVar\' => $tagVar,
        \'tagKey\' => $tv,
        \'tagKeyVar\' => $tagKeyVar,
        \'count\' => $count,
        \'target\' => $target,
        \'cls\' => $tagCls,
        \'idx\' => $i,
    );
    $tagParams = array();
    if (empty($useTagFurl)) {
        $tagParams[$tagVar] = $tag;
        $tagParams[$tagKeyVar] = $tv;
    }
    $tagArray[\'url\'] = $modx->makeUrl($target,\'\',$tagParams);
    if (!empty($useTagFurl)) {
        $tagArray[\'url\'] = rtrim($tagArray[\'url\'],\'/\').\'/\'.(!empty($furlKey) ? $furlKey : $tv).\'/\'.urlencode($tag);
    }

    $output[] = $tagLister->getChunk($tpl,$tagArray);
    $totalTags += $count;
    $i++;
}

if ($all) {
    $allTpl = $modx->getOption(\'allTpl\',$scriptProperties,\'all\');
    $allChunk = $tagLister->getChunk($allTpl,array(
        \'tag\' => !empty($scriptProperties[\'allText\']) ? $scriptProperties[\'allText\'] : $modx->lexicon(\'all_tags\'),
        \'tagVar\' => $tagVar,
        \'tagKey\' => $tv,
        \'tagKeyVar\' => $tagKeyVar,
        \'count\' => $totalTags,
        \'target\' => $target,
        \'cls\' => $cls,
        \'url\' => $useTagFurl ? $modx->makeUrl($target).$tv.\'/\' : $modx->makeUrl($target,\'\',array(
            $tagVar => \'\',
            $tagKeyVar => $tv,
        )),
    ));
    if ($modx->getOption(\'allPosition\',$scriptProperties,\'B\') == \'T\') {
        array_unshift($output,$allChunk);
    } else {
        array_push($output,$allChunk);
    }
}

/* output */
$outputSeparator = $modx->getOption(\'outputSeparator\',$scriptProperties,"\\n");
$output = implode($outputSeparator,$output);
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
    ),
  ),
  '9d1e258344376a6728055b73f41b03cc' => 
  array (
    'criteria' => 
    array (
      'name' => 'tolinks',
    ),
    'object' => 
    array (
      'id' => 41,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'tolinks',
      'description' => 'Builds links from tags.',
      'editor_type' => 0,
      'category' => 13,
      'cache_type' => 0,
      'snippet' => '/**
 * tagLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of tagLister, a simple tag listing snippet for MODx
 * Revolution.
 *
 * tagLister is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * tagLister is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * tagLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package taglister
 */
/**
 * tolinks snippet. Creates links out of tags.
 *
 * @var modX $modx
 * @var tagLister $tagLister
 * @var array $scriptProperties
 * 
 * @package taglister
 */
$tagLister = $modx->getService(\'taglister\',\'TagLister\',$modx->getOption(\'taglister.core_path\',null,$modx->getOption(\'core_path\').\'components/taglister/\').\'model/taglister/\',$scriptProperties);
if (!($tagLister instanceof TagLister)) return \'\';

/* setup default properties */
$inputDelim = $modx->getOption(\'inputDelim\',$scriptProperties,\',\');
$outputDelim = $modx->getOption(\'outputDelim\',$scriptProperties,\', \');
$tagRequestParam = $modx->getOption(\'tagRequestParam\',$scriptProperties,\'tag\');
$tagKeyVar = $modx->getOption(\'tagKeyVar\',$scriptProperties,\'key\');
$tagKey = $modx->getOption(\'tagKey\',$scriptProperties,\'tags\');
$target = !empty($scriptProperties[\'target\']) ? $scriptProperties[\'target\'] : $modx->resource->get(\'id\');
$tpl = $modx->getOption(\'tpl\',$scriptProperties,\'link\');
$cls = $modx->getOption(\'cls\',$scriptProperties,\'tl-tag\');
$useTagsFurl = $modx->getOption(\'useTagsFurl\',$scriptProperties,false);

/* get items */
$items = $modx->getOption(\'items\',$scriptProperties,\'\');
if (empty($items)) return \'\';
$items = explode($inputDelim,$items);

/* if extra params, set em */
$extraParams = $modx->getOption(\'extraParams\',$scriptProperties,\'\');
if (!empty($extraParams)) {
    $extraParams = trim(trim(trim($extraParams,\'?\'),\'&\'),\'&amp;\');
    $eps= explode(\',\',$extraParams);
    $extraParams = array();
    foreach ($eps as $ep) {
        $ep = explode(\'=\',$ep);
        if (!empty($ep[1])) {
            $extraParams[$ep[0]] = $ep[1];
        }
    }
}

/* iterate */
$tags = array();
foreach ($items as $item) {
    $itemArray = array();
    $itemArray[\'item\'] = trim($item);
    $params = array();
    if (empty($useTagsFurl)) {
        $params = array(
            $tagRequestParam => $itemArray[\'item\'],
            $tagKeyVar => $tagKey,
        );
    }

    if (!empty($extraParams)) {
        $params = array_merge($extraParams,$params);
    }
    $itemArray[\'url\'] = $modx->makeUrl($target,\'\',$params);
    if (!empty($useTagsFurl)) {
         $itemArray[\'url\'] = rtrim($itemArray[\'url\'],\'/\').\'/\'.$tagKey.\'/\'.$itemArray[\'item\'];
    }
    $itemArray[\'url\'] = str_replace(\' \',\'+\',$itemArray[\'url\']);
    $itemArray[\'cls\'] = $cls;
    $tags[] = $tagLister->getChunk($tpl,$itemArray);
}

/* output */
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
$output = trim(implode($outputDelim,$tags),$outputDelim);
if ($toPlaceholder) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
      'locked' => 0,
      'properties' => 'a:10:{s:5:"items";a:7:{s:4:"name";s:5:"items";s:4:"desc";s:23:"prop_tolinks.items_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:3:"tpl";a:7:{s:4:"name";s:3:"tpl";s:4:"desc";s:21:"prop_tolinks.tpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"link";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"target";a:7:{s:4:"name";s:6:"target";s:4:"desc";s:24:"prop_tolinks.target_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:10:"inputDelim";a:7:{s:4:"name";s:10:"inputDelim";s:4:"desc";s:28:"prop_tolinks.inputdelim_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:",";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:11:"outputDelim";a:7:{s:4:"name";s:11:"outputDelim";s:4:"desc";s:29:"prop_tolinks.outputdelim_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:2:", ";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:15:"tagRequestParam";a:7:{s:4:"name";s:15:"tagRequestParam";s:4:"desc";s:33:"prop_tolinks.tagrequestparam_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"tag";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"tagKeyVar";a:7:{s:4:"name";s:9:"tagKeyVar";s:4:"desc";s:27:"prop_tolinks.tagkeyvar_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"key";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"tagKey";a:7:{s:4:"name";s:6:"tagKey";s:4:"desc";s:24:"prop_tolinks.tagkey_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"tags";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:3:"cls";a:7:{s:4:"name";s:3:"cls";s:4:"desc";s:21:"prop_tolinks.cls_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:6:"tl-tag";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:13:"toPlaceholder";a:7:{s:4:"name";s:13:"toPlaceholder";s:4:"desc";s:31:"prop_tolinks.toplaceholder_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * tagLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of tagLister, a simple tag listing snippet for MODx
 * Revolution.
 *
 * tagLister is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * tagLister is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * tagLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package taglister
 */
/**
 * tolinks snippet. Creates links out of tags.
 *
 * @var modX $modx
 * @var tagLister $tagLister
 * @var array $scriptProperties
 * 
 * @package taglister
 */
$tagLister = $modx->getService(\'taglister\',\'TagLister\',$modx->getOption(\'taglister.core_path\',null,$modx->getOption(\'core_path\').\'components/taglister/\').\'model/taglister/\',$scriptProperties);
if (!($tagLister instanceof TagLister)) return \'\';

/* setup default properties */
$inputDelim = $modx->getOption(\'inputDelim\',$scriptProperties,\',\');
$outputDelim = $modx->getOption(\'outputDelim\',$scriptProperties,\', \');
$tagRequestParam = $modx->getOption(\'tagRequestParam\',$scriptProperties,\'tag\');
$tagKeyVar = $modx->getOption(\'tagKeyVar\',$scriptProperties,\'key\');
$tagKey = $modx->getOption(\'tagKey\',$scriptProperties,\'tags\');
$target = !empty($scriptProperties[\'target\']) ? $scriptProperties[\'target\'] : $modx->resource->get(\'id\');
$tpl = $modx->getOption(\'tpl\',$scriptProperties,\'link\');
$cls = $modx->getOption(\'cls\',$scriptProperties,\'tl-tag\');
$useTagsFurl = $modx->getOption(\'useTagsFurl\',$scriptProperties,false);

/* get items */
$items = $modx->getOption(\'items\',$scriptProperties,\'\');
if (empty($items)) return \'\';
$items = explode($inputDelim,$items);

/* if extra params, set em */
$extraParams = $modx->getOption(\'extraParams\',$scriptProperties,\'\');
if (!empty($extraParams)) {
    $extraParams = trim(trim(trim($extraParams,\'?\'),\'&\'),\'&amp;\');
    $eps= explode(\',\',$extraParams);
    $extraParams = array();
    foreach ($eps as $ep) {
        $ep = explode(\'=\',$ep);
        if (!empty($ep[1])) {
            $extraParams[$ep[0]] = $ep[1];
        }
    }
}

/* iterate */
$tags = array();
foreach ($items as $item) {
    $itemArray = array();
    $itemArray[\'item\'] = trim($item);
    $params = array();
    if (empty($useTagsFurl)) {
        $params = array(
            $tagRequestParam => $itemArray[\'item\'],
            $tagKeyVar => $tagKey,
        );
    }

    if (!empty($extraParams)) {
        $params = array_merge($extraParams,$params);
    }
    $itemArray[\'url\'] = $modx->makeUrl($target,\'\',$params);
    if (!empty($useTagsFurl)) {
         $itemArray[\'url\'] = rtrim($itemArray[\'url\'],\'/\').\'/\'.$tagKey.\'/\'.$itemArray[\'item\'];
    }
    $itemArray[\'url\'] = str_replace(\' \',\'+\',$itemArray[\'url\']);
    $itemArray[\'cls\'] = $cls;
    $tags[] = $tagLister->getChunk($tpl,$itemArray);
}

/* output */
$toPlaceholder = $modx->getOption(\'toPlaceholder\',$scriptProperties,false);
$output = trim(implode($outputDelim,$tags),$outputDelim);
if ($toPlaceholder) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return \'\';
}
return $output;',
    ),
  ),
  '61458f105e190daa2e659fbda42edd30' => 
  array (
    'criteria' => 
    array (
      'name' => 'getResourcesTag',
    ),
    'object' => 
    array (
      'id' => 42,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'getResourcesTag',
      'description' => 'Wraps the getResources and getPage snippets to do tag-based navigation. Requires both of those snippets to run.',
      'editor_type' => 0,
      'category' => 13,
      'cache_type' => 0,
      'snippet' => '/**
 * tagLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of tagLister, a simple tag listing snippet for MODx
 * Revolution.
 *
 * tagLister is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * tagLister is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * tagLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package taglister
 */
/**
 * Wrap the getPage/getResources call to implement tagging. Needs getPage and
 * getResources to be installed to work.
 *
 * @var modX $modx
 * @var array $scriptProperties
 *
 * @package taglister
 */
$tagKeyVar = $modx->getOption(\'tagKeyVar\',$scriptProperties,\'key\');
$tagKey = (!empty($tagKeyVar) && !empty($_GET[$tagKeyVar]))? $_GET[$tagKeyVar] : $modx->getOption(\'tagKey\',$scriptProperties,\'tags\');
$tagRequestParam = $modx->getOption(\'tagRequestParam\',$scriptProperties,\'tag\');
$grSnippet = $modx->getOption(\'grSnippet\',$scriptProperties,\'getPage\');
$tag = $modx->getOption(\'tag\',$scriptProperties,urldecode($_GET[$tagRequestParam]));
if (!empty($tag)) {
    $tag = $modx->stripTags($tag);
    $tagSearchType = $modx->getOption(\'tagSearchType\',$scriptProperties,\'exact\');
    if ($tagSearchType == \'contains\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==%\'.$tag.\'%\';
    } else if ($tagSearchType == \'beginswith\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==%\'.$tag.\'\';
    } else if ($tagSearchType == \'endswith\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==\'.$tag.\'%\';
    } else if ($tagSearchType == \'within\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'(IN)\'.$tag.\'\';
    } else {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==\'.$tag.\'\';
    }    
}
/** @var modSnippet $elementObj */
$elementObj = $modx->getObject(\'modSnippet\', array(\'name\' => $grSnippet));
if ($elementObj) {
    $elementObj->setCacheable(false);
    $output = $elementObj->process($scriptProperties);
} else {
    return \'You must have getPage and getResources downloaded and installed to use this snippet.\';
}
return $output;',
      'locked' => 0,
      'properties' => 'a:39:{s:3:"tpl";a:7:{s:4:"name";s:3:"tpl";s:4:"desc";s:17:"prop_grt.tpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"tplOdd";a:7:{s:4:"name";s:6:"tplOdd";s:4:"desc";s:20:"prop_grt.tplodd_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:8:"tplFirst";a:7:{s:4:"name";s:8:"tplFirst";s:4:"desc";s:22:"prop_grt.tplfirst_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"tplLast";a:7:{s:4:"name";s:7:"tplLast";s:4:"desc";s:21:"prop_grt.tpllast_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"sortby";a:7:{s:4:"name";s:6:"sortby";s:4:"desc";s:20:"prop_grt.sortby_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:11:"publishedon";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:11:"sortbyAlias";a:7:{s:4:"name";s:11:"sortbyAlias";s:4:"desc";s:25:"prop_grt.sortbyalias_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:13:"sortbyEscaped";a:7:{s:4:"name";s:13:"sortbyEscaped";s:4:"desc";s:27:"prop_grt.sortbyescaped_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"0";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"sortdir";a:7:{s:4:"name";s:7:"sortdir";s:4:"desc";s:21:"prop_grt.sortdir_desc";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:9:"ascending";s:4:"vaue";s:3:"ASC";}i:1;a:2:{s:4:"text";s:10:"descending";s:5:"value";s:4:"DESC";}}s:5:"value";s:4:"DESC";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:5:"limit";a:7:{s:4:"name";s:5:"limit";s:4:"desc";s:19:"prop_grt.limit_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:2:"10";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"offset";a:7:{s:4:"name";s:6:"offset";s:4:"desc";s:20:"prop_grt.offset_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"0";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"tvFilters";a:7:{s:4:"name";s:9:"tvFilters";s:4:"desc";s:23:"prop_grt.tvfilters_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:5:"depth";a:7:{s:4:"name";s:5:"depth";s:4:"desc";s:19:"prop_grt.depth_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:2:"10";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"parents";a:7:{s:4:"name";s:7:"parents";s:4:"desc";s:21:"prop_grt.parents_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:14:"includeContent";a:7:{s:4:"name";s:14:"includeContent";s:4:"desc";s:28:"prop_grt.includecontent_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:10:"includeTVs";a:7:{s:4:"name";s:10:"includeTVs";s:4:"desc";s:24:"prop_grt.includetvs_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:10:"processTVs";a:7:{s:4:"name";s:10:"processTVs";s:4:"desc";s:24:"prop_grt.processtvs_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:8:"tvPrefix";a:7:{s:4:"name";s:8:"tvPrefix";s:4:"desc";s:22:"prop_grt.tvprefix_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"tv.";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:3:"idx";a:7:{s:4:"name";s:3:"idx";s:4:"desc";s:17:"prop_grt.idx_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:5:"first";a:7:{s:4:"name";s:5:"first";s:4:"desc";s:19:"prop_grt.first_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:4:"last";a:7:{s:4:"name";s:4:"last";s:4:"desc";s:18:"prop_grt.last_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:5:"debug";a:7:{s:4:"name";s:5:"debug";s:4:"desc";s:19:"prop_grt.debug_desc";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"namespace";a:7:{s:4:"name";s:9:"namespace";s:4:"desc";s:23:"prop_grt.namespace_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:4:"page";a:7:{s:4:"name";s:4:"page";s:4:"desc";s:18:"prop_grt.page_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"0";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:10:"pageVarKey";a:7:{s:4:"name";s:10:"pageVarKey";s:4:"desc";s:24:"prop_grt.pagevarkey_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"page";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:8:"totalVar";a:7:{s:4:"name";s:8:"totalVar";s:4:"desc";s:22:"prop_grt.totalvar_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"total";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"pageLimit";a:7:{s:4:"name";s:9:"pageLimit";s:4:"desc";s:23:"prop_grt.pagelimit_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:1:"5";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:12:"elementClass";a:7:{s:4:"name";s:12:"elementClass";s:4:"desc";s:26:"prop_grt.elementclass_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:10:"modSnippet";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:7:"element";a:7:{s:4:"name";s:7:"element";s:4:"desc";s:21:"prop_grt.element_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:12:"getResources";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:10:"pageNavVar";a:7:{s:4:"name";s:10:"pageNavVar";s:4:"desc";s:24:"prop_grt.pagenavvar_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"page.nav";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:10:"pageNavTpl";a:7:{s:4:"name";s:10:"pageNavTpl";s:4:"desc";s:24:"prop_grt.pagenavtpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:78:"<li[[+classes]]><a[[+classes]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:13:"pageActiveTpl";a:7:{s:4:"name";s:13:"pageActiveTpl";s:4:"desc";s:27:"prop_grt.pageactivetpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:116:"<li[[+activeClasses]]><a[[+activeClasses:default=` class="active"`]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:12:"pageFirstTpl";a:7:{s:4:"name";s:12:"pageFirstTpl";s:4:"desc";s:26:"prop_grt.pagefirsttpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:76:"<li class="control"><a[[+classes]][[+title]] href="[[+href]]">First</a></li>";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:11:"pageLastTpl";a:7:{s:4:"name";s:11:"pageLastTpl";s:4:"desc";s:25:"prop_grt.pagelasttpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:75:"<li class="control"><a[[+classes]][[+title]] href="[[+href]]">Last</a></li>";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:11:"pagePrevTpl";a:7:{s:4:"name";s:11:"pagePrevTpl";s:4:"desc";s:25:"prop_grt.pageprevtpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:79:"<li class="control"><a[[+classes]][[+title]] href="[[+href]]">&lt;&lt;</a></li>";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:11:"pageNextTpl";a:7:{s:4:"name";s:11:"pageNextTpl";s:4:"desc";s:25:"prop_grt.pagenexttpl_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:79:"<li class="control"><a[[+classes]][[+title]] href="[[+href]]">&gt;&gt;</a></li>";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:6:"tagKey";a:7:{s:4:"name";s:6:"tagKey";s:4:"desc";s:20:"prop_grt.tagkey_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"tags";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:9:"tagKeyVar";a:7:{s:4:"name";s:9:"tagKeyVar";s:4:"desc";s:23:"prop_grt.tagkeyvar_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"key";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:15:"tagRequestParam";a:7:{s:4:"name";s:15:"tagRequestParam";s:4:"desc";s:29:"prop_grt.tagrequestparam_desc";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"tag";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}s:13:"tagSearchType";a:7:{s:4:"name";s:13:"tagSearchType";s:4:"desc";s:27:"prop_grt.tagsearchtype_desc";s:4:"type";s:4:"list";s:7:"options";a:5:{i:0;a:2:{s:4:"text";s:16:"grt.tst_contains";s:5:"value";s:8:"contains";}i:1;a:2:{s:4:"text";s:13:"grt.tst_exact";s:5:"value";s:5:"exact";}i:2;a:2:{s:4:"text";s:18:"grt.tst_beginswith";s:5:"value";s:10:"beginswith";}i:3;a:2:{s:4:"text";s:16:"grt.tst_endswith";s:5:"value";s:8:"endswith";}i:4;a:2:{s:4:"text";s:14:"grt.tst_within";s:5:"value";s:6:"within";}}s:5:"value";s:8:"contains";s:7:"lexicon";s:20:"taglister:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
      'content' => '/**
 * tagLister
 *
 * Copyright 2010 by Shaun McCormick <shaun@modxcms.com>
 *
 * This file is part of tagLister, a simple tag listing snippet for MODx
 * Revolution.
 *
 * tagLister is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * tagLister is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * tagLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package taglister
 */
/**
 * Wrap the getPage/getResources call to implement tagging. Needs getPage and
 * getResources to be installed to work.
 *
 * @var modX $modx
 * @var array $scriptProperties
 *
 * @package taglister
 */
$tagKeyVar = $modx->getOption(\'tagKeyVar\',$scriptProperties,\'key\');
$tagKey = (!empty($tagKeyVar) && !empty($_GET[$tagKeyVar]))? $_GET[$tagKeyVar] : $modx->getOption(\'tagKey\',$scriptProperties,\'tags\');
$tagRequestParam = $modx->getOption(\'tagRequestParam\',$scriptProperties,\'tag\');
$grSnippet = $modx->getOption(\'grSnippet\',$scriptProperties,\'getPage\');
$tag = $modx->getOption(\'tag\',$scriptProperties,urldecode($_GET[$tagRequestParam]));
if (!empty($tag)) {
    $tag = $modx->stripTags($tag);
    $tagSearchType = $modx->getOption(\'tagSearchType\',$scriptProperties,\'exact\');
    if ($tagSearchType == \'contains\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==%\'.$tag.\'%\';
    } else if ($tagSearchType == \'beginswith\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==%\'.$tag.\'\';
    } else if ($tagSearchType == \'endswith\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==\'.$tag.\'%\';
    } else if ($tagSearchType == \'within\') {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'(IN)\'.$tag.\'\';
    } else {
        $scriptProperties[\'tvFilters\'] = $tagKey.\'==\'.$tag.\'\';
    }    
}
/** @var modSnippet $elementObj */
$elementObj = $modx->getObject(\'modSnippet\', array(\'name\' => $grSnippet));
if ($elementObj) {
    $elementObj->setCacheable(false);
    $output = $elementObj->process($scriptProperties);
} else {
    return \'You must have getPage and getResources downloaded and installed to use this snippet.\';
}
return $output;',
    ),
  ),
);