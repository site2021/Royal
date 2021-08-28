<?php

$cedulaconductor = $_REQUEST['cedulaconductor'];
$fechaingreso = $_REQUEST['fechaingreso'];
$fecharetiro = $_REQUEST['fecharetiro'];

include '../../../control/conex.php';

$sql = "INSERT INTO tbingresoretiro (cedulaconductor,fechaingreso,fecharetiro) 
		VALUES 
		('$cedulaconductor','$fechaingreso','$fecharetiro') ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>