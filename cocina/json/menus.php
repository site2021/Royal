<?php

$dia = htmlspecialchars($_REQUEST['dia']);
$sopa = htmlspecialchars($_REQUEST['sopa']);
$principio = htmlspecialchars($_REQUEST['principio']);
$carne = htmlspecialchars($_REQUEST['carne']);
$jugo = htmlspecialchars($_REQUEST['jugo']);
$observacion = htmlspecialchars($_REQUEST['observacion']);
$aprobacion = htmlspecialchars($_REQUEST['aprobacion']);

include '../control/conex.php';

$sql = "INSERT INTO tbmenus(dia,sopa,principio,carne,jugo,observacion,aprobacion)
		VALUES('$dia','$sopa','$principio','$carne','$jugo','$observacion','$aprobacion')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'dia' => $dia,
		'sopa' => $sopa,
		'principio' => $principio,
		'carne' => $carne,
		'jugo' => $jugo,
		'observacion' => $observacion,
		'aprobacion' => $aprobacion

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>