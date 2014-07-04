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
  echo "<input type='checkbox' value='".$item->name."' name='".$item->name."'/>";
  echo " |  ";

}
?>
