
<?php

include 'conex.php';

$colegio = 'NULL';

$rs = mysqli_query($conexion, "SELECT COUNT(*) FROM tbpinoverdecovid WHERE ingreso='ING' AND salida='0'");

$row = mysqli_fetch_row($rs);

$maximo = $row[0];

echo json_encode(array('success'=>true,'rmaximo'=>$maximo));

?>