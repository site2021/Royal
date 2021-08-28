<?php

include '../../../control/conex.php';

$barrio = $_REQUEST['barrio'];

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosnew WHERE barrio='$barrio' ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>