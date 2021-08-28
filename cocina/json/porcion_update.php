<?php

$id = intval($_REQUEST['id']);
$edad = htmlspecialchars($_REQUEST['edad']);
$alimento = htmlspecialchars($_REQUEST['alimento']);
$pbruto = htmlspecialchars($_REQUEST['pbruto']);
$pneto = htmlspecialchars($_REQUEST['pneto']);
$udcasera = htmlspecialchars($_REQUEST['udcasera']);

include '../control/conex.php';

$sql = "UPDATE tbporciones SET edad='$edad',alimento='$alimento',pbruto='$pbruto',pneto='$pneto',
		udcasera='$udcasera' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
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