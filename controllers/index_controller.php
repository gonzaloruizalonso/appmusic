<?php
//Controlamos que ya haya una sesion o no
if(isset($_SESSION['CustomerID'])){
  require_once("views/user.php");
  echo "<script>console.log('hay sesion')</script>";
}else{
  require_once("views/login.php");
}


 ?>
