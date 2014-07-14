<div>
<?php
/**
 * Elgg Hide-items-menu plugin settings.
 *
 * @package Elgg Hide-Items-menu
 */

echo "<br />";
echo "Lo más simple";
echo "<br />";
//echo elgg_view("items-menu");
//COGEMOS EL ARRAY DEL MENU

$menuitems = get_register('menu');

var_dump($menuitems);
//echo elgg_view("items-menu");

//IMPRIMIMOS UN TITULO DESDE LANGUAGES
echo "<p><b>";
echo elgg_echo("options:titulo");
echo "</b></p>";


//PREPARAMOS DOS ARRAYS PARA LOS SELECTS (cambiado)
$yesno_options = array(
"yes" => elgg_echo("option:yes"),
"no" => elgg_echo("option:no"),
);

//de momento no funciona																);
//$noyes_options = array_reverse($yesno_options);

//EL ARRAY INVERSO AL ANTERIOR (creado)
$noyes_options = array(
"no" => elgg_echo("option:no"),
"yes" => elgg_echo("option:yes"),
);

/****************************************************************************************************************************************/

/**
 * Form body for setting up site menu
 */

// cantidad de elementos que tendrá el menu principal
$num_featured_items = 6;

// get site menu items
$menu = elgg_get_config('menus');
$menu = $menu['site'];
$builder = new ElggMenuBuilder($menu);
$menu = $builder->getMenu('name');
$menu_items = $menu['default'];

$featured_menu_names = elgg_get_config('site_featured_menu_names');

$dropdown_values = array();

$i=0;
foreach ($menu_items as $item) {
	$dropdown_values[$item->getName()] = $i;
	$i++;
}
$dropdown_values[' '] = elgg_echo('none');

?>
<div class="elgg-module elgg-module-inline">
	<div class="elgg-body">
<?php


for ($i=0; $i<$num_featured_items; $i++) {
	if ($featured_menu_names && array_key_exists($i, $featured_menu_names)) {
		$current_value = $featured_menu_names[$i];
	} else {
		$current_value = ' ';
	}

	// aqui se preparan los menús desplegables donde se encontrarán todas las opciones posibles
	// del menu del sitio
	echo elgg_view('input/dropdown', array(
		'options_values' => $dropdown_values,
		'name' => 'featured_menu_names[]',
		'value' => $current_value
	));
}
?>
	</div>
</div>

<?php

//echo elgg_view('input/submit', array('value' => elgg_echo('save')));

/****************************************************************************************************************************************/

//INDICE i INICIALIZADO A CERO
$i=0;


//RECORREMOS EL ARRAY DEL MENU SITE
foreach ($menuitems as $item){

//IMPRIMIMOS LOS NAMES PARA IDENTIFICARLOS
echo "<span>".$item->name." -> </span>";
//Por cada item imprimimos un input checkbox con el valor de su nombre, y si ya existia en el array $vars[entity] imprimimos un checked...
/*echo "<input type='checkbox' value='".$item->name."'"
.if (isset($vars['entity']->item->name)) echo "checked='checked'"." name='params[".$item->name."]'/>";
echo " |  ";
*/
$valor = $item->name;

//COMPROBAMOS SI LA PROPIEDAD DEL OBJETO ES NULA O NO (SI YA EXISTE UN VALOR PREVIO O NO)

if ($vars['entity']->$valor != NULL){
	if ($vars['entity']->$valor == 'yes'){
		$options_value = $yesno_options;
		
	}else{
		$options_value = $noyes_options;
	}

	//echo elgg_view("input/dropdown", array("name" => "params[{$valor}]", "options_values" => $options_value, "value" => $vars['entity']->valor));

	echo elgg_view("input/dropdown", array("name" => "params[{$valor}]", "options_values" => $options_value, "value" => $vars['entity']->valor));


	if ($featured_menu_names && array_key_exists($i, $featured_menu_names)) {
		$current_value = $i;
	} else {
		$current_value = ' ';
	}

	// aqui se preparan los menús desplegables donde se encontrarán todas las opciones posibles
	// del menu del sitio
	echo elgg_view('input/dropdown', array(
		'options_values' => $dropdown_values,
		'name' => 'featured_menu_names[]',
		'value' => $current_value
	));
$i++;

	echo "<br />";

}else{

	//echo elgg_view("input/dropdown", array("name" => "params[{$valor}]", "options_values" => $noyes_options, "value" => $vars['entity']->valor));

	echo elgg_view("input/dropdown", array("name" => "params[{$valor}]", "options_values" => $noyes_options, "value" => $vars['entity']->valor));

	echo "<br />";


}//fin if...else...


//codigo que va a servir para ubicar al gusto los items del menu principal del sitio
/*$dropdown_values = array();
$menuitems_items2 = $menuitems_items;
foreach ($menuitems_items2 as $item) {
	//$dropdown_values[$item->getName()] = $item->getText();
	echo "prueba";
}*/

/*
$i=0;
echo $options_value[$i];
$i++;
*/


/*
if ($vars['entity']->items->name == $items->name){
	echo "está";
}else{
	echo "no está";

}

echo "<input value='".$item->name." name='params[".$item->name."]'/>";
echo " |  ";
*/

/*
if ($vars['entity']->item->name == "activity"){
	echo "existe ;  ";

}else{echo"no existe ;  ";} // muestra no existe en todos por que todabía no se ha guardado en $vars
*/

}//fin foreach


?>
<!--RECORREMOS EL ARRAY DEL MENU SITE-->

<!--POR CADA ELEMENTO MOSTRAMOS SU NAME-->
</div>
<!--POR CADA ELEMENTO MOSTRAMOS SU NAME-->
