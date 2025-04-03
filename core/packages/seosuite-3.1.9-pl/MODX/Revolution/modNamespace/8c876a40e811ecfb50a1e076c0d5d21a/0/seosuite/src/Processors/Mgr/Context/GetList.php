<?php
namespace Sterc\SeoSuite\Processors\Mgr\Context;

use MODX\Revolution\Processors\Model\GetListProcessor;
use MODX\Revolution\modContext;
use xPDO\Om\xPDOQuery;
use xPDO\Om\xPDOObject;

class GetList extends GetListProcessor
{
    /**
     * @access public.
     * @var String.
     */
    public $classKey = modContext::class;

    /**
     * @access public.
     * @var Array.
     */
    public $languageTopics = ['seosuite:default'];

    /**
     * @access public.
     * @var String.
     */
    public $defaultSortField = 'key';

    /**
     * @access public.
     * @return Mixed.
     */
    public function initialize()
    {
        $this->setDefaultProperties([
            'search'  => '',
            'exclude' => ''
        ]);

        return parent::initialize();
    }

    /**
     * @access public.
     * @param xPDOQuery $criteria.
     * @return xPDOQuery.
     */
    public function prepareQueryBeforeCount(xPDOQuery $criteria)
    {
        $search = $this->getProperty('search');

        if (!empty($search)) {
            $criteria->where([
                'key:LIKE'            => '%' . $search . '%',
                'OR:description:LIKE' => '%' . $search . '%',
            ]);
        }

        $exclude = $this->getProperty('exclude');

        if (!empty($exclude)) {
            $criteria->where([
                'key:NOT IN' => is_string($exclude) ? explode(',', $exclude) : $exclude,
            ]);
        }

        return $criteria;
    }

    /**
     * Filter the query by the valueField of MODx.combo.Context to get the initially value displayed right
     * @param xPDOQuery $query
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $query)
    {
        $key = $this->getProperty('key','');
        if (!empty($key)) {
            $query->where([
                $this->classKey . '.key:IN' => is_string($key) ? explode(',', $key) : $key,
            ]);
        }

        return $query;
    }

    /**
     * @access public.
     * @param xPDOObject $object.
     * @return Array.
     */
    public function prepareRow(xPDOObject $object)
    {
        return $object->toArray();
    }

    /**
     * @access public.
     * @param Array $list;
     * @return Array.
     */
    public function afterIteration(array $list)
    {
        array_unshift($list, [
            'key'   => '',
            'name'  => $this->modx->lexicon('seosuite.use_redirect_across_domains')
        ]);

        return $list;
    }
}
