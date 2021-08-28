<?php
// adicionar estructura de tabla a tabla equivalencias
// tabla --> txequiva

include '../../control/conex.php';

$tabla='txterceros';

require_once('json/mysql-i-class.php');
$reg = new Registro();

$sql = "SELECT column_name FROM information_schema.columns WHERE table_name='$tabla' ORDER BY ordinal_position";

$result = $reg->consultar($sql);

// orden del archivo
$dato = 0;
while($row = mysqli_fetch_array($result)){
	$campo = $row[0];

	if($campo!='id' && $campo!='empresa_codigo'){
		// insertar registros en tabla de equivalencias
		$sql = "INSERT INTO txequiva(tabla,campo,dato) VALUES ('$tabla','$campo','$dato')";

		mysqli_query($conexion, $sql);

		$dato++;

	}
	
}

?>