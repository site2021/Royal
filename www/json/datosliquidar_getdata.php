<?php

include '../../app/control/conex.php';


$codigo = $_REQUEST['codigo'];

if($codigo=='x'){
	$rs = mysqli_query($conexion, "SELECT * FROM tbdatosliquidar ORDER BY id");	

}else {
	if($codigo==''){
		//$rs = mysqli_query($conexion, "SELECT * FROM tbdatosliquidar WHERE codigo='602' ORDER BY id");	
		$rs = mysqli_query($conexion, "SELECT * FROM tbdatosliquidar WHERE codigo='000' ORDER BY id");	

	}else {
		$rs = mysqli_query($conexion, "SELECT * FROM tbdatosliquidar WHERE codigo='$codigo' ORDER BY id");	
	}
}

$total = 0;
$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
	$total = $total + $row->valorliq;

}

$totales = array();
array_push($totales, array('nombreestudiante'=>'Totales','valorliq'=>$total));

$json_string = json_encode($items);
$json_totales = json_encode($totales);


echo "{\"rows\":".$json_string.",\"footer\":".$json_totales."}";		

//echo json_encode($items);

?>