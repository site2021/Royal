<?php

// borrar detalle de guia anterior - insertar nuevas lineas modificadas

include 'conex.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM tbpasajeros WHERE id='$id' ";

$result = @mysqli_query($conexion, $sql);

echo json_encode(array('success'=>true));

?>