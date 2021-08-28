
<?php

$nit = $_REQUEST['nit'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT COUNT(nit) FROM tbclientes WHERE nit='$nit' ");

$row = mysqli_fetch_row($rs);

$cuantos = $row[0];

echo json_encode(array('success'=>true,'cuantos'=>$cuantos));

?>