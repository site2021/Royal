<?php

	$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/SAFIX");	

	$sql = "SELECT NMES, CALI, DOSQ, MEDE FROM INTRA_VENTAS_SEDE_2016";	

	$campos = array('NMES','CALI','DOSQ','MEDE');

	//echo "elementos del vector campos:";
	//for($i=0;$i<sizeof($campos);$i++){
	//	echo $campos[$i];
	//}

	//echo $sql;
    
    $stmt = oci_parse($conn, $sql);
	$ok   = oci_execute($stmt);

	if ($ok==true){

		/*
		$obj = oci_fetch_array($stmt);		

		echo 'total de elementos:'.sizeof($obj).'<br>';
		echo 'campos:'.sizeof($campos).'<br>';

		for($i=0;$i<sizeof($campos);$i++){
			echo $campos[$i].'<br>';
		}

		echo $obj[$campos[0]].'<br>';
		echo $obj[$campos[1]].'<br>';
		echo $obj[$campos[2]].'<br>';
		echo $obj[$campos[3]].'<br>';

		$temporal = array();

		for($i=0;$i<sizeof($campos);$i++){
			$temporal[$campos[$i]] = number_format($obj[$campos[$i]]);	
		}
		echo 'ELEMENTOS DE temporal <br>';
		for($i=0;$i<sizeof($campos);$i++){
			echo 'temporal: '.$temporal[$campos[$i]].'<br>';	
		}
		*/

		// array de elementos 
		$items = array();		
		
		// definir vector de totales
		$totalSalida = array();
		$totalSalida[$campos[0]] = 'TOTALES';

		$totales = array();
		$totales[$campos[0]] = 'TOTALES';

		while ($obj = oci_fetch_array($stmt)){
			$temporal = array();			
			
			$temporal[$campos[0]] = $obj[$campos[0]];	
			for($i=1;$i<sizeof($campos);$i++){
				$temporal[$campos[$i]] = number_format($obj[$campos[$i]]);	

				// acumular totales
				$totales[$campos[$i]] = $totales[$campos[$i]] + $obj[$campos[$i]];
			}
			//array_push($items, $obj);
			array_push($items, $temporal);

		}

		//definir formato vector totalSalida
		for($i=1;$i<sizeof($campos);$i++){
			$totalSalida[$campos[$i]] = number_format($totales[$campos[$i]]);
		}

		$json_string = json_encode($items);
		$json_totales = json_encode($totalSalida);

		echo "{\"rows\":".$json_string.",\"footer\":[".$json_totales."]}";

		// echo json_encode($items);

	}


?>
