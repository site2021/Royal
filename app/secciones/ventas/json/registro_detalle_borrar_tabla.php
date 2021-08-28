<?php

// borrar detalle de guia anterior - insertar nuevas lineas modificadas

include '../../../control/conex.php';

$numero = $_REQUEST['numero'];

$sql = "DELETE FROM tbregistrosdetalles WHERE numero='$numero' ";

$result = @mysqli_query($conexion, $sql);

echo json_encode(array('success'=>true));

?>