<?php

$interno = htmlspecialchars($_REQUEST['interno']);
$conductor = htmlspecialchars($_REQUEST['conductor']);
$cedulaconductor = htmlspecialchars($_REQUEST['cedulaconductor']);
$sexo = htmlspecialchars($_REQUEST['sexo']);
$fechanacimiento = htmlspecialchars($_REQUEST['fechanacimiento']);
$edad = htmlspecialchars($_REQUEST['edad']);
$lugarnacimiento = htmlspecialchars($_REQUEST['lugarnacimiento']);
$estadocivil = htmlspecialchars($_REQUEST['estadocivil']);
$tiposangre = htmlspecialchars($_REQUEST['tiposangre']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$barrio = htmlspecialchars($_REQUEST['barrio']);
$municipio = htmlspecialchars($_REQUEST['municipio']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$celular = htmlspecialchars($_REQUEST['celular']);
$categorialicencia = htmlspecialchars($_REQUEST['categorialicencia']);
$vigencialicencia = htmlspecialchars($_REQUEST['vigencialicencia']);
$formacioneducativa = htmlspecialchars($_REQUEST['formacioneducativa']);
$profesion = htmlspecialchars($_REQUEST['profesion']);
$fechaingreso = htmlspecialchars($_REQUEST['fechaingreso']);
$fecharetiro = htmlspecialchars($_REQUEST['fecharetiro']);
$salarioletra = htmlspecialchars($_REQUEST['salarioletra']);
$salarionum = htmlspecialchars($_REQUEST['salarionum']);


include '../../../control/conex.php';

$sql = "INSERT INTO tbconductores(interno,conductor,cedulaconductor,sexo,fechanacimiento,edad,lugarnacimiento,estadocivil,tiposangre,direccion,barrio,municipio,telefono,celular,categorialicencia,vigencialicencia,formacioneducativa,profesion,fechaingreso,fecharetiro,salarioletra,salarionum)
		VALUES('$interno','$conductor','$cedulaconductor','$sexo','$fechanacimiento','$edad','$lugarnacimiento','$estadocivil','$tiposangre','$direccion','$barrio','$municipio','$telefono','$celular','$categorialicencia','$vigencialicencia','$formacioneducativa','$profesion','$fechaingreso','$fecharetiro','$salarioletra','$salarionum')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'interno' => $interno,
		'conductor' => $conductor,
		'cedulaconductor' => $cedulaconductor,
		'sexo' => $sexo,
		'fechanacimiento' => $fechanacimiento,
		'edad' => $edad,
		'lugarnacimiento' => $lugarnacimiento,
		'estadocivil' => $estadocivil,
		'tiposangre' => $tiposangre,
		'direccion' => $direccion,
		'barrio' => $barrio,
		'municipio' => $municipio,
		'telefono' => $telefono,
		'celular' => $celular,
		'categorialicencia' => $categorialicencia,
		'vigencialicencia' => $vigencialicencia,
		'formacioneducativa' => $formacioneducativa,
		'profesion' => $profesion,
		'fechaingreso' => $fechaingreso,
		'fecharetiro' => $fecharetiro,
		'salarioletra' => $salarioletra,
		'salarionum' => $salarionum
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>