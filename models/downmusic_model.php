<?php
  //Funcion que devuelve las canciones
  function getCanciones($conn) {
  	$canciones = [];
  	$sql = "select * from track";

  	$resultado = mysqli_query($conn, $sql);
  	while ($row = mysqli_fetch_assoc($resultado)) {
  		$canciones[] = $row;
  	}
  	return $canciones;
  }

 ?>
