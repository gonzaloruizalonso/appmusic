<?php
session_start();
if(!isset($_SESSION['CustomerID'])){
     echo "<script>console.log('no hay sesion')</script>";
     header("location:../index.php");
  } else {
    //Llamada al fichero de la base de datos porque he cambiado de url
    require_once("../db/db.php");
    //Llamada al modelo
    require_once("../models/ranking_model.php");
    $_SESSION['ranking']=null;
    $_SESSION['ranking']=[];

    $desde=$_REQUEST['fecha1'];
    $hasta=$_REQUEST['fecha2'];

    $_SESSION['ranking']=getRankingFecha($conn,$desde,$hasta);

    //Llamada a la vista
    header("location:../views/ranking.php");

  }
 ?>
