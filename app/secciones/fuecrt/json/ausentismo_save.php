<?php

$inicioincapacidad = htmlspecialchars($_REQUEST['inicioincapacidad']);
$finincapacidad = htmlspecialchars($_REQUEST['finincapacidad']);
$conductor = htmlspecialchars($_REQUEST['conductor']);
$cedulaconductor = htmlspecialchars($_REQUEST['cedulaconductor']);
$seccion = htmlspecialchars($_REQUEST['seccion']);
$tipocontrato = htmlspecialchars($_REQUEST['tipocontrato']);
$cargo = htmlspecialchars($_REQUEST['cargo']);
$causaincapacidad = htmlspecialchars($_REQUEST['causaincapacidad']);
$diagnostenfermedad = htmlspecialchars($_REQUEST['diagnostenfermedad']);
$diasperdidosausent = htmlspecialchars($_REQUEST['diasperdidosausent']);
$recomendacionmedica = htmlspecialchars($_REQUEST['recomendacionmedica']);
$accionimpleausentis = htmlspecialchars($_REQUEST['accionimpleausentis']);
$seguimientoausentis = htmlspecialchars($_REQUEST['seguimientoausentis']);
$observacionausentis = htmlspecialchars($_REQUEST['observacionausentis']);


include '../../../control/conex.php';

$sql = "INSERT INTO tbausentismort(inicioincapacidad,finincapacidad,conductor,cedulaconductor,seccion,tipocontrato,cargo,causaincapacidad,diagnostenfermedad,diasperdidosausent,recomendacionmedica,accionimpleausentis,seguimientoausentis,observacionausentis)
		VALUES('$inicioincapacidad','$finincapacidad','$conductor','$cedulaconductor','$seccion','$tipocontrato','$cargo','$causaincapacidad','$diagnostenfermedad','$diasperdidosausent','$recomendacionmedica','$accionimpleausentis','$seguimientoausentis','$observacionausentis')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id(),
		'inicioincapacidad' => $inicioincapacidad,
		'finincapacidad' => $finincapacidad,
		'conductor' => $conductor,
		'cedulaconductor' => $cedulaconductor,
		'seccion' => $seccion,
		'tipocontrato' => $tipocontrato,
		'cargo' => $cargo,
		'causaincapacidad' => $causaincapacidad,
		'diagnostenfermedad' => $diagnostenfermedad,
		'diasperdidosausent' => $diasperdidosausent,
		'recomendacionmedica' => $recomendacionmedica,
		'accionimpleausentis' => $accionimpleausentis,
		'seguimientoausentis' => $seguimientoausentis,
		'observacionausentis' => $observacionausentis
		
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>