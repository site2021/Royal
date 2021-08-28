<?php

$id = intval($_REQUEST['id']);
// $salida = htmlspecialchars($_REQUEST['salida']);
$horasalida = htmlspecialchars($_REQUEST['horasalida']);
$hoy = htmlspecialchars($_REQUEST['hoy']);

include 'conex.php';

$sql = "UPDATE tbreencuestacovid SET salida='SAL' WHERE fechaencuesta = '2020-09-03 09:01:55'";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));

}
function hoy(){
	var xhoy = new Date();
	var y = xhoy.getFullYear();
	var m = xhoy.getMonth()+1;
	var d = xhoy.getDate();
	return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
}
?>