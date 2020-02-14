<?php
session_start();
if(!isset($_SESSION['CustomerID'])){
     echo "<script>console.log('no hay sesion')</script>";
     header("location:../index.php");
  } else {
    //Llamada al fichero de la base de datos porque he cambiado de url
    require_once("../db/db.php");

    //Llamada a la vista
    header("location:../views/rankingprevio.php");

  }
 ?>
