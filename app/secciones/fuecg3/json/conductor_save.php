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
$clase = htmlspecialchars($_REQUEST['clase']);
$experiencia = htmlspecialchars($_REQUEST['experiencia']);
$foto = htmlspecialchars($_REQUEST['foto']);
$seccion = htmlspecialchars($_REQUEST['seccion']);
$tipocontrato = htmlspecialchars($_REQUEST['tipocontrato']);
$cargo = htmlspecialchars($_REQUEST['cargo']);


include '../../../control/conex.php';

$sql = "INSERT INTO tbconductoresrt(interno,conductor,cedulaconductor,sexo,fechanacimiento,edad,lugarnacimiento,estadocivil,tiposangre,direccion,barrio,municipio,telefono,celular,categorialicencia,vigencialicencia,formacioneducativa,profesion,fechaingreso,fecharetiro,salarioletra,salarionum,estadoconductor,tipoconductor,pasadojudicial,simit,runt,contrato,examenruta,psicosensometrico,hojavida,induccion,ocupacionalingreso,ocupacionalretiro,eps,fondopension,cesantias,clase,experiencia,foto,seccion,tipocontrato,cargo)
		VALUES('$interno','$conductor','$cedulaconductor','$sexo','$fechanacimiento','$edad','$lugarnacimiento','$estadocivil','$tiposangre','$direccion','$barrio','$municipio','$telefono','$celular','$categorialicencia','$vigencialicencia','$formacioneducativa','$profesion','$fechaingreso','$fecharetiro','$salarioletra','$salarionum','$estadoconductor','$tipoconductor','$pasadojudicial','$simit','$runt','$contrato','$examenruta','$psicosensometrico','$hojavida','$induccion','$ocupacionalingreso','$ocupacionalretiro','$eps','$fondopension','$cesantias','$clase','$experiencia','$foto','$seccion','$tipocontrato','$cargo')";

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
		'cesantias' => $cesantias,
		'clase' => $clase,
		'experiencia' => $experiencia,
		'foto' => $foto,
		'seccion' => $seccion,
		'tipocontrato' => $tipocontrato,
		'cargo' => $cargo
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>