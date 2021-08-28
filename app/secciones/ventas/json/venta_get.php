<?php

$numero = $_REQUEST['numero'];

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT count(*) FROM tbdatosventas");
$row = mysqli_fetch_row($rs);

$result["total"] = $row[0];

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosventas WHERE numero='$numero' LIMIT $offset,$rows");

$tvalor = 0;
$tconductor = 0;
$tcomision = 0;
$tutilidad = 0;

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
	$tvalor = $tvalor + $row->valor;
	$tconductor = $tconductor + $row->conductor;
	$tcomision = $tcomision + $row->comision;
	$tutilidad = $tutilidad + $row->utilidad;

}

$result["rows"] = $items;

// echo json_encode($result);

$totales[] = array('ninterno'=>'TOTALES', 'valor'=>$tvalor, 'conductor'=>$tconductor, 'comision'=>$tcomision, 'utilidad'=>$tutilidad );

$json_string = json_encode($items);
$json_totales = json_encode($totales);

echo "{\"rows\":".$json_string.",\"footer\":".$json_totales."}";

?>