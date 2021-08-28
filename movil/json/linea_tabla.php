<?php

$contrato = $_REQUEST['contrato'];
$iniciocontrato = $_REQUEST['iniciocontrato'];
$cedularesponsable = $_REQUEST['cedularesponsable'];
$cedula = $_REQUEST['cedula'];
$pasajero = $_REQUEST['pasajero'];

include 'conex.php';

$sql = "INSERT INTO tbpasajeros (contrato,iniciocontrato,cedularesponsable,cedula,pasajero) 
		VALUES 
		('$contrato','$iniciocontrato','$cedularesponsable','$cedula','$pasajero') ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>