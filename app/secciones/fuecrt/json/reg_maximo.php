
<?php

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT MAX(contrato) FROM tbcontratosrt ");

$row = mysqli_fetch_row($rs);

$maximo = $row[0];

echo json_encode(array('success'=>true,'rmaximo'=>$maximo));

?>