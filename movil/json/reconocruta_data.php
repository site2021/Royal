<?php

include 'conex.php';


$interno = $_REQUEST['interno'];
$colegio = $_REQUEST['colegio'];
$ruta = $_REQUEST['ruta'];
$fechageneral = $_REQUEST['fechageneral'];

$rs = mysqli_query($conexion, "SELECT codigo,nombre,grado,direccion,barrio,celular2 FROM tblistageneralnew WHERE colegio='$colegio' AND estado='A' AND (ruta='$ruta' OR ruta2da='$ruta' OR mrutaam='$ruta' OR mrutapm='$ruta' ) ORDER BY convert(codigo,unsigned) ");


$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);

	$xcodigo = $row->codigo;
	$xnombre = $row->nombre;
	$xgrado = $row->grado;
	$xdireccion = $row->direccion;
	$xbarrio = $row->barrio;
	$xcelular2 = $row->celular2;
	$xfecha = $row->fecha;


	$sqli = "INSERT INTO tbreconocruta (fechageneral,interno,colegio,ruta,codigo,nombre,grado,direccion,barrio,celular,presentacion,fecha,nombrerecibe,horarecogida,horaregreso) VALUES 
			('$fechageneral','$interno','$colegio','$ruta','$xcodigo','$xnombre','$xgrado','$xdireccion','$xbarrio','$xcelular2','','$xfecha','','','')";

	$rsi = mysqli_query($conexion,$sqli);
}
// $result["rows"] = $items;

echo json_encode(array('items'=>$items,'success'=>true));

?>