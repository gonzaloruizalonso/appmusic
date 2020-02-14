<?php
  function getFacturasCliente($conn,$customerId){
    $facturas=[];
  	$sql = "select * from Invoice where CustomerId='$customerId'";

  	$resultado = mysqli_query($conn, $sql);
  	while ($row = mysqli_fetch_assoc($resultado)) {
  		$facturas[] = $row;
  	}
    return $facturas;
  }
  function getContenidoFactura($conn,$invoiceID) {
    $contenidoFactura=[];

    $sql = "select InvoiceLine.InvoiceLineID,InvoiceLine.InvoiceId,InvoiceLine.TrackId,Track.Name,InvoiceLine.UnitPrice,InvoiceLine.Quantity from InvoiceLine,Track WHERE InvoiceLine.InvoiceId='$invoiceID' AND InvoiceLine.TrackId=Track.TrackId";
    $resultado = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($resultado)) {
  		$contenidoFactura[] = $row;
  	}
    return $contenidoFactura;
  }
  function getFacturasClienteFecha($conn,$customerId,$fecha1,$fecha2){
    $facturas=[];
  	$sql = "select * from Invoice where CustomerId='$customerId' AND InvoiceDate BETWEEN '$fecha1' AND '$fecha2'";

  	$resultado = mysqli_query($conn, $sql);
  	while ($row = mysqli_fetch_assoc($resultado)) {
  		$facturas[] = $row;
  	}
    return $facturas;
  }

 ?>
