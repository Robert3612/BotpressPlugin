<?php

namespace srag\DIC\Plugintest\DIC;

use ILIAS\DI\Container;
use srag\DIC\Plugintest\Database\DatabaseDetector;
use srag\DIC\Plugintest\Database\DatabaseInterface;

/**
 * Class AbstractDIC
 *
 * @package srag\DIC\Plugintest\DIC
 */
abstract class AbstractDIC implements DICInterface
{

    /**
     * @var Container
     */
    protected $dic;


    /**
     * @inheritDoc
     */
    public function __construct(Container &$dic)
    {
        $this->dic = &$dic;
    }


    /**
     * @inheritDoc
     */
    public function database() : DatabaseInterface
    {
        return DatabaseDetector::getInstance($this->databaseCore());
    }
}
