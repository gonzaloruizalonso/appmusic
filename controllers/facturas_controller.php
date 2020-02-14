<?php
session_start();
if(!isset($_SESSION['CustomerID'])){
     echo "<script>console.log('no hay sesion')</script>";
     header("location:../index.php");
  } else {
    //Llamada al fichero de la base de datos porque he cambiado de url
    require_once("../db/db.php");
    //Llamada al modelo
    require_once("../models/facturas_model.php");
    $_SESSION['facturas']=null;
    $_SESSION['facturas']=[];
    $custIDAux=$_SESSION['CustomerID'];

    $desde=$_REQUEST['fecha1'];
    $hasta=$_REQUEST['fecha2'];

    $_SESSION['facturas']=getFacturasClienteFecha($conn,$custIDAux,$desde,$hasta);
    //var_dump($_SESSION['facturas']);

    for ($i=0; $i < sizeof($_SESSION['facturas']); $i++) {
      $_SESSION['facturas'][$i]['items']=null;
      //var_dump($_SESSION['facturas'][$i]);
      $invoiceIDAux=$_SESSION['facturas'][$i]['InvoiceId'];
      $_SESSION['facturas'][$i]['items']=getContenidoFactura($conn,$invoiceIDAux);
      //var_dump($_SESSION['facturas'][$i]['items']);
    }


    //Llamada a la vista
    header("location:../views/facturas.php");

  }
 ?>
