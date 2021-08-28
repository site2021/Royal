<?php

$usuario = $_REQUEST['usuario'];

$descripcion = $_REQUEST['descripcion'];
$destino = $_REQUEST['destino'];
$vehiculo = $_REQUEST['vehiculo'];
$unitario = $_REQUEST['unitario'];
$descto = $_REQUEST['descto'];
$dias = $_REQUEST['dias'];
$valor = $_REQUEST['valor'];
$observalinea = $_REQUEST['observalinea'];
$pasajeros = $_REQUEST['pasajeros'];

include '../../../control/conex.php';

$sql = "INSERT INTO tbregistrosdetdig (descripcion,destino,vehiculo,unitario,descto,dias,valor,observalinea,pasajeros,usuario) 
		VALUES 
		('$descripcion','$destino','$vehiculo','$unitario','$descto','$dias','$valor','$observalinea','$pasajeros','$usuario') ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>