<?php

$interno = $_REQUEST['interno'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT id, placa FROM tbvehiculosrt WHERE interno='$interno' ORDER BY id");	

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);


?>