<?php

$id = intval($_REQUEST['id']);
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
$salarioletra = htmlspecialchars($_REQUEST['salarioletra']);
$salarionum = htmlspecialchars($_REQUEST['salarionum']);
$estadoconductor = htmlspecialchars($_REQUEST['estadoconductor']);
$tipoconductor = htmlspecialchars($_REQUEST['tipoconductor']);
$pasadojudicial = htmlspecialchars($_REQUEST['pasadojudicial']);
$simit = htmlspecialchars($_REQUEST['simit']);
$runt = htmlspecialchars($_REQUEST['runt']);
$contrato = htmlspecialchars($_REQUEST['contrato']);
$examenruta = htmlspecialchars($_REQUEST['examenruta']);
$psicosensometrico = htmlspecialchars($_REQUEST['psicosensometrico']);
$hojavida = htmlspecialchars($_REQUEST['hojavida']);
$induccion = htmlspecialchars($_REQUEST['induccion']);
$ocupacionalingreso = htmlspecialchars($_REQUEST['ocupacionalingreso']);
$ocupacionalretiro = htmlspecialchars($_REQUEST['ocupacionalretiro']);
$eps = htmlspecialchars($_REQUEST['eps']);
$fondopension = htmlspecialchars($_REQUEST['fondopension']);
$cesantias = htmlspecialchars($_REQUEST['cesantias']);

include '../../../control/conex.php';

$sql = "UPDATE tbcolaboradoresrt SET interno='$interno',conductor='$conductor',cedulaconductor='$cedulaconductor',sexo='$sexo',fechanacimiento='$fechanacimiento',edad='$edad',lugarnacimiento='$lugarnacimiento',estadocivil='$estadocivil',tiposangre='$tiposangre',direccion='$direccion',barrio='$barrio',municipio='$municipio',telefono='$telefono',celular='$celular',categorialicencia='$categorialicencia',vigencialicencia='$vigencialicencia',formacioneducativa='$formacioneducativa',profesion='$profesion',salarioletra='$salarioletra',salarionum='$salarionum',estadoconductor='$estadoconductor',tipoconductor='$tipoconductor',pasadojudicial='$pasadojudicial',simit='$simit',runt='$runt',contrato='$contrato',examenruta='$examenruta',psicosensometrico='$psicosensometrico',hojavida='$hojavida',induccion='$induccion',ocupacionalingreso='$ocupacionalingreso',ocupacionalretiro='$ocupacionalretiro',eps='$eps',fondopension='$fondopension',cesantias='$cesantias' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
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
		'salarioletra' => $salarioletra,
		'salarionum' => $salarionum,
		'estadoconductor' => $estadoconductor,
		'tipoconductor' => $tipoconductor,
		'pasadojudicial' => $pasadojudicial,
		'simit' => $simit,
		'runt' => $runt,
		'contrato' => $contrato,
		'examenruta' => $examenruta,
		'psicosensometrico' => $psicosensometrico,
		'hojavida' => $hojavida,
		'induccion' => $induccion,
		'ocupacionalingreso' => $ocupacionalingreso,
		'ocupacionalretiro' => $ocupacionalretiro,
		'eps' => $eps,
		'fondopension' => $fondopension,
		'cesantias' => $cesantias
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>