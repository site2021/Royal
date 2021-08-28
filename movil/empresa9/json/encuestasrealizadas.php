<?php

include 'conex.php';

$codigoencuesta = $_REQUEST['codigoencuesta'];

$rs = mysqli_query($conexion, "SELECT * FROM tbemp9encuestacovid WHERE codigoencuesta='$codigoencuesta' ORDER BY fechaencuesta DESC");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>