<?php

$id = intval($_REQUEST['id']);
$ninterno = $_REQUEST['ninterno'];
$finicio = $_REQUEST['finicio'];
$ffin = $_REQUEST['ffin'];
$fpago = $_REQUEST['fpago'];
$valor = $_REQUEST['valor'];
$forma = $_REQUEST['forma'];
$conductor = $_REQUEST['conductor'];
$comision = $_REQUEST['comision'];
$utilidad = $_REQUEST['utilidad'];

$cmbempresas = $_REQUEST['cmbempresas'];
$vempresa = $_REQUEST['vempresa'];

include '../../../control/conex.php';

$sql = "UPDATE tbdatosventas SET ninterno='$ninterno', finicio='$finicio', ffin='$ffin', fpago='$fpago', valor='$valor', 
		forma='$forma', conductor='$conductor', comision='$comision', utilidad='$utilidad', empresa='$vempresa',
		cmbempresas='$cmbempresas' WHERE id=$id";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => $id,
		'ninterno' => $ninterno
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>