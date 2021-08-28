<?php

include '../../../control/conex.php';

$xcolegio = $_REQUEST['colegio'];

// $rs = mysqli_query($conexion, "SELECT * FROM vst_listageneral WHERE colegio='$xcolegio' ORDER BY colegio,CAST(codigo AS UNSIGNED)");

$rs = mysqli_query($conexion, "SELECT *
	FROM vst_listageneral V
	INNER JOIN tblistageneralnew l ON v.nombre = l.nombre
	WHERE v.colegio = '$xcolegio'");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>