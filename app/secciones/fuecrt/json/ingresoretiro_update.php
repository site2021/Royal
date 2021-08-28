<?php

$cedulaconductor = $_REQUEST['cedulaconductor'];
// $fechaingreso = $_REQUEST['fechaingreso'];
$fecharetiro = $_REQUEST['fecharetiro'];

$id = $_REQUEST['id'];

include '../../../control/conex.php';

$sql = "UPDATE tbingresoretiro SET cedulaconductor='$cedulaconductor', fecharetiro='$fecharetiro' WHERE id='$id' ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>