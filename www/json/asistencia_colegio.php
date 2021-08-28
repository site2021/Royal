<?php

include '../../app/control/conex.php';

$colegio = $_REQUEST['colegio'];

$rs = mysqli_query($conexion, "SELECT * FROM tbasistencia WHERE colegio='$colegio' ORDER BY colegio,interno,fecha");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

}

echo json_encode($items);

?>