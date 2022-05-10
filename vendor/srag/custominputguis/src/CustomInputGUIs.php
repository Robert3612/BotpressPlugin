<?php

namespace srag\CustomInputGUIs\Test;

use srag\CustomInputGUIs\Test\ViewControlModeUI\ViewControlModeUI;
use srag\DIC\Test\DICTrait;

/**
 * Class CustomInputGUIs
 *
 * @package srag\CustomInputGUIs\Test
 */
final class CustomInputGUIs
{

    use DICTrait;

    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * CustomInputGUIs constructor
     */
    private function __construct()
    {

    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @return ViewControlModeUI
     */
    public function viewControlMode() : ViewControlModeUI
    {
        return new ViewControlModeUI();
    }
}
