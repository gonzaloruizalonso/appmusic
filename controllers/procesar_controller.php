<?php
session_start();
if(!isset($_SESSION['CustomerID'])){
     echo "<script>console.log('no hay sesion')</script>";
     header("location:../index.php");
  } else {
    //Llamada al fichero de la base de datos porque he cambiado de url
    require_once("../db/db.php");
    //Llamada al modelo
    require_once("../models/procesar_model.php");
    $invoiceID=crearInvoice($conn);
    $_SESSION['resultadocompra']=null;
    $_SESSION['resultadocompra']=[];
    for ($i=0; $i < sizeof($_SESSION['carrito']); $i++) {
      array_push($_SESSION['resultadocompra'],procesarCancion($conn,$_SESSION['carrito'][$i],$invoiceID));
    }


    //Llamada a la vista
    header("location:../views/procesar.php");
  }

 ?>
