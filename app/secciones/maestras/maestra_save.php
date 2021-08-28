<?php

$tabla = htmlspecialchars($_REQUEST['tabla']);
$nombre = htmlspecialchars($_REQUEST['nombre']);

include '../../control/conex.php';

$sql = "INSERT INTO ".$tabla." (nombre) values('$nombre')";

$result = @mysqli_query($conexion, $sql);

if ($result){
	$xid = mysqli_insert_id();

	// Al adicionar un nuevo producto asignar los automotores
	if($tabla=='txproductos'){
		// nos toca traer el id por select ya que no tengo la clase definida
		$rs = mysqli_query($conexion, "SELECT id FROM txproductos WHERE nombre='$nombre'");
		$row = mysqli_fetch_row($rs);

		$xid = $row[0];

		// ahora SI hacemos la insercion en txautomotores
		$cars = array("BUS (40 PAX)","BUSETA (25-28 PAX)","BUSETA (19-24 PAX)","MICRO (16-11 PAX)",
			           "H1 (10 PAX)","CAMIONETA(4 PAX)");

		$arrlength = count($cars);		

		for($x = 0; $x < $arrlength; $x++) {
			$xnombre = $cars[$x];
			$isql = "INSERT INTO txautomotores (nombre,id_producto) VALUES ('$xnombre','$xid')";
			$insert = mysqli_query($conexion, $isql);
		}
	}

	// Al adicionar un nuevo colegio insertar datos de tarifas
	if($tabla=='txcolegios'){
		$datos = mysqli_query($conexion, "SELECT * FROM tbdatosnew WHERE colegio='CALASANZ'");
		while($row = mysqli_fetch_object($datos)){
			$wsql = "INSERT INTO tbdatosnew (vigencia,colegio,barrio,comuna,ciudad) VALUES (
					 '$row->vigencia', '$nombre', '$row->barrio', '$row->comuna', '$row->ciudad') ";
			$wrs = mysqli_query($conexion, $wsql);
		}

	}

	echo json_encode(array(
		'id' => $xid,
		'nombre' => $nombre
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>