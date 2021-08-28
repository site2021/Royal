<?php

include '../../../control/conex.php';

$vigencia = $_REQUEST['vigencia'];
$colegio = $_REQUEST['colegio'];

$rs = mysqli_query($conexion, "SELECT id , barrio nombre FROM tbdatosnew 
							   WHERE vigencia='$vigencia' AND colegio='$colegio' ORDER BY barrio ASC");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>