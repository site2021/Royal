<?php

$empresa = htmlspecialchars($_REQUEST['empresa']);
$sigla = htmlspecialchars($_REQUEST['sigla']);
$tipoempresa = htmlspecialchars($_REQUEST['tipoempresa']);
$documentoempresa = htmlspecialchars($_REQUEST['documentoempresa']);
$departamento = htmlspecialchars($_REQUEST['departamento']);
$ciudad = htmlspecialchars($_REQUEST['ciudad']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$correo = htmlspecialchars($_REQUEST['correo']);
$reprlegal = htmlspecialchars($_REQUEST['reprlegal']);
$tiporepr = htmlspecialchars($_REQUEST['tiporepr']);
$documentorepr = htmlspecialchars($_REQUEST['documentorepr']);
$cooperacion = htmlspecialchars($_REQUEST['cooperacion']);
$iniciovigencia = htmlspecialchars($_REQUEST['iniciovigencia']);
$finvigencia = htmlspecialchars($_REQUEST['finvigencia']);

include '../../../control/conex.php';

$sql = "INSERT INTO  tbcolaboracionemprt(empresa,sigla,tipoempresa,documentoempresa,departamento,ciudad,direccion,telefono,correo,reprlegal,tiporepr,documentorepr,cooperacion,iniciovigencia,finvigencia)
		VALUES('$empresa','$sigla','$tipoempresa','$documentoempresa','$departamento','$ciudad','$direccion','$telefono','$correo','$reprlegal','$tiporepr','$documentorepr','$cooperacion','$iniciovigencia','$finvigencia')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'empresa' => $empresa,
		'sigla' => $sigla,
		'tipoempresa' => $tipoempresa,
		'documentoempresa' => $documentoempresa,
		'departamento' => $departamento,
		'ciudad' => $ciudad,
		'direccion' => $direccion,
		'telefono' => $telefono,
		'correo' => $correo,
		'reprlegal' => $reprlegal,
		'tiporepr' => $tiporepr,
		'documentorepr' => $documentorepr,
		'cooperacion' => $cooperacion,
		'iniciovigencia' => $iniciovigencia,
		'finvigencia' => $finvigencia
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>