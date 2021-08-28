<?php

$contrato = $_REQUEST['contrato'];
$contratoimg = htmlspecialchars($_REQUEST['contratoimg']);
$nombreimg = htmlspecialchars($_REQUEST['nombreimg']);
$fechasubimg = htmlspecialchars($_REQUEST['fechasubimg']);
$usuariosubimg = htmlspecialchars($_REQUEST['usuariosubimg']);

$revisarimg = $_FILES["contratoimg"]["tmp_name"];
if($revisarimg){
    $contratoimg = $_FILES['contratoimg']['tmp_name'];
    $tipocontrato = $_FILES['contratoimg']['type'];
    $imgContrato = addslashes(file_get_contents($contratoimg));

 }

include '../../../control/conex.php';

$sql = "INSERT INTO tbcontratosimgrt(contrato,contratoimg,tipocontrato,nombreimg,fechasubimg,usuariosubimg) VALUES('$contrato','$imgContrato','$tipocontrato','$nombreimg','$fechasubimg','$usuariosubimg')";


$result = @mysqli_query($conexion, $sql);


if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'contrato' => $contrato,

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>