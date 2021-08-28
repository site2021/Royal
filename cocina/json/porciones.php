<?php

$edad = htmlspecialchars($_REQUEST['edad']);
$alimento = htmlspecialchars($_REQUEST['alimento']);
$pbruto = htmlspecialchars($_REQUEST['pbruto']);
$pneto = htmlspecialchars($_REQUEST['pneto']);
$udcasera = htmlspecialchars($_REQUEST['udcasera']);

include '../control/conex.php';

$sql = "INSERT INTO tbporciones(edad,alimento,pbruto,pneto,udcasera)
		VALUES('$edad','$alimento','$pbruto','$pneto','$udcasera')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'edad' => $edad,
		'alimento' => $alimento,
		'pbruto' => $pbruto,
		'pneto' => $pneto,
		'udcasera' => $udcasera

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>