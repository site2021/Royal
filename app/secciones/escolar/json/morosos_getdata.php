<?php

include '../../../control/conex.php';

$colegio = $_REQUEST['colegio'];
$mes = $_REQUEST['mes'];

// se implementa la funcion (pagos) en la db
$sql = "SELECT l.colegio,'' fecha,l.codigo,l.nombre,re.nombre recorrido,
		l.ruta,g.nombre grado,l.tarifav tarifabl,ifnull(pagos(l.codigo,'$mes'),0) pago,
		l.tarifav-ifnull(pagos(l.codigo,'$mes'),0) diferencia, '$mes' mes, '' observacion
		FROM tblistageneralnew l,
		tbgrados g,
		txrecorridos re
		WHERE l.grado = g.id 
		AND l.recorrido = re.id AND l.estado='A'
		AND l.colegio = '$colegio'
		ORDER BY convert(l.codigo,unsigned)";

$rs = mysqli_query($conexion, $sql);

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>