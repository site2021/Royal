
<?php

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT MAX(numero) FROM tbregistros ");

$row = mysqli_fetch_row($rs);

$maximo = $row[0];

echo json_encode(array('success'=>true,'rmaximo'=>$maximo));

?>