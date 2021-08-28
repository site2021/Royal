<?php
// coleccion de funciones en su majestas PHP

function camposEquiva($ptabla){
	require_once('json/mysql-i-class.php');
	$reg = new Registro();

	$sql = "SELECT * FROM txequiva WHERE tabla='$ptabla' ";
	
	$result = $reg->consultar($sql);

	$filas = array();
	while($row = mysqli_fetch_array($result)){
		if($row['dato']!=''){
			array_push($filas,$row);	
		}		
	}

	// echo json_encode($filas);
	return $filas;

}

function codigoMunicipio($pnombre){
	$donde = strpos($pnombre,'-');

	// el nombre tiene la raya que separa el municipio-depto
	if(!$donde){
		$municipio = $pnombre;
		$depto = 'x';

		$where = " municipio_nom='$municipio' ";

	}else {
		$municipio = substr($pnombre,0,$donde);
		$depto = strtoupper(substr($pnombre,$donde+1,20));

		$where = " municipio_nom='$municipio' AND depto_nom='$depto' ";
	}

	require_once('json/mysql-i-class.php');
	$reg = new Registro();

	$sql = "SELECT municipio_cod FROM tbmunicipios WHERE ".$where;
	
	$result = $reg->consultar($sql);

	$row = mysqli_fetch_array($result);

	return $row[0];

}

function occurr($pcadena,$pgrupo){
	$grupo = 1;

	$cgrupo = '';	// guardar caracteres de grupo
	$long = strlen($pcadena);
	$indice = 0;	
	while($indice<$long){
		$car = substr($pcadena,$indice,1);
		if($car==' '){
			if($grupo==$pgrupo){
				return $cgrupo;
			}
			$cgrupo = '';
			$grupo = $grupo + 1;

			if($grupo>3){
				if($pgrupo>$grupo){
					return '';
				}else {
					$hasta = $long-$indice+1;
					return substr($pcadena,$indice,$hasta);
				}
			}

		}else{
			$cgrupo = $cgrupo.$car;
		}
		$indice = $indice + 1;

	}
	if($pgrupo>$grupo){
		return '';
	}else {
		return $cgrupo;	
	}

}


?>