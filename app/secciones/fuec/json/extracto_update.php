<?php

$id = intval($_REQUEST['id']);
// $extracto = htmlspecialchars($_REQUEST['extracto']);
// $contrato = htmlspecialchars($_REQUEST['contrato']);
// $placa = htmlspecialchars($_REQUEST['placa']);
// $modelo = htmlspecialchars($_REQUEST['modelo']);
// $marca = htmlspecialchars($_REQUEST['marca']);
// $clase = htmlspecialchars($_REQUEST['clase']);
// $interno = htmlspecialchars($_REQUEST['interno']);
// $tarjetaoperacion = htmlspecialchars($_REQUEST['tarjetaoperacion']);
// $cliente = htmlspecialchars($_REQUEST['cliente']);
// $nit = htmlspecialchars($_REQUEST['nit']);
// $responsable = htmlspecialchars($_REQUEST['responsable']);
// $cedularesponsable = htmlspecialchars($_REQUEST['cedularesponsable']);
// $direccion = htmlspecialchars($_REQUEST['direccion']);
// $telefono = htmlspecialchars($_REQUEST['telefono']);
// $modalidad = htmlspecialchars($_REQUEST['modalidad']);
// $empresaafiliadora = htmlspecialchars($_REQUEST['empresaafiliadora']);
// $fechainicio = htmlspecialchars($_REQUEST['fechainicio']);
// $fechafin = htmlspecialchars($_REQUEST['fechafin']);
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

$sql = "UPDATE tbextractos SET cancelado='$cancelado',fechacancelado='$fechacancelado' WHERE id=$id";

// $sql = "UPDATE tbextractos SET extracto='$extracto',contrato='$contrato',placa='$placa',modelo='$modelo',marca='$marca',clase='$clase',interno='$interno',tarjetaoperacion='$tarjetaoperacion',cliente='$cliente',nit='$nit',responsable='$responsable',cedularesponsable='$cedularesponsable',direccion='$direccion',telefono='$telefono',modalidad='$modalidad',empresaafiliadora='$empresaafiliadora',fechainicio='$fechainicio',fechafin='$fechafin',origen='$origen',destino='$destino',recorrido='$recorrido',objetocontrato='$objetocontrato',conductor1='$conductor1',cedulaconductor1='$cedulaconductor1',vigencialicencia1='$vigencialicencia1',conductor2='$conductor2',cedulaconductor2='$cedulaconductor2',vigencialicencia2='$vigencialicencia2',conductor3='$conductor3',cedulaconductor3='$cedulaconductor3',vigencialicencia3='$vigencialicencia3' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		// 'placa' => $placa,
		// 'modelo' => $modelo,
		// 'marca' => $marca,
		// 'clase' => $clase,
		// 'interno' => $interno,
		// 'tarjetaoperacion' => $tarjetaoperacion,
		// 'cliente' => $cliente,
		// 'nit' => $nit,
		// 'responsable' => $responsable,
		// 'cedularesponsable' => $cedularesponsable,
		// 'direccion' => $direccion,
		// 'telefono' => $telefono,
		// 'modalidad' => $modalidad,
		// 'empresaafiliadora' => $empresaafiliadora,
		// 'fechainicio' => $fechainicio,
		// 'fechafin' => $fechafin,
		// 'origen' => $origen,
		// 'destino' => $destino,
		// 'recorrido' => $recorrido,
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
		'fechacancelado' => $fechacancelado,
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>