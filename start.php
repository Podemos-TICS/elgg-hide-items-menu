<?php
/* ***********************************************************************
 * @authores Jon Esteban & Nestor Martinez
 *
 * ***********************************************************************/

/*ESTE ES EL PRIMER METODO OBLIGATORIO PARA EXTENDER ELGG CON UN PLUGIN
(LLAMA AL CONTROLADOR ESPECIFICO AL EJECUTARSE UN EVENTO Y LO PARA AL AMBITO QUE LE DIGAMOS)*/
register_elgg_event_handler('init','system','hide_items_menu_init');
/*Llamamos a el metodo register_elgg_event_handler (que es un controlador de eventos)que cada vez que se recarga una página de elgg (init)
 llama a el método (hide_items_menu) que tenemos que escribir en este mismo start.php*/

/*METODO DE ARRANQUE DEL PLUGIN CUANDO SE DISPARA EL EVENTO INIT (CONTROLADOR ESPECIFICO)*/
function hide_items_menu_init() {

	global $CONFIG;

			/*$activity = elgg_get_plugin_setting("Activity", $plugin_name = "hide-items-menu");
			var_dump($activity);*/
			$menuitems = get_register("menu");
			//var_dump($menuitems);


			if (!elgg_is_admin_logged_in()){

					// Ejecutamos este metodo que desactiva una función callback que era hook de un plugin.
					elgg_unregister_plugin_hook_handler('prepare', 'menu:site', 'elgg_site_menu_setup');
					// El primer parámetro es el nombre del hook, el segundo es el tipo de entidad y tercero la función callback de la cual lo eliminamos

					//(se ejecuta ocho veces)
					foreach ($menuitems as $item){

							//var_dump($menuitems);
							$item_value = elgg_get_plugin_setting($item->name, $plugin_name = "elgg-hide-items-menu");

							//En $item->value se guarda la url de la opción del menú correspondiente.
							//Con explode dividimos dicha url por el carácter "/"
							//En la posición 4 del array $value_min se encuentra la opción que queremos y como queremos
							$value_min=explode("/",$item->value);

							if($item_value=="yes"){

								elgg_unregister_menu_item( "site", $value_min[4]);
							}

							//primera propuesta para seleccionar los elementos a eliminar del menu "site"
							//$value_min = strtolower($item->name);
							//$value_min =str_replace(' ','',$value_min);
							
							$value_min[4];
					}//fin foreach

			//variable que guardará el retorno de la función que recoge la configuración  del plugin, utilizando como parámetros el objeto "menu" y el
			//nombre del plugin (devuelve valores como "only_admin" o "restricted", siempre relacionados con permisos de acceso)
	
			// Si el admin no está logeado y la opción en settings es only_admin....

						// la siguiente variable recoge el retorno de la función que recoge la configuración del plugin
		  			//$restrictedAccess = elgg_get_plugin_setting("restricted_access", $plugin_name = "hide_items_menu");
		  			// Una vez que se ha eliminado la opción del menú, se intentará quitar del registro la página relacionada.
		  			//if ($restrictedAccess == "restricted") {
									//elgg_unregister_page_handler('members', 'members_page_handler');
		  			//}//fin if
		 }//fin if
}//fin metodo
?>
