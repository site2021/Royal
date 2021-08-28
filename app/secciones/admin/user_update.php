<?php

$id = intval($_REQUEST['id']);
$usuario = htmlspecialchars($_REQUEST['usuario']);
$nombre = htmlspecialchars($_REQUEST['nombre']);
$clave = htmlspecialchars($_REQUEST['clave']);
$perfil = htmlspecialchars($_REQUEST['perfil']);
$ejecutivo = htmlspecialchars($_REQUEST['ejecutivo']);
$estado = htmlspecialchars($_REQUEST['estado']);
$costos = htmlspecialchars($_REQUEST['costos']);
$descto = htmlspecialchars($_REQUEST['descto']);
$celular = htmlspecialchars($_REQUEST['celular']);

include '../../control/conex.php';

$sql = "UPDATE tbusuarios SET usuario='$usuario',nombre='$nombre',clave='$clave',perfil='$perfil',
		ejecutivo='$ejecutivo', estado='$estado', costos='$costos', descto='$descto', celular='$celular' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'usuario' => $usuario,
		'nombre' => $nombre,
		'clave' => $clave,
		'perfil' => $perfil,
		'ejecutivo' => $ejecutivo,
		'estado' => $estado,
		'costos' => $costos,
		'descto' => $descto
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>