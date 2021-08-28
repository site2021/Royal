<?php

$interno = $_REQUEST['interno'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT id, placa FROM tbvehiculosg3 WHERE interno='$interno' ORDER BY id");	

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);


?>