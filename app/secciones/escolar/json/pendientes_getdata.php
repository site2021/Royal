<?php

include '../../../control/conex.php';

$colegio = $_REQUEST['colegio'];
$mes = $_REQUEST['mes'];
$ruta = $_REQUEST['ruta'];

// se implementa la funcion (pagos) en la db
$sql = "SELECT conteo.recorrido, count(*) cuantos
		FROM (
			SELECT l.colegio,'' fecha,l.codigo,l.nombre,re.nombre recorrido,
			l.ruta,g.nombre grado,l.tarifav tarifabl,ifnull(pagos(l.codigo,'$mes'),0) pago,
			l.tarifav-ifnull(pagos(l.codigo,'$mes'),0) diferencia, '$mes' mes, '' observacion
			FROM tblistageneralnew l,
			tbgrados g,
			txrecorridos re
			WHERE l.grado = g.id 
			AND l.recorrido = re.id AND l.estado='A'
			AND l.colegio = '$colegio' 
			AND (l.ruta='$ruta' OR l.mrutaam='$ruta' OR l.mrutapm='$ruta' OR l.ruta2da='$ruta')
			AND l.tarifav-ifnull(pagos(l.codigo,'$mes'),0)>0
			ORDER BY convert(l.codigo,unsigned)
		) conteo GROUP BY conteo.recorrido";

$rs = mysqli_query($conexion, $sql);

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>