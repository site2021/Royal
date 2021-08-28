<?php
$tarjoperaimg = htmlspecialchars($_REQUEST['tarjoperaimg']);
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
$enconvenio = htmlspecialchars($_REQUEST['enconvenio']);
$inicioconvenio = htmlspecialchars($_REQUEST['inicioconvenio']);
$finconvenio = htmlspecialchars($_REQUEST['finconvenio']);

$tipotarjopera = htmlspecialchars($_REQUEST['tipotarjopera']);
// $tarjoperaimg = htmlspecialchars($_REQUEST(['tarjoperaimg']['tmp_name']));
// $tipotarjopera = htmlspecialchars($_REQUEST(['tarjoperaimg']['type']));
// $imgTarjopera = addslashes(file_get_contents($tarjoperaimg));
// $soatimg = htmlspecialchars($_REQUEST['soatimg']);
// $tecmecanicaimg = htmlspecialchars($_REQUEST['tecmecanicaimg']);
// $polcontracimg = htmlspecialchars($_REQUEST['polcontracimg']);
// $polextracimg = htmlspecialchars($_REQUEST['polextracimg']);
// $preventivaimg = htmlspecialchars($_REQUEST['preventivaimg']);
// $tarjoperaimg = htmlspecialchars($_REQUEST['tarjoperaimg']);
// $ruta = 'files/'.$id_insert.'/';
$revisartarjopera = $_FILES["tarjoperaimg"]["tmp_name"];
if(file_exists($revisartarjopera)){
	// $tarjoperaimg = $_FILES['tarjoperaimg']['tmp_name'];
    $tipotarjopera = $_FILES['tarjoperaimg']['type'];
    $imgTarjopera = addslashes(file_get_contents($revisartarjopera));

    $sql = "UPDATE tbvehiculosg3 SET interno='$interno',placa='$placa',tipovinculacion='$tipovinculacion',empresaafiliadora='$empresaafiliadora', licencia='$licencia', capacidad='$capacidad', marca='$marca', motor='$motor', modelo='$modelo', cilindraje='$cilindraje', color='$color', clase='$clase', carroceria='$carroceria', combustible='$combustible', chasis='$chasis',iniciosoat='$iniciosoat',finsoat='$finsoat',iniciotecmecanica='$iniciotecmecanica',fintecmecanica='$fintecmecanica',tarjetaoperacion='$tarjetaoperacion' ,iniciotarjetaoperacion='$iniciotarjetaoperacion',fintarjetaoperacion='$fintarjetaoperacion',iniciopolizacontrac='$iniciopolizacontrac',finpolizacontrac='$finpolizacontrac',iniciopolizaextra='$iniciopolizaextra',finpolizaextra='$finpolizaextra',iniciopreventiva='$iniciopreventiva',finpreventiva='$finpreventiva', propietario='$propietario',estado='$estado',observacion='$observacion',tarjoperaimg='$imgTarjopera',tipotarjopera='$tipotarjopera',enconvenio='$enconvenio',inicioconvenio='$inicioconvenio',finconvenio='$finconvenio' WHERE id=$id";
}
else{
	$sql = "UPDATE tbvehiculosg3 SET interno='$interno',placa='$placa',tipovinculacion='$tipovinculacion',empresaafiliadora='$empresaafiliadora', licencia='$licencia', capacidad='$capacidad', marca='$marca', motor='$motor', modelo='$modelo', cilindraje='$cilindraje', color='$color', clase='$clase', carroceria='$carroceria', combustible='$combustible', chasis='$chasis',iniciosoat='$iniciosoat',finsoat='$finsoat',iniciotecmecanica='$iniciotecmecanica',fintecmecanica='$fintecmecanica',tarjetaoperacion='$tarjetaoperacion' ,iniciotarjetaoperacion='$iniciotarjetaoperacion',fintarjetaoperacion='$fintarjetaoperacion',iniciopolizacontrac='$iniciopolizacontrac',finpolizacontrac='$finpolizacontrac',iniciopolizaextra='$iniciopolizaextra',finpolizaextra='$finpolizaextra',iniciopreventiva='$iniciopreventiva',finpreventiva='$finpreventiva', propietario='$propietario',estado='$estado',observacion='$observacion',enconvenio='$enconvenio',inicioconvenio='$inicioconvenio',finconvenio='$finconvenio' WHERE id=$id";
}

// $revisarsoat = $_FILES["soatimg"]["tmp_name"];
// if($revisarsoat !== false){
//     $soatimg = $_FILES['soatimg']['tmp_name'];
//     $tiposoat = $_FILES['soatimg']['type'];
//     $imgSoat = addslashes(file_get_contents($soatimg));

// }

// $revisartecmecanica = $_FILES["tecmecanicaimg"]["tmp_name"];
// if($revisartecmecanica !== false){
//     $tecmecanicaimg = $_FILES['tecmecanicaimg']['tmp_name'];
//     $tipotecmecanica = $_FILES['tecmecanicaimg']['type'];
//     $imgTecmecanica = addslashes(file_get_contents($tecmecanicaimg));

// }

// $revisarpolcontrac = $_FILES["polcontracimg"]["tmp_name"];
// if($revisarpolcontrac !== false){
//     $polcontracimg = $_FILES['polcontracimg']['tmp_name'];
//     $tipopolcontrac = $_FILES['polcontracimg']['type'];
//     $imgPolcontrac = addslashes(file_get_contents($polcontracimg));

// }

// $revisarpolextrac = $_FILES["polextracimg"]["tmp_name"];
// if($revisarpolextrac !== false){
//     $polextracimg = $_FILES['polextracimg']['tmp_name'];
//     $tipopolextrac = $_FILES['polextracimg']['type'];
//     $imgPolextrac = addslashes(file_get_contents($polextracimg));

// }

// $revisarpreventiva = $_FILES["preventivaimg"]["tmp_name"];
// if($revisarpreventiva !== false){
//     $preventivaimg = $_FILES['preventivaimg']['tmp_name'];
//     $tipopreventiva = $_FILES['preventivaimg']['type'];
//     $imgPreventiva = addslashes(file_get_contents($preventivaimg));

// }

include '../../../control/conex.php';




$result = @mysqli_query($conexion, $sql);
$id_insert = $mysqli->insert_id;

if ($result){
	echo json_encode(array('success'=>true));

} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

?>