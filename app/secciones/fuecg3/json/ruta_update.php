<?php

$id = intval($_REQUEST['id']);
$nombreruta = htmlspecialchars($_REQUEST['nombreruta']);
$origen = htmlspecialchars($_REQUEST['origen']);
$destino = htmlspecialchars($_REQUEST['destino']);
$recorrido = htmlspecialchars($_REQUEST['recorrido']);

include '../../../control/conex.php';

$sql = "UPDATE tbrutasextractos SET nombreruta='$nombreruta',origen='$origen',destino='$destino',recorrido='$recorrido' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'nombreruta' => $nombreruta,
		'origen' => $origen,
		'destino' => $destino,
		'recorrido' => $recorrido,
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>