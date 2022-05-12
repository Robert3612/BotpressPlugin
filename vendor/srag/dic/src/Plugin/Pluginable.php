<?php

namespace srag\DIC\Plugintest\Plugin;

/**
 * Interface Pluginable
 *
 * @package srag\DIC\Plugintest\Plugin
 */
interface Pluginable
{

    /**
     * @return PluginInterface
     */
    public function getPlugin() : PluginInterface;


    /**
     * @param PluginInterface $plugin
     *
     * @return static
     */
    public function withPlugin(PluginInterface $plugin)/*: static*/ ;
}
