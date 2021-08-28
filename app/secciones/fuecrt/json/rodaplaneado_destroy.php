<?php

include '../../../control/conex.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM tbrodaplaneadort WHERE id='$id' ";

$result = @mysqli_query($conexion, $sql);

echo json_encode(array('success'=>true));

?>