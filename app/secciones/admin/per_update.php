<?php

$id = intval($_REQUEST['id']);
$perfil = htmlspecialchars($_REQUEST['perfil']);
$orden = htmlspecialchars($_REQUEST['orden']);
$opcion = htmlspecialchars($_REQUEST['opcion']);
$etiqueta = htmlspecialchars($_REQUEST['etiqueta']);
$nivel = htmlspecialchars($_REQUEST['nivel']);
$accion = htmlspecialchars($_REQUEST['accion']);
$onclick = htmlspecialchars($_REQUEST['onclick']);
$icono = htmlspecialchars($_REQUEST['icono']);

include '../../control/conex.php';

$sql = "UPDATE txmenu SET perfil='$perfil', orden='$orden', opcion='$opcion', etiqueta='$etiqueta',
		nivel='$nivel', accion='$accion', onclick='$onclick', icono='$icono' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'perfil' => $perfil,
		'orden' => $orden,
		'opcion' => $opcion,
		'etiqueta' => $etiqueta,
		'nivel' => $nivel,
		'accion' => $accion,
		'onclick' => $onclick,
		'icono' => $icono
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>