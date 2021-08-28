<?php

$id = intval($_REQUEST['id']);
$interno = htmlspecialchars($_REQUEST['interno']);
$conductor = htmlspecialchars($_REQUEST['conductor']);
$cedulaconductor = htmlspecialchars($_REQUEST['cedulaconductor']);
$vigencialicencia = htmlspecialchars($_REQUEST['vigencialicencia']);
$clase = htmlspecialchars($_REQUEST['clase']);
$desde = htmlspecialchars($_REQUEST['desde']);
$hasta = htmlspecialchars($_REQUEST['hasta']);
$salarioletra = htmlspecialchars($_REQUEST['salarioletra']);
$salarionum = htmlspecialchars($_REQUEST['salarionum']);

include '../../control/conex.php';

$sql = "UPDATE tbvehiculos SET interno='$interno',conductor='$conductor',cedulaconductor='$cedulaconductor',vigencialicencia='$vigencialicencia',clase='$clase', desde='$desde', hasta='$hasta', salarioletra='$salarioletra', salarionum='$salarionum' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'interno' => $interno,
		'conductor' => $conductor,
		'cedulaconductor' => $cedulaconductor,
		'vigencialicencia' => $vigencialicencia,
		'clase' => $clase,
		'desde' => $desde,
		'hasta' => $hasta,
		'salarioletra' => $salarioletra,
		'salarionum' => $salarionum
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>