<?php

class RedirectorCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'modRedirect';
    public $languageTopics = array('redirector:default');
    public $objectType = 'redirector.redirect';

    public function initialize() {
        $this->modx->getParser();
        return parent::initialize();
    }

    public function beforeSet() {
        $context = $this->getProperty('context_key');
        if(empty($context)) {
            $this->setProperty('context_key', NULL);
        }
        $context = $this->getProperty('context_key');

        // check if pattern & context combi not already exists
        $exists = $this->modx->getObject('modRedirect', array('pattern' => $this->getProperty('pattern'), 'context_key' => $context));
        if(!empty($exists) && is_object($exists)) {
            if (empty($context)) {
                $this->addFieldError('pattern', $this->modx->lexicon('redirector.redirect_err_ae_pattern', array('context' => $context)));
            } else {
                $this->addFieldError('pattern', $this->modx->lexicon('redirector.redirect_err_ae_patctx', array('context' => $context)));
            }
        }

        // check if pattern is an existing resource
        $criteria = array('uri' => $this->getProperty('pattern'), 'published' => true, 'deleted' => false);
        if(!empty($context)) { $criteria['context_key'] = $context; }
        $resource = $this->modx->getObject('modResource', $criteria);
        if(!empty($resource) && is_object($resource)) {
            $this->addFieldError('pattern', $this->modx->lexicon('redirector.redirect_err_ae_uri', array('id' => $resource->get('id'), 'context' => $resource->get('context_key'))));
        }

        // check if target is a NON existing resource
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

        return parent::beforeSet();
    }
}

return 'RedirectorCreateProcessor';