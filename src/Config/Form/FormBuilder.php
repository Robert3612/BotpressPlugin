<?php

namespace srag\Plugins\Plugintest\Config\Form;

use srag\Plugins\Plugintest\Config\ConfigCtrl;
use srag\Plugins\Plugintest\Utils\PlugintestTrait;
use ilPlugintestPlugin;
use srag\CustomInputGUIs\Plugintest\FormBuilder\AbstractFormBuilder;

/**
 * Class FormBuilder
 *
 * @package srag\Plugins\Plugintest\Config\Form
 *
 * @author Robert Schmidt <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
class FormBuilder extends AbstractFormBuilder
{

    use PlugintestTrait;

    const KEY_SOME = "some";
    const PLUGIN_CLASS_NAME = ilPlugintestPlugin::class;


    /**
     * @inheritDoc
     *
     * @param ConfigCtrl $parent
     */
    public function __construct(ConfigCtrl $parent)
    {
        parent::__construct($parent);
    }


    /**
     * @inheritDoc
     */
    protected function getButtons() : array
    {
        $buttons = [
            ConfigCtrl::CMD_UPDATE_CONFIGURE => self::plugin()->translate("save", ConfigCtrl::LANG_MODULE)
        ];

        return $buttons;
    }


    /**
     * @inheritDoc
     */
    protected function getData() : array
    {
        $data = [
            self::KEY_SOME => self::plugintest()->config()->getValue(self::KEY_SOME)
        ];

        return $data;
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        $fields = [
            self::KEY_SOME => self::dic()->ui()->factory()->input()->field()->text(self::plugin()->translate(self::KEY_SOME, ConfigCtrl::LANG_MODULE))->withRequired(true)
        ];

        return $fields;
    }


    /**
     * @inheritDoc
     */
    protected function getTitle() : string
    {
        return self::plugin()->translate("configuration", ConfigCtrl::LANG_MODULE);
    }


    /**
     * @inheritDoc
     */
    protected function storeData(array $data) : void
    {
        self::plugintest()->config()->setValue(self::KEY_SOME, strval($data[self::KEY_SOME]));
    }
}
