<?php

/*Preparación del array que contendrá los textos con la traducción al ingles, para añadirlo más tarde al resto de traducciones con add_translation*/


	$english = array(

	

		/**

		 * Menu items and titles

		 */

			'option:visible_for_admin' => "Visible only for Administrators",
			
			'option:visible_for_users' => "Visible for all logged in users",
			
			'access:restrict_members_url' => "Also restrict url /members ",
			
			'access:non_restrict_members_url' => "NO resttrictions for /members url",
			
			'access:also_apply_this_rule' => "Also apply next rule:",
	);

					

	add_translation("en",$english);



?>
