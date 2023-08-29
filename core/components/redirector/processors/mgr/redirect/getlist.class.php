<?php

class RedirectorGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'modRedirect';
    public $languageTopics = array('redirector:default');
    public $objectType = 'redirector.redirect';
    public $defaultSortField = 'pattern ASC, target';
    public $defaultSortDirection = 'ASC';

    public function initialize() {
        $this->modx->getParser();
        return parent::initialize();
    }

    public function prepareQueryBeforeCount(xPDOQuery $c) {

        $query = $this->getProperty('query');
        if(!empty($query)) {
            $c->andCondition(array(
                'pattern:LIKE' => '%'.$query.'%',
                'OR:target:LIKE' => '%'.$query.'%',
            ));
        }

        $context = $this->getProperty('context');
        if(!empty($context)) {
            $c->andCondition(array(
                'context_key:LIKE' => '%'.$context.'%',
            ));
        }

        return $c;
    }

    public function prepareRow(xPDOObject $object) {
        $arr = $object->toArray();

        $arr['failure_msg'] = '';
        $arr['valid'] = true;

        // find out if pattern URI exists
        $criteria = array('uri' => $object->get('pattern'), 'published' => true, 'deleted' => false);
        if(!empty($arr['context_key'])) {
            $criteria['context_key'] = $object->get('context_key');
        }

        $resource = $this->modx->getObject('modResource', $criteria);
        if(!empty($resource) && is_object($resource)) {
            $arr['failure_msg'] .= '(!) '.$this->modx->lexicon('redirector.pattern').' '.$this->modx->lexicon('redirector.redirect_err_ae_uri', array('id' => $resource->get('id'), 'context' => $resource->get('context_key')));
            $arr['valid'] = false;
        }

        // OR target not exists
        $target = $this->getProperty('target');
        if(strpos($target, '$') === false) {

            // parse link & MODX tags
            if(stripos($target, '[[') !== false) {
                $this->modx->parser->processElementTags('', $target, true, true);
            }

            if(!empty($target)) {

                // checking full links
                if(strpos($target, '://') !== false) {

                    $headers = @get_headers($target);
                    if(empty($headers)) {
                        $this->addFieldError('target', $this->modx->lexicon('redirector.redirect_err_ne_target'));
                    }
                }
                else {

                    $criteria = array('uri' => $target);
                    if(!empty($context)) { $criteria['context_key'] = $context; }
                    $resource = $this->modx->getObject('modResource', $criteria);
                    if(empty($resource) || !is_object($resource)) {

                        // check if could be a file?
                        $basePath = $this->modx->getOption('base_path');
                        if(!file_exists($basePath.$target)) {
                            $this->addFieldError('target', $this->modx->lexicon('redirector.redirect_err_ne_target'));
                        }
                    }
                }
            }
            else {
                $this->addFieldError('target', $this->modx->lexicon('redirector.redirect_err_ne_target'));
            }
        }

        return $arr;
    }
}

return 'RedirectorGetListProcessor';