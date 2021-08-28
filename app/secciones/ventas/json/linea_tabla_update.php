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

$id = $_REQUEST['id'];

include '../../../control/conex.php';

$sql = "UPDATE tbregistrosdetdig SET descripcion='$descripcion', destino='$destino', vehiculo='$vehiculo', unitario='$unitario',
		descto='$descto', dias='$dias', valor='$valor', observalinea='$observalinea', pasajeros='$pasajeros'		
		WHERE id='$id' ";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>