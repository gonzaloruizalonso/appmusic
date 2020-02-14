<?php
session_start();
if(!isset($_SESSION['CustomerID'])){
     echo "<script>console.log('no hay sesion en el logout')</script>";
     header("location:../index.php");
  } else {
     echo "<script>console.log('hay sesion en logout')</script>";
     session_unset();
     session_destroy();
     header("location:../index.php");
  }

 ?>
