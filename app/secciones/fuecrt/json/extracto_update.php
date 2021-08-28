<?php

$id = intval($_REQUEST['id']);
// $extracto = htmlspecialchars($_REQUEST['extracto']);
// $contrato = htmlspecialchars($_REQUEST['contrato']);
// $origen = htmlspecialchars($_REQUEST['origen']);
// $destino = htmlspecialchars($_REQUEST['destino']);
// $recorrido = htmlspecialchars($_REQUEST['recorrido']);
// $objetocontrato = htmlspecialchars($_REQUEST['objetocontrato']);
// $conductor1 = htmlspecialchars($_REQUEST['conductor1']);
// $cedulaconductor1 = htmlspecialchars($_REQUEST['cedulaconductor1']);
// $vigencialicencia1 = htmlspecialchars($_REQUEST['vigencialicencia1']);
// $conductor2 = htmlspecialchars($_REQUEST['conductor2']);
// $cedulaconductor2 = htmlspecialchars($_REQUEST['cedulaconductor2']);
// $vigencialicencia2 = htmlspecialchars($_REQUEST['vigencialicencia2']);
// $conductor3 = htmlspecialchars($_REQUEST['conductor3']);
// $cedulaconductor3 = htmlspecialchars($_REQUEST['cedulaconductor3']);
// $vigencialicencia3 = htmlspecialchars($_REQUEST['vigencialicencia3']);
$cancelado = htmlspecialchars($_REQUEST['cancelado']);
$fechacancelado = htmlspecialchars($_REQUEST['fechacancelado']);

include '../../../control/conex.php';

$sql = "UPDATE tbextractosrt SET cancelado='$cancelado',fechacancelado='$fechacancelado' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		// 'extracto' => $extracto,
		// 'contrato' => $contrato,
		// 'origen' => $origen,
		// 'destino' => $destino,
		// 'objetocontrato' => $objetocontrato,
		// 'conductor1' => $conductor1,
		// 'cedulaconductor1' => $cedulaconductor1,
		// 'vigencialicencia1' => $vigencialicencia1,
		// 'conductor2' => $conductor2,
		// 'cedulaconductor2' => $cedulaconductor2,
		// 'vigencialicencia2' => $vigencialicencia2,
		// 'conductor3' => $conductor3,
		// 'cedulaconductor3' => $cedulaconductor3,
		// 'vigencialicencia3' => $vigencialicencia3,
		'cancelado' => $cancelado,
		'fechacancelado' => $fechacancelado
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>