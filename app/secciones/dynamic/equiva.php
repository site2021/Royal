<?php
	//tabla a evaluar las equivalencias
	$tabla = 'twmovimientos';

	// analisis de functions de php
	echo $tabla.'<br>';
	echo substr($tabla,2,4).'<br>';
	echo strpos($tabla,'ent');

	$comando = str_replace('x',$xdato,$valor);

	// require_once('json/mysql-i-class.php');
	// $reg = new Registro();

	// $sql = "SELECT * FROM txequiva WHERE tabla='$tabla' ";
	// $result = $reg->consultar($sql);

	// $filas = array();
	// while($row = mysqli_fetch_object($result)){
	// 	array_push($filas,$row);
	// }

	// echo json_encode($filas);
?>