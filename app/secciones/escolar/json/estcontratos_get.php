<?php

include '../../../control/conex.php';

// $colegio = $_REQUEST['colegio'];

$rs = mysqli_query($conexion, "SELECT id, colegio, fecha, codigo, estado, grado, nombre, direccion, barrio, comuna, ciudad, direccion2, barrio2, comuna2, ciudad2, telefono, celular1, celular2, nombreacudiente, cedula, email, observaciones, recorrido, tarifav, tarifabl, tarifaaso, ruta, ruta2da, mrutaam, mrutapm, xdosdir, 	email2, cedulaimg, tipocedula FROM tblistaregistro WHERE colegio='LA SALLE' ");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>