<?php

include '../../app/control/conex.php';

$colegio = $_REQUEST['colegio'];

$rs = mysqli_query($conexion, "SELECT '*' codigo, '*' nombre FROM dual
							   UNION ALL
							   SELECT DISTINCT ruta codigo, ruta nombre  
							   FROM vst_rutas WHERE colegio='$colegio' ORDER BY convert(codigo,unsigned)");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>