<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Facturas</title>
  </head>
  <body>

    <?php
    session_start();
    if(!isset($_SESSION['CustomerID'])){
         echo "<script>console.log('no hay sesion')</script>";
         header("location:../index.php");
      } else {
      echo "
      <h1>Consultar facturas entre 2 fechas</h1><br><br>
      <form action=\"../controllers/facturas_controller.php\" method=\"POST\">
        <label for=\"fecha1\">Fecha 1</label>
        <input type=\"date\" name=\"fecha1\" required><br>
        <br>
        <label for=\"fecha2\">Fecha 2</label>
        <input type=\"date\" name=\"fecha2\" required><br>
        <br>
        <input type=\"submit\" name=\"enviarfechas\" value=\"Enviar\">
      </form>
      ";
    }
    ?>
    <br><br>
    Para volver al menu, pulsa: <a href="../index.php">aqui</a>
  </body>
</html>
