<?php

$id = intval($_REQUEST['id']);
$contrato = htmlspecialchars($_REQUEST['contrato']);
$objetocontrato = htmlspecialchars($_REQUEST['objetocontrato']);
// $iniciocontrato = htmlspecialchars($_REQUEST['iniciocontrato']);
// $fincontrato = htmlspecialchars($_REQUEST['fincontrato']);
$cliente = htmlspecialchars($_REQUEST['cliente']);
$nit = htmlspecialchars($_REQUEST['nit']);
$responsable = htmlspecialchars($_REQUEST['responsable']);
$cedularesponsable = htmlspecialchars($_REQUEST['cedularesponsable']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$valorservicio = htmlspecialchars($_REQUEST['valorservicio']);

include '../../../control/conex.php';

$sql = "UPDATE tbcontratosg3 SET contrato='$contrato',objetocontrato='$objetocontrato',cliente='$cliente',nit='$nit',responsable='$responsable',cedularesponsable='$cedularesponsable',direccion='$direccion',telefono='$telefono',valorservicio='$valorservicio' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'contrato' => $contrato,
		'objetocontrato' => $objetocontrato,
		// 'iniciocontrato' => $iniciocontrato,
		// 'fincontrato' => $fincontrato,
		'cliente' => $cliente,
		'nit' => $nit,
		'responsable' => $responsable,
		'cedularesponsable' => $cedularesponsable,
		'direccion' => $direccion,
		'telefono' => $telefono,
		'valorservicio' => $valorservicio
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>