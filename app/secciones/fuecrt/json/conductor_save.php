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
$clase = htmlspecialchars($_REQUEST['clase']);;
$seccion = htmlspecialchars($_REQUEST['seccion']);
$tipocontrato = htmlspecialchars($_REQUEST['tipocontrato']);
$cargo = htmlspecialchars($_REQUEST['cargo']);


include '../../../control/conex.php';

$sql = "INSERT INTO tbconductoresrt(interno,conductor,cedulaconductor,sexo,fechanacimiento,edad,lugarnacimiento,estadocivil,tiposangre,direccion,barrio,municipio,telefono,celular,categorialicencia,vigencialicencia,formacioneducativa,profesion,salarioletra,salarionum,estadoconductor,tipoconductor,pasadojudicial,simit,runt,contrato,examenruta,psicosensometrico,hojavida,induccion,ocupacionalingreso,ocupacionalretiro,eps,fondopension,cesantias,clase,seccion,tipocontrato,cargo)
		VALUES('$interno','$conductor','$cedulaconductor','$sexo','$fechanacimiento','$edad','$lugarnacimiento','$estadocivil','$tiposangre','$direccion','$barrio','$municipio','$telefono','$celular','$categorialicencia','$vigencialicencia','$formacioneducativa','$profesion','$salarioletra','$salarionum','$estadoconductor','$tipoconductor','$pasadojudicial','$simit','$runt','$contrato','$examenruta','$psicosensometrico','$hojavida','$induccion','$ocupacionalingreso','$ocupacionalretiro','$eps','$fondopension','$cesantias','$clase','$seccion','$tipocontrato','$cargo')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>