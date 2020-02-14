<?php
session_start();
if(!isset($_SESSION['CustomerID'])){
     echo "<script>console.log('no hay sesion')</script>";
     header("location:../index.php");
  } else {
    //Llamada al fichero de la base de datos porque he cambiado de url
    require_once("../db/db.php");

    //Llamada al modelo
    require_once("../models/downmusic_model.php");
    $datoscanciones=getCanciones($conn);
    $_SESSION['datoscanciones'] = $datoscanciones;
    $_SESSION['carrito']=[];
    //var_dump($canciones);
    //Llamada a la vista
    header("location:../views/downmusic.php");
  }

 ?>
