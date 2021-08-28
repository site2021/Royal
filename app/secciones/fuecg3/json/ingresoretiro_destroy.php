<?php

// borrar detalle de guia anterior - insertar nuevas lineas modificadas

include '../../../control/conex.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM tbingresoretiro WHERE id='$id' ";

$result = @mysqli_query($conexion, $sql);

echo json_encode(array('success'=>true));

?>