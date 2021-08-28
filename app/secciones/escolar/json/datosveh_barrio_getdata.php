<?php

include '../../../control/conex.php';

$colegio = $_REQUEST['colegio'];
$barrio = $_REQUEST['barrio'];

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosveh WHERE colegio='$colegio' AND sector LIKE '%$barrio%'
							   ORDER BY colegio, convert(ruta, unsigned integer) ");
//$rs = mysqli_query($conexion, "SELECT * FROM tbdatosveh ORDER BY colegio, ruta ");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>