<?php
	// archivo de funciones
	// add_array 
	include 'udfs.php';

	// parametros desde web
	$tabla = $_REQUEST['tabla'];
	$filas = $_REQUEST['campos'];

	// lista de campos ya seleccionados de la tabla
	$columnas = $_REQUEST['columnas'];
	$ncolumnas = $_REQUEST['ncolumnas'];

	$filtros = $_REQUEST['filtros'];
	$nfiltros = str_replace("\\","",$filtros);

	$valores = $_REQUEST['valores'];
	$listaValores = $_REQUEST['listaValores'];

	$xdb = $_REQUEST['xdb'];

	// cadena de conexion dependiendo de la db
	if($xdb=='oracle'){
		$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/SAFIX");		
	}
	if($xdb=='mysql'){
		//include 'conn.php';
		include '../../control/conex.php';
	}

	// extraer columna de valores
	// si hay campos en COLUMNAS
	// solo habra UN VALOR
	if($columnas!=''){

		$desde = strpos($valores,'(')+1;
		$hasta = strpos($valores,')');

		// redefinir el campo valor porque viene con la operacion
		// SUM(VENTA_NETA) VENTA_NETA	
		$campoValor = substr($valores,$desde,$hasta-$desde);

		// solo x comodidad creamos vector de columnas nuevas 
		// a partir de ncolumnas (lista de campos)
		$cols = add_array($ncolumnas);

		$columnaSQL = '';
		for($i=0;$i<sizeof($cols);$i++){		
			$columnaSQL = $columnaSQL." SUM( CASE $columnas WHEN '$cols[$i]' THEN $campoValor ELSE 0 END ) $cols[$i], ";
			
		}

		//echo "<script>alert($columnaSQL)</script>";

		$sql="SELECT $filas, $columnaSQL $valores FROM $tabla WHERE $nfiltros GROUP BY $filas ORDER BY $filas";
	
	} else {

		$sql="SELECT $filas, $valores FROM $tabla WHERE $nfiltros GROUP BY $filas ORDER BY $filas";	

	}

	// verificar sql
	/*
	$ar=fopen("sql.txt","w");
	fputs($ar,$sql);
	fclose($ar);
	*/ 
	
	//construir vectores de filas, valores
	$fils = add_array($filas);
	$vals = add_array($listaValores);

	// <---
	
	// ejecucion de la consulta dependiente de la db oracle, mysql
	if($xdb=='oracle'){
		$stmt = oci_parse($conn, $sql);
		$ok   = oci_execute($stmt);

		if ($ok==true){

			// definir array acumulador
			$totales = array();

			// definir arrya de salida de totales x el hijueputa formato
			$totalSalida = array();

			$items = array();
			while ($row = oci_fetch_array($stmt)){
				$temporal = array();
				// adicionar filas
				for($i=0;$i<sizeof($fils);$i++){
					$temporal[$fils[$i]] = $row[$fils[$i]];
				}

				// adicionar columnas -
				if($columnas!=''){
					for($i=0;$i<sizeof($cols);$i++){
						$temporal[$cols[$i]] = number_format($row[$cols[$i]],2);
						$totales[$cols[$i]] = $totales[$cols[$i]] + ($row[$cols[$i]]);
					}
				}

				// adicionar valores
				for($i=0;$i<sizeof($vals);$i++){
					$temporal[$vals[$i]] = number_format($row[$vals[$i]],2);
					$totales[$vals[$i]] = $totales[$vals[$i]] + ($row[$vals[$i]]);
				}
				array_push($items, $temporal);

			}	

			// generar array de salida con FORMATO

			for($i=0;$i<sizeof($cols);$i++){
				$totalSalida[$cols[$i]] = number_format($totales[$cols[$i]],2);			
			}

			for($i=0;$i<sizeof($vals);$i++){
				$totalSalida[$vals[$i]] = number_format($totales[$vals[$i]],2);			
			}



			$json_string = json_encode($items);
			$json_totales = json_encode($totalSalida);

			echo "{\"rows\":".$json_string.",\"footer\":[".$json_totales."]}";

			
		}

		oci_close($conn);
	}

	if($xdb=='mysql'){
		$stmt = mysqli_query($conexion, $sql);

		/*
		// validar sql
		$enlace = mysql_connect("localhost", "root", "hector");
		mysql_select_db("rgd", $enlace);

		$resultado = mysql_query($sql, $enlace);
		//$numero_filas = mysql_num_rows($resultado);		

		$ar=fopen("sql.txt","w");
		fputs($ar,'UNA AYUDA POR FAVOR!!!'.PHP_EOL);
		fputs($ar,$sql.PHP_EOL);
		//fputs($ar,$numero_filas);
		//fclose($ar);

		*/

		// definir array acumulador
		$totales = array();

		// definir arrya de salida de totales x el hijueputa formato
		$totalSalida = array();

		$items = array();
		while ($row = mysqli_fetch_array($stmt)){				

			$temporal = array();
			// adicionar filas
			for($i=0;$i<sizeof($fils);$i++){
				$temporal[$fils[$i]] = $row[$fils[$i]];
			}

			// adicionar columnas -
			if($columnas!=''){
				for($i=0;$i<sizeof($cols);$i++){
					$temporal[$cols[$i]] = number_format($row[$cols[$i]],2);
					$totales[$cols[$i]] = $totales[$cols[$i]] + ($row[$cols[$i]]);
				}
			}

			// adicionar valores
			for($i=0;$i<sizeof($vals);$i++){
				$temporal[$vals[$i]] = number_format($row[$vals[$i]],2);
				$totales[$vals[$i]] = $totales[$vals[$i]] + ($row[$vals[$i]]);
			}
			array_push($items, $temporal);

		}			

		// generar array de salida con FORMATO
		for($i=0;$i<sizeof($cols);$i++){
			$totalSalida[$cols[$i]] = number_format($totales[$cols[$i]],2);			
		}

		for($i=0;$i<sizeof($vals);$i++){
			$totalSalida[$vals[$i]] = number_format($totales[$vals[$i]],2);			
		}

		$json_string = json_encode($items);
		$json_totales = json_encode($totalSalida);

		echo "{\"rows\":".$json_string.",\"footer\":[".$json_totales."]}";

	}

?>