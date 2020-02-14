<?php
  //Funcion comprueba datos del login
  function comprobarLogin($conn,$mail,$apell){
    $logincorrecto=false;

      $sql="SELECT LastName FROM Customer WHERE Email='$mail'";
      $result = mysqli_query($conn, $sql);
      $fila = mysqli_fetch_assoc($result);
      $apellReal = $fila['LastName'];

      if($apell==$apellReal){
        $logincorrecto=true;
      }
      return $logincorrecto;
  }
  function obtenerCustomerID($conn,$mail){
    $cID="";

    $sql="SELECT CustomerID FROM Customer WHERE Email='$mail'";
    $result = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_assoc($result);
    $cID = $fila['CustomerID'];

    return $cID;
  }

 ?>
