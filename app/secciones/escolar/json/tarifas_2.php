<?php

include '../../../control/conex.php';

$vigencia = $_REQUEST['vigencia'];
$colegio = $_REQUEST['colegio'];
$barrio = $_REQUEST['barrio'];
$barrio2 = $_REQUEST['barrio2'];

// echo "$vigencia";
// echo "$colegio";
// echo "EL BARRIO 1 ES: +  $barrio";
// echo "EL BARRIO 2 ES: +  $barrio2";
// echo "$barrio2";

// echo "vigencia";
// $rs = mysqli_query($conexion, "SELECT * FROM tbdatosnew WHERE vigencia='$vigencia' AND colegio='$colegio' AND barrio='$barrio' ");

$rs = mysqli_query($conexion, "SELECT MAX( dosdirtv ) , vigencia, colegio, barrio, comuna, ciudad, tarifabl, tarifaaso, mediatv, mediabl, mediata, dosdirtv, dosdirbl, dosdirta FROM tbdatosnew WHERE vigencia='$vigencia' AND colegio='$colegio' AND barrio='$barrio' OR barrio='$barrio2' AND vigencia='$vigencia' AND colegio='$colegio' GROUP BY colegio ");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>