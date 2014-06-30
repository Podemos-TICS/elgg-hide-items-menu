<?php
/* ***********************************************************************
 * @author : Purusothaman Ramanujam
 * @link http://www.iYaffle.com/
 * ***********************************************************************/

	register_elgg_event_handler('init','system','hide_members_menu_item_init');

	function hide_members_menu_item_init() 
	{
		$menuSettings = elgg_get_plugin_setting("menu", $plugin_name = "hide_members_menu_item");

		 if ( (!elgg_is_admin_logged_in() and $menuSettings == 'only_admin')  || (!elgg_is_logged_in() and $menuSettings == 'all_users'))
		{
		   elgg_unregister_menu_item('site','members');
		   $restrictedAccess = elgg_get_plugin_setting("restricted_access", $plugin_name = "hide_members_menu_item");
		   if ($restrictedAccess == "restricted")
		   	elgg_unregister_page_handler('members', 'members_page_handler');
		}
}
?>