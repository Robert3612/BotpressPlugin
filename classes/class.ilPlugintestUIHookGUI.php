<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\Plugintest\Utils\PlugintestTrait;
use srag\DIC\Plugintest\DICTrait;

/**
 * Class ilPlugintestUIHookGUI
 *
 * Generated by SrPluginGenerator v2.9.1
 *
 * @author Robert Schmidt <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
class ilPlugintestUIHookGUI extends ilUIHookPluginGUI
{

    use DICTrait;
    use PlugintestTrait;

    const PLUGIN_CLASS_NAME = ilPlugintestPlugin::class;


    /**
     * ilPlugintestUIHookGUI constructor
     */
    public function __construct()
    {

    }

    function getHTML($a_comp, $a_part, $a_par = array())
	{


		if ($a_part == "template_get" && $a_par['tpl_id']=="src/UI/templates/default/MainControls/tpl.metabar.html"){
			return array("mode" => ilUIHookPluginGUI::PREPEND, "html" => "
			<script src='http://185.128.118.107:3333/assets/modules/channel-web/inject.js'></script>
			<script>
			window.botpressWebChat.init({ host: 'http://185.128.118.107:3333', botId: 'test4' })
		  </script>
		  ");
		}
		//echo "<script>console.log('Debug Objects: " . $a_part . "' );</script>";
		if ($a_comp == "Services/MainMenu" && $a_part == "main_menu_search")
		{
			// $a_par["main_menu_gui"] is ilMainMenu object
			// $a_par["main_menu_search_gui"] is ilMainMenuSearchGUI object
			
			return array("mode" => ilUIHookPluginGUI::APPEND, "html" => "");
		}


		// do not show the search part of the main menu
		// $a_par["main_menu_gui"]
		if ($a_comp == "Services/MainMenu" && $a_part == "main_menu_search")
		{
			// $a_par["main_menu_gui"] is ilMainMenu object
			// $a_par["main_menu_search_gui"] is ilMainMenuSearchGUI object
			
			return array("mode" => ilUIHookPluginGUI::REPLACE, "html" => "");
		}
		
		// add something to the main menu entries
		if ($a_comp == "Services/MainMenu" && $a_part == "main_menu_list_entries")
		{
			// $a_par["main_menu_gui"] is ilMainMenu object
			
			return array("mode" => ilUIHookPluginGUI::APPEND, "html" =>
				" <a class='MMInactive' href='http://www.ilias.de' target='_blank'>ILIAS Home Page</a>");
		}
		
		// add something to locator
		if ($a_comp == "Services/Locator" && $a_part == "main_locator")
		{
			// $a_par["locator_gui"] is ilLocatorGUI object
			
			return array("mode" => ilUIHookPluginGUI::APPEND,
				"html" => " » My Locator");
		}

		// add things to the personal desktop overview
		if ($a_comp == "Services/PersonalDesktop" && $a_part == "left_column")
		{
			// $a_par["personal_desktop_gui"] is ilPersonalDesktopGUI object
			
			return array("mode" => ilUIHookPluginGUI::PREPEND,
				"html" => "Prepend to left");
		}

		// add things to the personal desktop overview
		if ($a_comp == "Services/PersonalDesktop" && $a_part == "right_column")
		{
			// $a_par["personal_desktop_gui"] is ilPersonalDesktopGUI object
			
			return array("mode" => ilUIHookPluginGUI::APPEND,
				"html" => "Append to right");
		}

		// add things to the personal desktop overview
		if ($a_comp == "Services/PersonalDesktop" && $a_part == "center_column")
		{
			// $a_par["personal_desktop_gui"] is ilPersonalDesktopGUI object
			
			return array("mode" => ilUIHookPluginGUI::PREPEND,
				"html" => "Prepend to center");
		}

		return array("mode" => ilUIHookPluginGUI::KEEP, "html" => "");
	}


    function modifyGUI($a_comp, $a_part, $a_par = array())
	{
		// currently only implemented for $ilTabsGUI
		
		// tabs hook
		// note that you currently do not get information in $a_comp
		// here. So you need to use general GET/POST information
		// like $_GET["baseClass"], $ilCtrl->getCmdClass/getCmd
		// to determine the context.
		if ($a_part == "tabs")
		{
			// $a_par["tabs"] is ilTabsGUI object
			
			// add a tab (always)
			$a_par["tabs"]->addTab("test", "test", "test");
		}
	}
}
