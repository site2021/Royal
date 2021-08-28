<?php

include '../../../control/conex.php';

$colegio = $_REQUEST['colegio'];

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosnew WHERE colegio='$colegio' ORDER BY id");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>