<?php

// borrar detalle de guia anterior - insertar nuevas lineas modificadas

include '../../../control/conex.php';

$usuario = $_REQUEST['usuario'];

$sql = "DELETE FROM tbregistrosdetdig WHERE usuario='$usuario' ";

$result = @mysqli_query($conexion, $sql);

echo json_encode(array('success'=>true));

?>