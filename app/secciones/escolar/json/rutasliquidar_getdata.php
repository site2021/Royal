<?php

include '../../../control/conex.php';

$colegio = $_REQUEST['colegio'];
$mes = $_REQUEST['mes'];
$ruta = $_REQUEST['ruta'];

$rs = mysqli_query($conexion, "SELECT * FROM vst_liquidacion_rutas WHERE colegio='$colegio' AND mes='$mes'
							   AND ruta='$ruta' ");

$totalaso = 0;

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

	// incluir o excluir pago 
	if($row->estado=='X'){
		$totalaso = $totalaso + $row->tarifaaso;	
	}
	
}

$totales[] = array('tarifaaso'=>$totalaso);

$json_string = json_encode($items);
$json_totales = json_encode($totales);

echo "{\"rows\":".$json_string.",\"footer\":".$json_totales."}";

//echo json_encode($items);

?>