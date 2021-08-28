<?php

include 'conex.php';

$interno = $_REQUEST['interno'];
$fecha = $_REQUEST['fecha'];

// consultar digitar y grabar en tabla
$rs = mysqli_query($conexion, "SELECT * FROM tbalistatmp WHERE interno='$interno' ORDER BY nivel1,nivel2");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

	$nivel1 = $row->nivel1;
	$nivel2 = $row->nivel2;
	$detalle = $row->detalle;
	$digitar = $row->digitar;
	$restringe = $row->restringe;

	$contar = 0;
	if($digitar!=$restringe){
		$contar = 1;
	}

	$sql = "INSERT INTO tbalistadatos (interno,fecha,nivel1,nivel2,detalle,restringe,digitar,contar) VALUES 
			('$interno','$fecha','$nivel1','$nivel2','$detalle','$restringe','$digitar','$contar')";

	$res = mysqli_query($conexion, $sql);
	
}

echo json_encode(array('success'=>true));


?>