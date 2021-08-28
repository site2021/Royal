<?php
// $iniciosoat = htmlspecialchars($_REQUEST['iniciosoat']);
$tarjoperaimg = htmlspecialchars($_REQUEST['tarjoperaimg']);
$tipotarjopera = htmlspecialchars($_REQUEST['tipotarjopera']);

$soatimg = htmlspecialchars($_REQUEST['soatimg']);
$tiposoat = htmlspecialchars($_REQUEST['tiposoat']);

$revisartarjopera = $_FILES["tarjoperaimg"]["tmp_name"];
$revisarsoat = $_FILES["soatimg"]["tmp_name"];

// if ($revisarsoat == '' or $revisartarjopera == ''){
// 	echo "nada";
// }

if(($revisartarjopera != false) or ($revisarsoat != false)){
	// $tarjoperaimg = $_FILES['tarjoperaimg']['tmp_name'];
    $tipotarjopera = $_FILES['tarjoperaimg']['type'];
    $imgTarjopera = addslashes(file_get_contents($revisartarjopera));

    $tiposoat = $_FILES['soatimg']['type'];
    $imgSoat = addslashes(file_get_contents($revisarsoat));

    $sql = "UPDATE tbvehiculosrt SET iniciosoat='$iniciosoat',finsoat='$finsoat',iniciotecmecanica='$iniciotecmecanica',fintecmecanica='$fintecmecanica',tarjetaoperacion='$tarjetaoperacion' ,iniciotarjetaoperacion='$iniciotarjetaoperacion',fintarjetaoperacion='$fintarjetaoperacion',iniciopolizacontrac='$iniciopolizacontrac',finpolizacontrac='$finpolizacontrac',iniciopolizaextra='$iniciopolizaextra',finpolizaextra='$finpolizaextra',iniciopreventiva='$iniciopreventiva',finpreventiva='$finpreventiva',tarjoperaimg='$imgTarjopera',tipotarjopera='$tipotarjopera',soatimg='$imgSoat', tiposoat='$tiposoat' WHERE id=$id";
}
// else if(($tarjoperaimg == '') or ($soatimg == '')){
// 	echo "dhsjdh";
// }

else{
	echo "mdhdhdj";
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