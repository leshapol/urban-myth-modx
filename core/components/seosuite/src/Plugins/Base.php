<?php

namespace Sterc\SeoSuite\Plugins;

use MODX\Revolution\modX;
use Sterc\SeoSuite\SeoSuite;

class Base
{
    const PH_PREFIX = 'seosuite.';

    /**
     * The MODX object.
     *
     * @var null|modX $modx
     */
    protected $modx;

    /**
     * The SeoSuite object.
     *
     * @var null|SeoSuite $seosuite
     */
    protected $seosuite;

    /**
     * Initialize the class.
     *
     * @param modX $modx
     * @param SeoSuite $site
     */
    public function __construct(modX $modx, SeoSuite $seosuite)
    {
        $this->modx     =& $modx;
        $this->seosuite =& $seosuite;
    }
}