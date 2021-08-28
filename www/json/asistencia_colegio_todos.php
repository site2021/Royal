<?php

include '../../app/control/conex.php';

$colegio = $_REQUEST['colegio'];
$ruta = $_REQUEST['ruta'];
$interno = $_REQUEST['interno'];
$fecha = $_REQUEST['fecha'];
$jornada = $_REQUEST['jornada'];

// dependiendo el interno definimos el WHERE
$where = '';
if($interno!=''){
	$where = "iruta='$interno' OR iruta2da='$interno' OR imrutaam='$interno' OR imrutapm='$interno' AND ";
}

$sql = "SELECT colegio,codigo,estado,nombre,direccion,barrio,ciudad,iruta,iruta2da,imrutaam,imrutapm,
		ifnull(xasistencia(colegio,'$interno','$ruta','$jornada','$fecha',codigo),'X') asistencia,
		ifnull(f_asis_observa(colegio,'$interno','$ruta','$jornada','$fecha',codigo),'') observa
		FROM vst_lista_internos
		WHERE ".$where." colegio='$colegio' AND estado='A' ORDER BY convert(codigo,unsigned)";

//echo $sql;

$rs = mysqli_query($conexion, $sql);

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

}

echo json_encode($items);

?>