<?php

include 'conex.php';

$interno = $_REQUEST['interno'];
$colegio = $_REQUEST['colegio'];
$ruta = $_REQUEST['ruta'];
$fecha = $_REQUEST['fecha'];
$jornada = $_REQUEST['jornada'];

$rs = mysqli_query($conexion, "SELECT codigo,nombre FROM tblistageneralnew WHERE colegio='$colegio' AND
	estado = 'A' AND
	(ruta='$ruta' OR ruta2da='$ruta' OR mrutaam='$ruta' OR mrutapm='$ruta' ) ORDER BY convert(codigo,unsigned) ");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

	$xcodigo = $row->codigo;
	$xnombre = $row->nombre;

	$sqli = "INSERT INTO tbasistencia (interno,colegio,ruta,fecha,jornada,codigo,nombre,asistencia) VALUES 
			('$interno','$colegio','$ruta','$fecha','$jornada','$xcodigo','$xnombre','S')";

	$rsi = mysqli_query($conexion,$sqli);

}

// echo json_encode($items);
echo json_encode(array('items'=>$items,'success'=>true));

?>