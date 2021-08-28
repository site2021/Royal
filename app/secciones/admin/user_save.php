<?php

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

$sql = "INSERT INTO tbusuarios(usuario,nombre,clave,perfil,ejecutivo,estado,costos,descto,celular)
		VALUES('$usuario','$nombre','$clave','$perfil','$ejecutivo','$estado','$costos','$descto','$celular')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
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