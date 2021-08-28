
<?php

include '../../../control/conex.php';

$usuario = $_REQUEST['usuario'];

$rs = mysqli_query($conexion, "SELECT descto FROM tbusuarios WHERE usuario='$usuario' ");

$row = mysqli_fetch_row($rs);

$descto = $row[0];

echo json_encode(array('success'=>true,'udescto'=>$descto));

?>