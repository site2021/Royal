<?php

$id = intval($_REQUEST['id']);
$dia = htmlspecialchars($_REQUEST['dia']);
$sopa = htmlspecialchars($_REQUEST['sopa']);
$principio = htmlspecialchars($_REQUEST['principio']);
$carne = htmlspecialchars($_REQUEST['carne']);
$jugo = htmlspecialchars($_REQUEST['jugo']);
$observacion = htmlspecialchars($_REQUEST['observacion']);
$aprobacion = htmlspecialchars($_REQUEST['aprobacion']);

include '../control/conex.php';

$sql = "UPDATE tbmenus SET dia='$dia',sopa='$sopa',principio='$principio',carne='$carne',
		jugo='$jugo',observacion='$observacion',aprobacion='$aprobacion' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
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