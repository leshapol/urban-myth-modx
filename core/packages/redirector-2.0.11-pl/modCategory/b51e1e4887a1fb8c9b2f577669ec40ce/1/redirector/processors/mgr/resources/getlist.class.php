<?php

class ResourcesGetListProcessor extends modObjectGetListProcessor {
	public $classKey = 'modResource';
	public $languageTopics = array('redirector:default');
	public $defaultSortField = 'pagetitle';
	public $defaultSortDirection = 'ASC';
	public $objectType = 'modresource';

    public function prepareQueryBeforeCount(xPDOQuery $c) {

		$contextKey = $this->getProperty('cntx');
		if(!empty($contextKey)) {
			$c->andCondition(array(
				'context_key' => $contextKey,
			));
		}

		$query = $this->getProperty('query');
		if(!empty($query)) {
			$c->andCondition(array(
				'id' => $query,
				'OR:pagetitle:LIKE' => '%'.$query.'%',
			));
		}
		return $c;
    }

    public function prepareRow(xPDOObject $object) {
        $arr = $object->toArray();
        $arr['pagetitle'] .= ' ('.$object->get('context_key').', '.$object->get('id').')';

        // figure out if resource is a site-start resource
        $siteStart = $this->modx->getObject('modSystemSetting', array(
            'key' => 'site_start',
            'value' => $object->get('id'),
        ));
        if (empty($siteStart)) {

            $siteStart = $this->modx->getObject('modContextSetting', array(
                'key' => 'site_start',
                'value' => $object->get('id'),
                'context_key' => $object->get('context_key'),
            ));
        }

        $arr['site_start'] = (!empty($siteStart) && is_object($siteStart)) ? true : false;

        return $arr;
    }
}
return 'ResourcesGetListProcessor';