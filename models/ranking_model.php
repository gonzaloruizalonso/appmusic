<?php
  function getRankingFecha($conn,$desde,$hasta){
    $ranking=[];
  	$sql = "SELECT Name, SUM(Quantity) AS sumQ from Track,InvoiceLine,Invoice where Invoice.InvoiceId=InvoiceLine.InvoiceId AND Invoice.InvoiceDate BETWEEN '$desde' AND '$hasta' AND Track.TrackId=InvoiceLine.TrackId group by Name order by sumQ DESC";

  	$resultado = mysqli_query($conn, $sql);
  	while ($row = mysqli_fetch_assoc($resultado)) {
  		$ranking[] = $row;
  	}
    return $ranking;
  }

 ?>
