<?php

include 'conex.php';

	$items1 = ($_POST['contrato']);
	$items2 = ($_POST['cedularesponsable']);
	$items3 = ($_POST['cedula']);
	$items4 = ($_POST['pasajero']);
	 
	///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
	while(true) {

	    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
	    $item1 = current($items1);
	    $item2 = current($items2);
	    $item3 = current($items3);
	    $item4 = current($items4);
	    
	    ////// ASIGNARLOS A VARIABLES ///////////////////
	    $cont=(( $item1 !== false) ? $item1 : ", &nbsp;");
	    $cedres=(( $item2 !== false) ? $item2 : ", &nbsp;");
	    $ced=(( $item3 !== false) ? $item3 : ", &nbsp;");
	    $pas=(( $item4 !== false) ? $item4 : ", &nbsp;");

	    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
	    $valores='('.$cont.',"'.$cedres.'","'.$ced.'","'.$pas.'"),';

	    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
	    $valoresQ= substr($valores, 0, -1);
	    
	    ///////// QUERY DE INSERCIÓN ////////////////////////////
	    $sql = "INSERT INTO tbpasajeros (contrato,cedularesponsable,cedula,pasajero) VALUES $valoresQ";

	    
	    $sqlRes=$conexion->query($sql) or mysql_error();

	    
	    // Up! Next Value
	    $item1 = next( $items1 );
	    $item2 = next( $items2 );
	    $item3 = next( $items3 );
	    $item4 = next( $items4 );
	    // Check terminator
	    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;

	}

?>
