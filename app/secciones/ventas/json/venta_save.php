<?php

$numero = $_REQUEST['vnumero'];
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

$sql = "INSERT INTO tbdatosventas(numero, ninterno, finicio, ffin, fpago, valor, forma, conductor, comision, utilidad, empresa, cmbempresas)
		VALUES('$numero', '$ninterno', '$finicio', '$ffin', '$fpago', '$valor', '$forma', '$conductor', '$comision', '$utilidad',
		'$vempresa', '$cmbempresas')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'numero' => $numero,


	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>