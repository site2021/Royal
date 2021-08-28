
<?php

include 'conex.php';

$rs = mysqli_query($conexion, "SELECT MAX(convert(consecutivo,unsigned))+1 maximo FROM tbmantenimientos ");

$row = mysqli_fetch_row($rs);

$maximo = $row[0];

echo json_encode(array('success'=>true,'rmaximo'=>$maximo));

?>