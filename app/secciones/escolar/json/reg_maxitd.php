<?php

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT MAX(codigo) FROM tblistaregistro WHERE colegio='ITD'");

$row = mysqli_fetch_row($rs);

$maximo2 = $row[0];

echo json_encode(array('success'=>true,'rmaximo2'=>$maximo2));

?>