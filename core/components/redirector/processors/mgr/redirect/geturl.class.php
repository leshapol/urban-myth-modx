<?php

class RedirectorGetURLProcessor extends modProcessor
{
    public function initialize()
    {
        $this->modx->getParser();
        return parent::initialize();
    }

    public function process()
    {
        $redirect = $this->modx->getObject('modRedirect', $this->getProperty('id'));
        if (!empty($redirect)) {

            /** @var modContext $context */
            $context = $redirect->getOne('Context');
            if (empty($context) || !($context instanceof modContext)) {
                $context = $this->modx->getContext('web');
            }

            $uri = rtrim($context->getOption('site_url'),  '/') . '/' . ltrim($redirect->get('pattern'),  '/');
            return $this->outputArray(array('uri' => $uri));
        }
    }
}

return 'RedirectorGetURLProcessor';