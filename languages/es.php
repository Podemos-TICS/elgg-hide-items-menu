<?php

/*Preparación del array que contendrá los textos con la traducción al castellano, para añadirlo más tarde al resto de traducciones con add_translation*/

	$spanish = array(

	

		/**

		 * Menu items and titles

		 */

			'option:visible_for_admin' => "Visible solo para Administradores",
			
			'option:visible_for_users' => "Visible para todos los usuarios logueados",
			
			'access:restrict_members_url' => "Restringir la url /members",
			
			'access:non_restrict_members_url' => "NO restringir la url /members",
			
			'access:also_apply_this_rule' => "Tambi&eacute;n aplicar la siguiente regla:",
	);

					

	add_translation("es",$spanish);



?>
