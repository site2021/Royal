<?php

$suc = $_GET['suc'];


// adaptacion ORACLE
if ($suc=='dosq'){
	$conn = oci_connect("sxg5db","sxg5db", "192.168.20.101:1521/SXG5");
}

if ($suc=='cali'){
	$conn = oci_connect("rg06","SXG5DBA", "192.168.20.101:1521/SXG5");
}

if ($suc=='mede'){
	$conn = oci_connect("rgm02","rgm02", "192.168.20.101:1521/SXG5");
}

if ($suc=='todo'){
	$conn1 = oci_connect("sxg5db","sxg5db", "192.168.20.101:1521/SXG5");
	$conn2 = oci_connect("rg06","SXG5DBA", "192.168.20.101:1521/SXG5");	
	$conn3 = oci_connect("rgm02","rgm02", "192.168.20.101:1521/SXG5");
}


if ($suc=='todo'){
	$sql = "SELECT ENE, FEB, MAR, ABR, MAY, JUN, JUL, AGO, SEP, OCT, NOV, DIC FROM VST_VENTAS_TOTAL";
	$registros = array();
	$totales = array();
	

	for ($i=1; $i<=3; $i++)
	{	
		if ($i==1){$stmt = oci_parse($conn1, $sql); $vendedor='DOSQ';}
		if ($i==2){$stmt = oci_parse($conn2, $sql); $vendedor='CALI';}
		if ($i==3){$stmt = oci_parse($conn3, $sql); $vendedor='MEDE';}

		$ok   = oci_execute( $stmt );

		if( $ok == true ){

			$obj = oci_fetch_object($stmt);

				$ene = $obj->ENE;
				$feb = $obj->FEB;
				$mar = $obj->MAR;
				$abr = $obj->ABR;
				$may = $obj->MAY;
				$jun = $obj->JUN;
				$jul = $obj->JUL;
				$ago = $obj->AGO;
				$sep = $obj->SEP;
				$oct = $obj->OCT;
				$nov = $obj->NOV;
				$dic = $obj->DIC;
				$tot = $ene + $feb + $mar + $abr + $may + $jun + $jul + $ago + $sep +
					   $oct + $nov + $dic;


				$tene = $tene + $ene;
				$tfeb = $tfeb + $feb;
				$tmar = $tmar + $mar;
				$tabr = $tabr + $abr;
				$tmay = $tmay + $may;
				$tjun = $tjun + $jun;
				$tjul = $tjul + $jul;
				$tago = $tago + $ago;
				$tsep = $tsep + $sep;
				$toct = $toct + $oct;
				$tnov = $tnov + $nov;
				$tdic = $tdic + $dic;
				$ttot = $tene + $tfeb + $tmar + $tabr + $tmay + $tjun + $tjul + $tago + $tsep +
					    $toct + $tnov + $tdic;

				$registros[] = array('vendedor'=>$vendedor, 'ene'=>$ene, 'feb'=>$feb, 'mar'=>$mar,
							         'abr'=>$abr, 'may'=>$may, 'jun'=>$jun, 'jul'=>$jul, 'ago'=>$ago, 
							         'sep'=>$sep, 'oct'=>$oct, 'nov'=>$nov1, 'dic'=>$dic, 'total'=>$tot );

		}		

	}

	$totales[] = array('vendedor'=>'TOTAL','ene'=>$tene, 'feb'=>$tfeb, 'mar'=>$tmar, 
					   'abr'=>$tabr, 'may'=>$tmay, 'jun'=>$tjun, 'jul'=>$tjul, 'ago'=>$tago, 
					   'sep'=>$tsep, 'oct'=>$toct, 'nov'=>$tnov, 'dic'=>$tdic, 'total'=>$ttot );
	
		
	$json_string = json_encode($registros);
	$json_totales = json_encode($totales);

	echo "{\"rows\":".$json_string.",\"footer\":".$json_totales."}";

	oci_free_statement($stmt);	// Liberar los recursos asociados a una sentencia o cursor

}


// ---------------------------------- Resumen: dosq, cali, mede, -----------------------------------
if ($suc!='todo'){

	$sql = "SELECT VENDEDOR, ENE, FEB, MAR, ABR, MAY, JUN, JUL, AGO, SEP, OCT, NOV, DIC FROM VST_VENTAS_RESUMEN ORDER BY VENDEDOR";
	$stmt = oci_parse($conn, $sql);		// Preparar la sentencia
	$ok   = oci_execute( $stmt );		// Ejecutar la sentencia

	if( $ok == true ){

		$registros = array();
		$totales = array();

		while ($obj = oci_fetch_object($stmt)){
			$vendedor = $obj->VENDEDOR;
			$ene = $obj->ENE;
			$feb = $obj->FEB;
			$mar = $obj->MAR;
			$abr = $obj->ABR;
			$may = $obj->MAY;
			$jun = $obj->JUN;
			$jul = $obj->JUL;
			$ago = $obj->AGO;
			$sep = $obj->SEP;
			$oct = $obj->OCT;
			$nov = $obj->NOV;
			$dic = $obj->DIC;
			$tot = $ene + $feb + $mar + $abr + $may + $jun + $jul + $ago + $sep +
				   $oct + $nov + $dic;


			$tene = $tene + $ene;
			$tfeb = $tfeb + $feb;
			$tmar = $tmar + $mar;
			$tabr = $tabr + $abr;
			$tmay = $tmay + $may;
			$tjun = $tjun + $jun;
			$tjul = $tjul + $jul;
			$tago = $tago + $ago;
			$tsep = $tsep + $sep;
			$toct = $toct + $oct;
			$tnov = $tnov + $nov;
			$tdic = $tdic + $dic;
			$ttot = $tene + $tfeb + $tmar + $tabr + $tmay + $tjun + $tjul + $tago + $tsep +
				    $toct + $tnov + $tdic;

			$registros[] = array('vendedor'=>$vendedor, 'ene'=>$ene, 'feb'=>$feb, 'mar'=>$mar,
						          'abr'=>$abr, 'may'=>$may, 'jun'=>$jun, 'jul'=>$jul, 'ago'=>$ago, 
						          'sep'=>$sep, 'oct'=>$oct, 'nov'=>$nov1, 'dic'=>$dic, 'total'=>$tot );

		}

		$totales[] = array('vendedor'=>'TOTAL', 'ene'=>$tene, 'feb'=>$tfeb, 'mar'=>$tmar, 
						   'abr'=>$tabr, 'may'=>$tmay, 'jun'=>$tjun, 'jul'=>$tjul, 'ago'=>$tago, 
						   'sep'=>$tsep, 'oct'=>$toct, 'nov'=>$tnov, 'dic'=>$tdic, 'total'=>$ttot );

		$json_string = json_encode($registros);
		$json_totales = json_encode($totales);

		echo "{\"rows\":".$json_string.",\"footer\":".$json_totales."}";

		oci_free_statement($stmt);	// Liberar los recursos asociados a una sentencia o cursor

	}

	oci_close($conn);
}

?>