<?php

$colegio = htmlspecialchars($_REQUEST['colegio']);
$fecha = htmlspecialchars($_REQUEST['fecha']);
$codigo = htmlspecialchars($_REQUEST['codigo']);
$estado = htmlspecialchars($_REQUEST['estado']);
$grado = htmlspecialchars($_REQUEST['grado']);
$nombre = htmlspecialchars($_REQUEST['nombre']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$barrio = htmlspecialchars($_REQUEST['barrio']);
$comuna = htmlspecialchars($_REQUEST['comuna']);
$ciudad = htmlspecialchars($_REQUEST['ciudad']);
$direccion2 = htmlspecialchars($_REQUEST['direccion2']);
$barrio2 = htmlspecialchars($_REQUEST['barrio2']);
$comuna2 = htmlspecialchars($_REQUEST['comuna2']);
$ciudad2 = htmlspecialchars($_REQUEST['ciudad2']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$celular1 = htmlspecialchars($_REQUEST['celular1']);
$celular2 = htmlspecialchars($_REQUEST['celular2']);
$nombreacudiente = htmlspecialchars($_REQUEST['nombreacudiente']);
$cedula = htmlspecialchars($_REQUEST['cedula']);
$email = htmlspecialchars($_REQUEST['email']);
$observaciones = htmlspecialchars($_REQUEST['observaciones']);
$recorrido = htmlspecialchars($_REQUEST['recorrido']);
$tarifav = htmlspecialchars($_REQUEST['tarifav']);
$tarifabl = htmlspecialchars($_REQUEST['tarifabl']);
$tarifaaso = htmlspecialchars($_REQUEST['tarifaaso']);
$ruta = htmlspecialchars($_REQUEST['ruta']);
$ruta2da = htmlspecialchars($_REQUEST['ruta2da']);
$mrutaam = htmlspecialchars($_REQUEST['mrutaam']);
$mrutapm = htmlspecialchars($_REQUEST['mrutapm']);
$xdosdir = htmlspecialchars($_REQUEST['xdosdir']);
$email2 = htmlspecialchars($_REQUEST['email2']);
$cedulaimg = htmlspecialchars($_REQUEST['cedulaimg']);

$revisarimg = $_FILES["cedulaimg"]["tmp_name"];
if($revisarimg){
    $cedulaimg = $_FILES['cedulaimg']['tmp_name'];
    $tipocedula = $_FILES['cedulaimg']['type'];
    $imgCedula = addslashes(file_get_contents($cedulaimg));

}

include '../../../control/conex.php';

$sql = "INSERT INTO tblistaregistro(colegio,fecha,codigo,estado,grado,nombre,direccion,barrio,comuna,ciudad,direccion2,barrio2,comuna2,ciudad2,telefono,celular1,celular2,nombreacudiente,cedula,email,observaciones,recorrido,tarifav,tarifabl,tarifaaso,ruta,ruta2da,mrutaam,mrutapm,xdosdir,email2,cedulaimg,tipocedula)
		VALUES('$colegio','$fecha','$codigo','$estado','$grado','$nombre','$direccion','$barrio','$comuna','$ciudad','$direccion2','$barrio2','$comuna2','$ciudad2','$telefono','$celular1','$celular2','$nombreacudiente','$cedula','$email','$observaciones','$recorrido','$tarifav','$tarifabl','$tarifaaso','$ruta','$ruta2da','$mrutaam','$mrutapm','$xdosdir','$email2','$imgCedula','$tipocedula')";


$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'codigo' => $codigo,

	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>