<?php

$reporte = $_REQUEST['reporte'];
$combo = $_REQUEST['combo'];
$desde = $_REQUEST['desde'];
$hasta = $_REQUEST['hasta'];
$tipo = $_REQUEST['tipo'];

include '../../../control/conex.php';

// insertar campo de reporte 
$sql = "INSERT INTO rbreportesfiltros (id_reporte,combo,desde,hasta,tipo) VALUES ($reporte,'$combo','$desde','$hasta','$tipo')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('success'=>false));
}

?>