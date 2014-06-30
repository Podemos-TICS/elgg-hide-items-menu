<?php
/* ***********************************************************************
 * @author : Purusothaman Ramanujam
 * @link http://www.iYaffle.com/
 * ***********************************************************************/

	//registro del controlador que activará la función inicial del plugin
	register_elgg_event_handler('init','system','hide_members_menu_item_init');

	// función inicial con la que arranca el plugin
	function hide_members_menu_item_init() 
	{
		//variable que guardará el retorno de la función que recoge la configuración  del plugin, utilizando como parámetros el objeto "menu" y el 			nombre del plugin (devuelve valores como "only_admin" o "restricted", siempre relacionados con permisos de acceso)
		$menuSettings = elgg_get_plugin_setting("menu", $plugin_name = "hide_members_menu_item");

		// Se realizan una serie de comprobaciones para ver si el usuario logueado es o no un administrador del sitio
		 if ( (!elgg_is_admin_logged_in() and $menuSettings == 'only_admin')  || (!elgg_is_logged_in() and $menuSettings == 'all_users'))
		{
		   // Si no lo es, entonces se quita del registro la opción "members" del menú "más", que aquí se identifica con "site"
		   elgg_unregister_menu_item('site','members');
		   // la siguiente variable recoge el retorno de la función que recoge la configuración del plugin, utilizando casi los mismos parámetros 			   que antes
		   $restrictedAccess = elgg_get_plugin_setting("restricted_access", $plugin_name = "hide_members_menu_item");
		   // Una vez que se ha eliminado la opción del menú, se intentará quitar del registro la página relacionada.
		   if ($restrictedAccess == "restricted")
		   	elgg_unregister_page_handler('members', 'members_page_handler');
		}
}
?>
