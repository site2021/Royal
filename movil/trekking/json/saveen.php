<?php

$codigoencuesta = htmlspecialchars($_REQUEST['codigoencuesta']);
$fechaencuesta = htmlspecialchars($_REQUEST['fechaencuesta']);
$nombreencuesta = htmlspecialchars($_REQUEST['nombreencuesta']);
$celular = htmlspecialchars($_REQUEST['celular']);
$tos = htmlspecialchars($_REQUEST['tos']);
$malestar = htmlspecialchars($_REQUEST['malestar']);
$difrespirar = htmlspecialchars($_REQUEST['difrespirar']);
$diarrea = htmlspecialchars($_REQUEST['diarrea']);
$olfatogusto = htmlspecialchars($_REQUEST['olfatogusto']);
$fuerapais = htmlspecialchars($_REQUEST['fuerapais']);
$contactosospechoso = htmlspecialchars($_REQUEST['contactosospechoso']);
$cuarentena = htmlspecialchars($_REQUEST['cuarentena']);
$personacuarentena = htmlspecialchars($_REQUEST['personacuarentena']);
$compromiso = htmlspecialchars($_REQUEST['compromiso']);

include 'conex.php';

$sql = "INSERT INTO tbtrekkingcovid (codigoencuesta,fechaencuesta,nombreencuesta,celular,tos,malestar,difrespirar,diarrea,olfatogusto,fuerapais,contactosospechoso,cuarentena,personacuarentena,compromiso) 
		VALUES ('$codigoencuesta','$fechaencuesta','$nombreencuesta','$celular','$tos','$malestar','$difrespirar','$diarrea','$olfatogusto','$fuerapais','$contactosospechoso','$cuarentena','$personacuarentena','$compromiso')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>