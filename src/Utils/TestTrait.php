<?php

namespace srag\Plugins\Test\Utils;

use srag\Plugins\Test\Repository;

/**
 * Trait TestTrait
 *
 * Generated by SrPluginGenerator v2.8.1
 *
 * @package srag\Plugins\Test\Utils
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait TestTrait
{

    /**
     * @return Repository
     */
    protected static function test() : Repository
    {
        return Repository::getInstance();
    }
}
