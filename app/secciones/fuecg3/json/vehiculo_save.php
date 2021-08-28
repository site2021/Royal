<?php

$interno = htmlspecialchars($_REQUEST['interno']);
$placa = htmlspecialchars($_REQUEST['placa']);
$tipovinculacion = htmlspecialchars($_REQUEST['tipovinculacion']);
$empresaafiliadora = htmlspecialchars($_REQUEST['empresaafiliadora']);
$licencia = htmlspecialchars($_REQUEST['licencia']);
$capacidad = htmlspecialchars($_REQUEST['capacidad']);
$marca = htmlspecialchars($_REQUEST['marca']);
$motor = htmlspecialchars($_REQUEST['motor']);
$modelo = htmlspecialchars($_REQUEST['modelo']);
$cilindraje = htmlspecialchars($_REQUEST['cilindraje']);
$color = htmlspecialchars($_REQUEST['color']);
$clase = htmlspecialchars($_REQUEST['clase']);
$carroceria = htmlspecialchars($_REQUEST['carroceria']);
$combustible = htmlspecialchars($_REQUEST['combustible']);
$chasis = htmlspecialchars($_REQUEST['chasis']);
$iniciosoat = htmlspecialchars($_REQUEST['iniciosoat']);
$finsoat = htmlspecialchars($_REQUEST['finsoat']);
$iniciotecmecanica = htmlspecialchars($_REQUEST['iniciotecmecanica']);
$fintecmecanica = htmlspecialchars($_REQUEST['fintecmecanica']);
$tarjetaoperacion = htmlspecialchars($_REQUEST['tarjetaoperacion']);
$iniciotarjetaoperacion = htmlspecialchars($_REQUEST['iniciotarjetaoperacion']);
$fintarjetaoperacion = htmlspecialchars($_REQUEST['fintarjetaoperacion']);
$iniciopolizacontrac = htmlspecialchars($_REQUEST['iniciopolizacontrac']);
$finpolizacontrac = htmlspecialchars($_REQUEST['finpolizacontrac']);
$iniciopolizaextra = htmlspecialchars($_REQUEST['iniciopolizaextra']);
$finpolizaextra = htmlspecialchars($_REQUEST['finpolizaextra']);
$iniciopreventiva = htmlspecialchars($_REQUEST['iniciopreventiva']);
$finpreventiva = htmlspecialchars($_REQUEST['finpreventiva']);
$propietario = htmlspecialchars($_REQUEST['propietario']);
$estado = htmlspecialchars($_REQUEST['estado']);
$observacion = htmlspecialchars($_REQUEST['observacion']);
$tarjoperaimg = htmlspecialchars($_REQUEST['tarjoperaimg']);
$soatimg = htmlspecialchars($_REQUEST['soatimg']);
$tecmecanicaimg = htmlspecialchars($_REQUEST['tecmecanicaimg']);
$polcontracimg = htmlspecialchars($_REQUEST['polcontracimg']);
$polextracimg = htmlspecialchars($_REQUEST['polextracimg']);
$preventivaimg = htmlspecialchars($_REQUEST['preventivaimg']);
$enconvenio = htmlspecialchars($_REQUEST['enconvenio']);
$inicioconvenio = htmlspecialchars($_REQUEST['inicioconvenio']);
$finconvenio = htmlspecialchars($_REQUEST['finconvenio']);
// $tipo_imagen = htmlspecialchars($_REQUEST['tipo_imagen']);

$revisartarjopera = $_FILES["tarjoperaimg"]["tmp_name"];
if($revisartarjopera !== true){
    $tarjoperaimg = $_FILES['tarjoperaimg']['tmp_name'];
    $tipotarjopera = $_FILES['tarjoperaimg']['type'];
    $imgTarjopera = addslashes(file_get_contents($tarjoperaimg));

 }

$revisarsoat = $_FILES["soatimg"]["tmp_name"];
if($revisarsoat !== true){
    $soatimg = $_FILES['soatimg']['tmp_name'];
    $tiposoat = $_FILES['soatimg']['type'];
    $imgSoat = addslashes(file_get_contents($soatimg));

}

$revisartecmecanica = $_FILES["tecmecanicaimg"]["tmp_name"];
if($revisartecmecanica !== true){
    $tecmecanicaimg = $_FILES['tecmecanicaimg']['tmp_name'];
    $tipotecmecanica = $_FILES['tecmecanicaimg']['type'];
    $imgTecmecanica = addslashes(file_get_contents($tecmecanicaimg));

}

$revisarpolcontrac = $_FILES["polcontracimg"]["tmp_name"];
if($revisarpolcontrac !== true){
    $polcontracimg = $_FILES['polcontracimg']['tmp_name'];
    $tipopolcontrac = $_FILES['polcontracimg']['type'];
    $imgPolcontrac = addslashes(file_get_contents($polcontracimg));

}

$revisarpolextrac = $_FILES["polextracimg"]["tmp_name"];
if($revisarpolextrac !== true){
    $polextracimg = $_FILES['polextracimg']['tmp_name'];
    $tipopolextrac = $_FILES['polextracimg']['type'];
    $imgPolextrac = addslashes(file_get_contents($polextracimg));

}

$revisarpreventiva = $_FILES["preventivaimg"]["tmp_name"];
if($revisarpreventiva !== true){
    $preventivaimg = $_FILES['preventivaimg']['tmp_name'];
    $tipopreventiva = $_FILES['preventivaimg']['type'];
    $imgPreventiva = addslashes(file_get_contents($preventivaimg));

}
//  else{
//     echo "Por favor seleccione imagen a subir.";
// }

include '../../../control/conex.php';

$sql = "INSERT INTO tbvehiculosg3(interno,placa,tipovinculacion,empresaafiliadora,licencia,capacidad,marca,motor,modelo,cilindraje,color,clase,carroceria,combustible,chasis,iniciosoat,finsoat,iniciotecmecanica,fintecmecanica,tarjetaoperacion,iniciotarjetaoperacion,fintarjetaoperacion,iniciopolizacontrac,finpolizacontrac,iniciopolizaextra,finpolizaextra,iniciopreventiva,finpreventiva,propietario,estado,observacion,tarjoperaimg,tipotarjopera,soatimg,tiposoat,tecmecanicaimg,tipotecmecanica,polcontracimg,tipopolcontrac,polextracimg,tipopolextrac,preventivaimg,tipopreventiva,enconvenio,inicioconvenio,finconvenio)
		VALUES('$interno','$placa','$tipovinculacion','$empresaafiliadora','$licencia','$capacidad','$marca','$motor','$modelo','$cilindraje','$color','$clase','$carroceria','$combustible','$chasis','$iniciosoat','$finsoat','$iniciotecmecanica','$fintecmecanica','$tarjetaoperacion','$iniciotarjetaoperacion','$fintarjetaoperacion','$iniciopolizacontrac','$finpolizacontrac','$iniciopolizaextra','$finpolizaextra','$iniciopreventiva','$finpreventiva','$propietario','$estado','$observacion','$imgTarjopera','$tipotarjopera','$imgSoat','$tiposoat','$imgTecmecanica','$tipotecmecanica','$imgPolcontrac','$tipopolcontrac','$imgPolextrac','$tipopolextrac','$imgPreventiva','$tipopreventiva','$enconvenio','$inicioconvenio','$finconvenio')";


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