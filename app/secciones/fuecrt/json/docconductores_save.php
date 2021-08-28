<?php

$cedulaconductor = $_REQUEST['cedulaconductor'];
$documentoimg = htmlspecialchars($_REQUEST['documentoimg']);
$nombredocumento = htmlspecialchars($_REQUEST['nombredocumento']);

$revisarimg = $_FILES["documentoimg"]["tmp_name"];
if($revisarimg){
    $documentoimg = $_FILES['documentoimg']['tmp_name'];
    $tipodocumento = $_FILES['documentoimg']['type'];
    $imgDocumento = addslashes(file_get_contents($documentoimg));

 }

include '../../../control/conex.php';

$sql = "INSERT INTO tbconductoresimgrt(cedulaconductor,nombredocumento,documentoimg,tipodocumento) VALUES('$cedulaconductor','$nombredocumento','$imgDocumento','$tipodocumento')";


$result = @mysqli_query($conexion, $sql);


if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'cedulaconductor' => $cedulaconductor,

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>