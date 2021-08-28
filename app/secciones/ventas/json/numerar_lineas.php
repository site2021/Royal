<?php

include '../../../control/conex.php';

$usuario = $_REQUEST['usuario'];

$rs = mysqli_query($conexion, "SELECT * FROM tbregistrosdetdig WHERE usuario='$usuario' ORDER BY id ");

$xlinea = 1;
while($row = mysqli_fetch_object($rs)){
	$id = $row->id;

	$wsql = "UPDATE tbregistrosdetdig SET linea='$xlinea' WHERE id='$id' ";

	$result = @mysqli_query($conexion, $wsql);

	if ($result){
		$xlinea = $xlinea + 1;
	}else{
		echo json_encode(array('errorMsg'=>'Some errors occured.'));		
	}
	
}
	
echo json_encode(array('success'=>true));

?>