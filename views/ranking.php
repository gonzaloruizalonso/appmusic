<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>RANKING ENTRE DOS FECHAS</h1>
    Para volver al menu, pulsa: <a href="../index.php">aqui</a>
<?php
//Esto lo hago para que el var_dump() muestre todo
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);


var_dump($_SESSION['ranking']);


 ?>
  </body>
</html>
