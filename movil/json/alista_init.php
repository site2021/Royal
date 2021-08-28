<?php

include 'conex.php';

$interno = $_REQUEST['interno'];

// eliminar antes las que ya tenga grabadas en la tabla temporal
$del = mysqli_query($conexion, "DELETE FROM tbalistatmp WHERE interno='$interno' ");

// traer lista de alistamientos
$rs = mysqli_query($conexion, "SELECT * FROM tbalista ORDER BY nivel1,nivel2");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

	$nivel1 = $row->nivel1;
	$nivel2 = $row->nivel2;
	$detalle = $row->detalle;
	$restringe = $row->restringe;


	$sql = "INSERT INTO tbalistatmp (interno,nivel1,nivel2,detalle,restringe,digitar) VALUES 
			('$interno','$nivel1','$nivel2','$detalle','$restringe','$restringe')";

	$res = mysqli_query($conexion, $sql);
	
}

echo json_encode(array('success'=>true));

?>