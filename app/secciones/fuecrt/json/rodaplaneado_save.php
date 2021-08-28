<?php

$internovehroda = $_REQUEST['internovehroda'];
$placavehroda = $_REQUEST['placavehroda'];
$clasevehroda = $_REQUEST['clasevehroda'];
$contrato = $_REQUEST['contrato'];
$iniciocontrato = $_REQUEST['iniciocontrato'];
$fincontrato = $_REQUEST['fincontrato'];

include '../../../control/conex.php';

$sql = "INSERT INTO tbrodaplaneadort (internovehroda,placavehroda,clasevehroda,contrato,iniciocontrato,fincontrato) 
		VALUES 
		('$internovehroda','$placavehroda','$clasevehroda','$contrato','$iniciocontrato','$fincontrato') ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>