<?php

include '../../app/control/conex.php';

$colegio = $_REQUEST['colegio'];
$interno = $_REQUEST['interno'];
$mes = $_REQUEST['mes'];

$rs = mysqli_query($conexion, "SELECT * FROM tbplanillas WHERE  colegio='$colegio'
							   AND interno='$interno' AND mes='$mes' ORDER BY id");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>