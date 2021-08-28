<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.body { background: blue };
</style>
<body style="background: black">

</body>
</html>
<?php

include '../../control/conex.php';

$barrio = $_REQUEST['barrio'];

$rs = mysqli_query($conexion, "SELECT * FROM tbdatosnew");

$items = array();

while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}

echo json_encode($items);

?>
