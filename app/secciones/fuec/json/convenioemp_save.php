<?php

$interno = htmlspecialchars($_REQUEST['interno']);
$placa = htmlspecialchars($_REQUEST['placa']);
$clase = htmlspecialchars($_REQUEST['clase']);
$enconvenio = htmlspecialchars($_REQUEST['enconvenio']);
$inicioconvenio = htmlspecialchars($_REQUEST['inicioconvenio']);
$finconvenio = htmlspecialchars($_REQUEST['finconvenio']);
$origenconvenio = htmlspecialchars($_REQUEST['origenconvenio']);
$destinoconvenio = htmlspecialchars($_REQUEST['destinoconvenio']);

include '../../../control/conex.php';

$sql = "INSERT INTO tbconveniosempre(interno,placa,clase,enconvenio,inicioconvenio,finconvenio,origenconvenio,destinoconvenio) 
		VALUES ('$interno','$placa','$clase','$enconvenio','$inicioconvenio','$finconvenio','$origenconvenio','$destinoconvenio')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>