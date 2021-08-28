<?php

include '../../../control/conex.php';

$vigencia = $_REQUEST['vigencia'];
$colegio = $_REQUEST['colegio'];
$barrio = $_REQUEST['barrio'];

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosnew WHERE vigencia='$vigencia' AND colegio='$colegio' AND barrio='$barrio' ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>