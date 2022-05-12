<?php

namespace srag\CustomInputGUIs\Plugintest;

/**
 * Trait CustomInputGUIsTrait
 *
 * @package srag\CustomInputGUIs\Plugintest
 */
trait CustomInputGUIsTrait
{

    /**
     * @return CustomInputGUIs
     */
    protected static final function customInputGUIs() : CustomInputGUIs
    {
        return CustomInputGUIs::getInstance();
    }
}
