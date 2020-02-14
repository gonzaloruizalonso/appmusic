<?php
//Funcion que crea un Invoice y retorna su id
function crearInvoice($conn){
  $sql="SELECT (max(InvoiceID)+1) as i from Invoice";
  $result = mysqli_query($conn, $sql);
  $fila = mysqli_fetch_assoc($result);
  $invoiceID = $fila['i'];
  $custIDAux=$_SESSION['CustomerID'];

  $sql3 = "SELECT SYSDATE() as hoy";
  $result2 = mysqli_query($conn, $sql3);
  $fila2 = mysqli_fetch_assoc($result2);
  $fecha_hoy = $fila2['hoy'];

  $datosCustomer = [];
  $sql = "select * from Customer WHERE CustomerID='$custIDAux'";
  $resultado = mysqli_query($conn, $sql);
  $datosCustomer= mysqli_fetch_assoc($resultado);

  $billingAddress=$datosCustomer['Address'];
  $billingCity=$datosCustomer['City'];
  $billingState=$datosCustomer['State'];
  $billingCountry=$datosCustomer['Country'];
  $billingPostalCode=$datosCustomer['PostalCode'];

  $sql2 = "INSERT INTO Invoice (InvoiceID,CustomerID,InvoiceDate,BillingAddress,BillingCity,BillingState,BillingCountry,BillingPostalCode,Total)
  VALUES ('$invoiceID','$custIDAux','$fecha_hoy','$billingAddress','$billingCity','$billingState','$billingCountry','$billingPostalCode','0')";

  mysqli_query($conn, $sql2);

  return $invoiceID;
}
//Funcion que procesa la compra de la cancion que se le pasa por parametro
//y retorna un String con el resultado de la misma
function procesarCancion($conn,$datoscancion,$invoiceID){
  $mensajeCompra="";

  $sql="SELECT (max(InvoiceLineID)+1) as i from InvoiceLine";
  $result = mysqli_query($conn, $sql);
  $fila = mysqli_fetch_assoc($result);
  $invoiceLineID = $fila['i'];

  $trackIDAux=$datoscancion['cancion']['TrackId'];
  $unitPriceAux=$datoscancion['cancion']['UnitPrice'];
  $quantityAux=$datoscancion['cantidad'];

  $sql2 = "INSERT INTO InvoiceLine (InvoiceLineID,InvoiceID,TrackID,UnitPrice,Quantity)
  VALUES ('$invoiceLineID','$invoiceID','$trackIDAux','$unitPriceAux','$quantityAux')";
  mysqli_query($conn, $sql2);

  $precio=$quantityAux*$unitPriceAux;

  $sql3 = "UPDATE Invoice
  SET Total=Total+'$precio'
  WHERE InvoiceID='$invoiceID'";
  mysqli_query($conn, $sql3);

  $mensajeCompra="Cancion ".$datoscancion['cancion']['Name']." descargada correctamente.<br>
  Cantidad: ".$quantityAux." <br>Precio unidad".$unitPriceAux."<br><hr>";

  return $mensajeCompra;
}


 ?>
