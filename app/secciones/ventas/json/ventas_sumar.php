
<?php

$numero = $_REQUEST['numero'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT SUM(conductor) FROM tbdatosventas WHERE numero='$numero' ");

$row = mysqli_fetch_row($rs);

$tconductor = $row[0];

echo json_encode(array('success'=>true,'tconductor'=>$tconductor));

?>