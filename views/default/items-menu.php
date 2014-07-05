<?php
  echo "dentro del archivo items-menu";
  echo "<br />";
  //RECORREMOS EL ARRAY DEL MENU SITE-->
  $menuitems = get_register('menu');
  var_dump($menuitems);
  //echo elgg_view("items-menu");
  echo "<br />";

  echo "<p><b>Selecciona los elementos que no quieres que se muestren:</b></p>";

  foreach ($menuitems as $item){
  //echo $item->name;
  echo "<span>".$item->name."</span>";
  //Por cada item imprimimos un checkbox con el valor de su nombre, y si ya existia en el array $vars[entity] imprimimos un checked...
  /*echo "<input type='checkbox' value='".$item->name."'"
  .if (isset($vars['entity']->item->name)) echo "checked='checked'"." name='params[".$item->name."]'/>";
  echo " |  ";
  */

   echo "<input type='checkbox' value='".$item->name." name='params[".$item->name."]'/>";
   echo " |  ";

  if ($vars['entity']->item->name == "activity"){
    echo "existe ;  ";

  }else{echo"no existe ;  ";} // muestra no existe en todos por que todabía no se ha guardado en $vars
}
?>
