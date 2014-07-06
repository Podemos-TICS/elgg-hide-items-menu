<div>
<?php
/**
 * Elgg Hide-items-menu plugin settings.
 *
 * @package Elgg Hide-Items-menu
 */

echo elgg_echo("me cago en tu vieja");
echo "<br />";
echo "Lo más simple";
echo "<br />";
//echo elgg_view("items-menu");
//COJEMOS EL ARRAY DEL MENU
$menuitems = get_register('menu');
//var_dump($menuitems);
//echo elgg_view("items-menu");

//IMPRIMIMOS UN TITULO DESDE LANGUAGES
echo "<p><b>";
echo elgg_echo("options:titulo");
echo "</b></p>";


//PREPARAMOS DOS ARRAYS PARA LOS SELECTS
$yesno_options = array(
																"yes" => elgg_echo("option:yes"),
																"no" => elgg_echo("option:no")
																);
$noyes_options = array_reverse($yesno_options);


//RECORREMOS EL ARRAY DEL MENU SITE
foreach ($menuitems as $item){

//IMPRIMIMOS LOS NAMES PARA IDENTIFICARLOS
echo "<span>".$item->name." -> </span>";
//Por cada item imprimimos un input checkbox con el valor de su nombre, y si ya existia en el array $vars[entity] imprimimos un checked...
/*echo "<input type='checkbox' value='".$item->name."'"
.if (isset($vars['entity']->item->name)) echo "checked='checked'"." name='params[".$item->name."]'/>";
echo " |  ";
*/

//COMPROVAMOS SI LA PROPIEDAD DEL OBJETO
if ($vars['entity']->valor != NULL){
	if ($vars['entity']->valor == 'yes'){
		$options_value = $yesno_options;
	}else{
		$options_value = $noyes_options;
	}
	echo elgg_view("input/dropdown", array("name" => "params[".$valor."]", "options_values" => $options_value, "value" => $vars['entity']->valor));
	echo "<br/>";
}else{
	echo elgg_view("input/dropdown", array("name" => "params[".$valor."]", "options_values" => $noyes_options, "value" => $vars['entity']->valor));
	echo "<br/>";
}
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
}

?>
<!--RECORREMOS EL ARRAY DEL MENU SITE-->

<!--POR CADA ELEMENTO MOSTRAMOS SU NAME-->
</div>
<!--POR CADA ELEMENTO MOSTRAMOS SU NAME-->
