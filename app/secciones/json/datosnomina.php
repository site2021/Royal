<?php

$xcedula = $_GET['cedula'];
$xpago = $_GET['pago'];


$conn = oci_connect("sxg5db","sxg5db", "192.168.20.101:1521/SXG5");
$sql = "SELECT COUNT(*) AS REGS FROM VST_MOVIMIENTO_NOMINA WHERE COD='".$xcedula."' AND PAGO='".$xpago."'";
$stmt = oci_parse($conn, $sql);	
$ok   = oci_execute( $stmt );
$obj = oci_fetch_object($stmt);
$cuantos = $obj->REGS;


$sql = "SELECT COD, NOMBRE, FECHA_INICIAL, FECHA_FINAL, PAGO, CONCEPTO, DESCRIPCION, CANTIDAD, VALOR, TOTAL, TIPO_CONCEPTO FROM VST_MOVIMIENTO_NOMINA WHERE COD='".$xcedula."' AND PAGO='".$xpago."' ORDER BY TIPO_CONCEPTO, CONCEPTO";
$stmt = oci_parse($conn, $sql);		
$ok   = oci_execute( $stmt );		

$registros = array();

if( $ok == true ){

	while ($obj = oci_fetch_object($stmt)){
		 $cod = $obj->COD;
		 $nombre= $obj->NOMBRE;
		 $fecha_inicial=$obj->FECHA_INICIAL;
		 $fecha_final=$obj->FECHA_FINAL;
		 $pago=$obj->PAGO;
		 $concepto=$obj->CONCEPTO;
		 $descripcion=$obj->DESCRIPCION;
		 $cantidad=$obj->CANTIDAD;
		 $valor=number_format($obj->VALOR,0);
		 $total=number_format($obj->TOTAL,0);
		 $tipo_concepto=$obj->TIPO_CONCEPTO;

		 $registros[] = array('cuantos'=>$cuantos, 'cod'=>$cod, 'nombre'=>$nombre, 'fecha_inicial'=>$fecha_inicial, 
		 				      'fecha_final'=>$fecha_final, 'pago'=>$pago, 'concepto'=>$concepto, 
		 				      'descripcion'=>$descripcion, 'cantidad'=>$cantidad, 
		 				      'valor'=>$valor, 'total'=>$total, 'tipo_concepto'=>$tipo_concepto);

	}
}

$json_string = json_encode($registros);
echo $json_string;

?>