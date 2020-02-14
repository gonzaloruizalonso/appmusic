<?php
if(!isset($_SESSION['CustomerID'])){

  require_once("views/login.php");
}else {
  echo "

  <h1>Menu usuario ".$_SESSION['CustomerID']."</h1>
  <hr>
  ";
  //downmusic
  if(isset($_POST['submit1'])){
    header('location:controllers/downmusic_controller.php');
  }else {
    echo "<form action=\""; echo $_SERVER['PHP_SELF']; echo "\" method=\"POST\">
    <input type=\"submit\" name=\"submit1\" value=\"Descargar musica\"></form>";
  }
  //histfacturas
  if(isset($_POST['submit2'])){
    header('location:controllers/histfacturas_controller.php');
  }else {
    echo "<form action=\""; echo $_SERVER['PHP_SELF']; echo "\" method=\"POST\">
    <input type=\"submit\" name=\"submit2\" value=\"Historial facturas\"></form>";
  }
  //facturas
  if(isset($_POST['submit3'])){
    header('location:controllers/facturasprevio_controller.php');
  }else {
    echo "<form action=\""; echo $_SERVER['PHP_SELF']; echo "\" method=\"POST\">
    <input type=\"submit\" name=\"submit3\" value=\"Historial facturas entre 2 fechas\"></form>";
  }
  //ranking
  if(isset($_POST['submit4'])){
    header('location:controllers/rankingprevio_controller.php');
  }else {
    echo "<form action=\""; echo $_SERVER['PHP_SELF']; echo "\" method=\"POST\">
    <input type=\"submit\" name=\"submit4\" value=\"Ranking entre 2 fechas\"></form>";
  }
  echo "

  <hr>
  <br><br>
  Para cerrar la sesion, pulsa: <a href=\"controllers/logout_controller.php\">logout</a>

  ";
}
?>
