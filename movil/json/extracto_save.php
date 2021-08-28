<?php

$extracto = htmlspecialchars($_REQUEST['extracto']);
$contrato = htmlspecialchars($_REQUEST['contrato']);
$placa = htmlspecialchars($_REQUEST['placa']);
$modelo = htmlspecialchars($_REQUEST['modelo']);
$marca = htmlspecialchars($_REQUEST['marca']);
$clase = htmlspecialchars($_REQUEST['clase']);
$interno = htmlspecialchars($_REQUEST['interno']);
$tarjetaoperacion = htmlspecialchars($_REQUEST['tarjetaoperacion']);
$cliente = htmlspecialchars($_REQUEST['cliente']);
$nit = htmlspecialchars($_REQUEST['nit']);
$responsable = htmlspecialchars($_REQUEST['responsable']);
$cedularesponsable = htmlspecialchars($_REQUEST['cedularesponsable']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$modalidad = htmlspecialchars($_REQUEST['modalidad']);
$empresaafiliadora = htmlspecialchars($_REQUEST['empresaafiliadora']);
$fechainicio = htmlspecialchars($_REQUEST['fechainicio']);
$fechafin = htmlspecialchars($_REQUEST['fechafin']);
$origen = htmlspecialchars($_REQUEST['origen']);
$destino = htmlspecialchars($_REQUEST['destino']);
// $recorrido = htmlspecialchars($_REQUEST['recorrido']);
$objetocontrato = htmlspecialchars($_REQUEST['objetocontrato']);
$conductor1 = htmlspecialchars($_REQUEST['conductor1']);
$cedulaconductor1 = htmlspecialchars($_REQUEST['cedulaconductor1']);
$vigencialicencia1 = htmlspecialchars($_REQUEST['vigencialicencia1']);
$usuario = htmlspecialchars($_REQUEST['usuario']);

include 'conex.php';

$sql = "INSERT INTO tbextractos(extracto,contrato,placa,modelo,marca,clase,interno,tarjetaoperacion,cliente,nit,responsable,cedularesponsable,direccion,telefono,modalidad,empresaafiliadora,fechainicio,fechafin,origen,destino,objetocontrato,conductor1,cedulaconductor1,vigencialicencia1,usuario)
		VALUES('$extracto','$contrato','$placa','$modelo','$marca','$clase','$interno','$tarjetaoperacion','$cliente','$nit','$responsable','$cedularesponsable','$direccion','$telefono','$modalidad','$empresaafiliadora','$fechainicio','$fechafin','$origen','$destino','$objetocontrato','$conductor1','$cedulaconductor1','$vigencialicencia1','$usuario')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'extracto' => $extracto,
		'contrato' => $contrato,
		'placa' => $placa,
		'modelo' => $modelo,
		'marca' => $marca,
		'clase' => $clase,
		'interno' => $interno,
		'tarjetaoperacion' => $tarjetaoperacion,
		'cliente' => $cliente,
		'nit' => $nit,
		'responsable' => $responsable,
		'cedularesponsable' => $cedularesponsable,
		'direccion' => $direccion,
		'telefono' => $telefono,
		'modalidad' => $modalidad,
		'empresaafiliadora' => $empresaafiliadora,
		'fechainicio' => $fechainicio,
		'fechafin' => $fechafin,
		'origen' => $origen,
		'destino' => $destino,
		'objetocontrato' => $objetocontrato,
		'conductor1' => $conductor1,
		'cedulaconductor1' => $cedulaconductor1,
		'usuario' => $usuario
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>