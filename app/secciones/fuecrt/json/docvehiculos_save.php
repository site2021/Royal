<?php

$placa = $_REQUEST['placa'];
$interno = htmlspecialchars($_REQUEST['interno']);
$documentoimg = htmlspecialchars($_REQUEST['documentoimg']);
$nombredocumento = htmlspecialchars($_REQUEST['nombredocumento']);

$revisarimg = $_FILES["documentoimg"]["tmp_name"];
if($revisarimg){
    $documentoimg = $_FILES['documentoimg']['tmp_name'];
    $tipodocumento = $_FILES['documentoimg']['type'];
    $imgDocumento = addslashes(file_get_contents($documentoimg));

 }

include '../../../control/conex.php';

$sql = "INSERT INTO tbvehiculosimgrt(interno,placa,nombredocumento,documentoimg,tipodocumento) VALUES('$interno','$placa','$nombredocumento','$imgDocumento','$tipodocumento')";


$result = @mysqli_query($conexion, $sql);


if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'placa' => $placa,

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>