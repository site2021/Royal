<?php

$colegio = htmlspecialchars($_REQUEST['colegio']);
$ruta = htmlspecialchars($_REQUEST['ruta']);
$interno = htmlspecialchars($_REQUEST['interno']);
$nombreconductor = htmlspecialchars($_REQUEST['nombreconductor']);
$celular = htmlspecialchars($_REQUEST['celular']);
$nombreauxiliar = htmlspecialchars($_REQUEST['nombreauxiliar']);
$celularauxiliar = htmlspecialchars($_REQUEST['celularauxiliar']);
$placa = htmlspecialchars($_REQUEST['placa']);
$fechaentrega = htmlspecialchars($_REQUEST['fechaentrega']);
$sector = htmlspecialchars($_REQUEST['sector']);
$capacidad = htmlspecialchars($_REQUEST['capacidad']);

include '../../../control/conex.php';

$sql = "INSERT INTO tbdatosveh(colegio,ruta,interno,nombreconductor,celular,nombreauxiliar,celularauxiliar,placa,fechaentrega,sector,capacidad)
		VALUES('$colegio','$ruta','$interno','$nombreconductor','$celular','$nombreauxiliar','$celularauxiliar','$placa','$fechaentrega','$sector','$capacidad')";


$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>