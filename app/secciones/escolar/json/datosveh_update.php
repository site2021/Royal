<?php
$id = intval($_REQUEST['id']);
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

$sql = "UPDATE tbdatosveh SET colegio='$colegio',ruta='$ruta',interno='$interno',nombreconductor='$nombreconductor', celular='$celular', nombreauxiliar='$nombreauxiliar', celularauxiliar='$celularauxiliar', placa='$placa', fechaentrega='$fechaentrega', sector='$sector', capacidad='$capacidad' WHERE id=$id";


$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>


	
