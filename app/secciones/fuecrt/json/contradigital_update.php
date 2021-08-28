<?php

$id = intval($_REQUEST['id']);
$objetocontrato = htmlspecialchars($_REQUEST['objetocontrato']);
$iniciocontrato = htmlspecialchars($_REQUEST['iniciocontrato']);
$fincontrato = htmlspecialchars($_REQUEST['fincontrato']);
$cliente = htmlspecialchars($_REQUEST['cliente']);
$nit = htmlspecialchars($_REQUEST['nit']);
$ciudadcliente = htmlspecialchars($_REQUEST['ciudadcliente']);
$responsable = htmlspecialchars($_REQUEST['responsable']);
$cedularesponsable = htmlspecialchars($_REQUEST['cedularesponsable']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$ciudadsalida = htmlspecialchars($_REQUEST['ciudadsalida']);
$recorrido = htmlspecialchars($_REQUEST['recorrido']);
$internoveh = htmlspecialchars($_REQUEST['internoveh']);
$placaveh = htmlspecialchars($_REQUEST['placaveh']);
$claseveh = htmlspecialchars($_REQUEST['claseveh']);
$valorservicio = htmlspecialchars($_REQUEST['valorservicio']);
$formapago = htmlspecialchars($_REQUEST['formapago']);
$fechafirma = htmlspecialchars($_REQUEST['fechafirma']);

include '../../../control/conex.php';

$sql = "UPDATE tbcontradigitalrt SET objetocontrato='$objetocontrato',iniciocontrato='$iniciocontrato',fincontrato='$fincontrato',cliente='$cliente',nit='$nit',ciudadcliente='$ciudadcliente',responsable='$responsable',cedularesponsable='$cedularesponsable',direccion='$direccion',telefono='$telefono',ciudadsalida='$ciudadsalida',recorrido='$recorrido',internoveh='$internoveh',placaveh='$placaveh',claseveh='$claseveh',valorservicio='$valorservicio',formapago='$formapago',fechafirma='$fechafirma' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'objetocontrato' => $objetocontrato,
		'iniciocontrato' => $iniciocontrato,
		'fincontrato' => $fincontrato,
		'cliente' => $cliente,
		'nit' => $nit,
		'responsable' => $responsable,
		'cedularesponsable' => $cedularesponsable,
		'direccion' => $direccion,
		'telefono' => $telefono,
		'valorservicio' => $valorservicio,
		'fechafirma' => $fechafirma
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>