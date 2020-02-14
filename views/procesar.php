<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();
    foreach ($_SESSION['resultadocompra'] as $key => $value) {
      echo $value;
    }
     ?>
     <br>
     Para volver al menu, pulsa: <a href="../index.php">aqui</a>
  </body>
</html>
