<?php

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

$sql = "INSERT INTO tbcontradigitalrt(objetocontrato,iniciocontrato,fincontrato,cliente,nit,ciudadcliente,responsable,cedularesponsable,direccion,telefono,ciudadsalida,recorrido,internoveh,placaveh,claseveh,valorservicio,formapago,fechafirma)
		VALUES('$objetocontrato','$iniciocontrato','$fincontrato','$cliente','$nit','$ciudadcliente','$responsable','$cedularesponsable','$direccion','$telefono','$ciudadsalida','$recorrido','$internoveh','$placaveh','$claseveh','$valorservicio','$formapago','$fechafirma')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>