<?php

$nombreruta = htmlspecialchars($_REQUEST['nombreruta']);
$origen = htmlspecialchars($_REQUEST['origen']);
$destino = htmlspecialchars($_REQUEST['destino']);
$recorrido = htmlspecialchars($_REQUEST['recorrido']);

include '../../../control/conex.php';

$sql = "INSERT INTO tbrutasextractos(nombreruta,origen,destino,recorrido)
		VALUES('$nombreruta','$origen','$destino','$recorrido')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'nombreruta' => $nombreruta,
		'origen' => $origen,
		'destino' => $destino,
		'recorrido' => $recorrido
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>