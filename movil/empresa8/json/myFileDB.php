<?php

$accion = $_REQUEST['accion'];
$funcion = $_REQUEST['funcion'];

$tabla = $_REQUEST['tabla'];

$campos = $_REQUEST['campos'];
$valores = $_REQUEST['valores'];

$camposActualizar = $_REQUEST['camposActualizar'];
$valoresActualizar = $_REQUEST['valoresActualizar'];

$camposCondicion = $_REQUEST['camposCondicion'];
$valoresCondicion = $_REQUEST['valoresCondicion'];

$ordenar = $_REQUEST['ordenar'];

// cargar clase PHP para manejo base de datos /////////////////////////////////////////////////////
require_once('mysql-i-class.php');
$reg = new Registro();

// arnmar QUERY ///////////////////////////////////////////////////////////////////////////////////
$sql = '';

// INSERTAR ///////////////////////////////////////////////////////////////////////////////////////
if($accion=='I'){
	$listaCampos = listaCampos($campos);
	$listaValores = listaValores($valores);

	$sql = 'INSERT INTO '.$tabla.' ('.$listaCampos.') VALUES ('.$listaValores.')';

	$result = $reg->ejecutar($sql);

	if($result){
		echo json_encode(array('success'=>$result, 'sql'=>$sql ));

	} else {		
		echo json_encode(array('errorMsg'=>'Error INSERT!!.' ));

	}

} 

// ACTUALIZAR /////////////////////////////////////////////////////////////////////////////////////
if($accion=='U'){
	$listaActualizar = listaActualizar($camposActualizar, $valoresActualizar);
	$listaCondiciones = listaCondiciones($camposCondicion,$valoresCondicion);

	$sql = 'UPDATE '.$tabla.' SET '.$listaActualizar.' WHERE '.$listaCondiciones;

	$result = $reg->ejecutar($sql);
	$cuantos = $reg->cuantos($sql);		

	if($result){
		echo json_encode(array('success'=>$result, 'cuantos'=>$cuantos, 'sql'=>$sql ));

	} else {		
		echo json_encode(array('errorMsg'=>'Error UPDATE!!.', 'sql'=>$sql ));

	}

}

// BORRAR /////////////////////////////////////////////////////////////////////////////////////////
if($accion=='D'){
	$listaCondiciones = listaCondiciones($camposCondicion,$valoresCondicion);

	$sql = 'DELETE FROM '.$tabla.' WHERE '.$listaCondiciones;

	$result = $reg->borrar($sql);
	$cuantos = $reg->cuantos($sql);	

	echo json_encode(array('success'=>$result, 'cuantos'=>$cuantos, 'sql'=>$sql ));

}

// FUNCTION: MAX, COUNT ///////////////////////////////////////////////////////////////////////////
if($accion=='F'){
	$listaCampos = listaCampos($campos);

	$sql = 'SELECT '.$funcion.'('.$listaCampos.') valor FROM '.$tabla;

	$result = $reg->calcular($sql);

	$row = mysqli_fetch_array($result);

	echo json_encode(array('success'=>true, 'valor'=>$row['valor'], 'sql'=>$sql ));	

}

// CONSULTAR //////////////////////////////////////////////////////////////////////////////////////
if($accion=='C'){
	$listaCondiciones = listaCondiciones($camposCondicion,$valoresCondicion);

	$sql = 'SELECT * FROM '.$tabla.' WHERE '.$listaCondiciones.' ORDER BY '.$ordenar;

	// validacion de $result a archivo texto
	// $fp = fopen('fichero.txt','w');
	// fputs($fp, $sql);
	// fclose($fp);
	// -------------------------------------	

	$result = $reg->consultar($sql);

	$rowcount=mysqli_num_rows($result);

	if($rowcount==0){
		echo json_encode(array('success'=>false));		

	}else {
		$items = array();
		while($row = mysqli_fetch_array($result)){
			array_push($items, $row);
		}
		
		echo json_encode(array('success'=>true,'rowcount'=>$rowcount,'items'=>$items));

	}
		

	// validacion de $result a archivo texto
	// $fp = fopen('fichero.txt','w');
	// fputs($fp, $row->data_type);
	// fclose($fp);
	// -------------------------------------

	//echo json_encode(array('success'=>true, 'items'=>$row, 'sql'=>$sql ));	
	//echo json_encode($items);	

}

// consultar usando LIKE para comparacion de campos
if($accion=='L'){
	$listaCondiciones = listaCondicionesLike($camposCondicion,$valoresCondicion);

	$sql = 'SELECT * FROM '.$tabla.' WHERE '.$listaCondiciones.' ORDER BY '.$ordenar;

	// $fp = fopen('fichero.txt','w');
	// fputs($fp, $sql);
	// fclose($fp);

	$result = $reg->consultar($sql);

	$rowcount=mysqli_num_rows($result);

	if($rowcount==0){
		echo json_encode(array('success'=>false,'sql'=>$sql));

	}else {
		$items = array();
		while($row = mysqli_fetch_array($result)){
			array_push($items, $row);
		}
		
		echo json_encode(array('success'=>true,'rowcount'=>$rowcount,'items'=>$items));

	}

}

// VALIDAR SI ACCION ES IUDCF ///////////////////////////////////////////////////////////////////// 
$opciones = 'IUDCFL';
$pos = strpos($opciones, $accion);

if($pos===false){
	echo json_encode(array('errorMsg'=>'accion NO DEFINIDA!!!', 'sql'=>$sql ));
}


$reg->cerrar();


// FUNCTION adicionales ///////////////////////////////////////////////////////////////////////////
// devuelve lista de campos separados x coma, pues...uuuuffff que esfuerzo!!!
function listaCampos($lcampos){
	$lista = '';
	for($i=0; $i<sizeof($lcampos); $i++){
		if($i==0){
			$lista = $lista.$lcampos[$i];
		} else {
			$lista = $lista.','.$lcampos[$i];
		}
	}
	return $lista;
}

// devuelve lista de valores, entre comillas, ya es un esfuerzo medio!!!
function listaValores($lvalores){
	$lista = '';
	for($i=0; $i<sizeof($lvalores); $i++){
		// adicionar comilla a lado y lado y luego unir a cadena
		$xvalor = "'".$lvalores[$i]."'";
		if($i==0){
			$lista = $lista.$xvalor;
		} else {
			$lista = $lista.','.$xvalor;
		}
	}
	return $lista;
}

function listaCondiciones($pCamposCondicion,$pValoresCondicion){
	$lista = '';
	for($i=0; $i<sizeof($pCamposCondicion); $i++){
		// adicionar comilla a lado y lado y luego unir a cadena
		$xvalor = "'".$pValoresCondicion[$i]."'";
		if($i==0){
			$lista = $lista.$pCamposCondicion[$i].'='.$xvalor;
		}else {
			$lista = $lista.' AND '.$pCamposCondicion[$i].'='.$xvalor;
		}
	}
	return $lista;
}

function listaCondicionesLike($pCamposCondicion,$pValoresCondicion){
	$lista = '';
	for($i=0; $i<sizeof($pCamposCondicion); $i++){
		// adicionar comilla a lado y lado y luego unir a cadena
		$xvalor = "'%".$pValoresCondicion[$i]."%'";
		if($i==0){
			$lista = $lista.$pCamposCondicion[$i]." LIKE ".$xvalor;
		}else {
			$lista = $lista.' AND '.$pCamposCondicion[$i]." LIKE ".$xvalor;
		}
	}
	return $lista;
}

function listaActualizar($pCamposActualizar,$pValoresActualizar){
	$lista = '';
	for($i=0; $i<sizeof($pCamposActualizar); $i++){
		// adicionar comilla a lado y lado y luego unir a cadena
		$xvalor = "'".$pValoresActualizar[$i]."'";
		if($i==0){
			$lista = $lista.$pCamposActualizar[$i]."=".$xvalor;
		}else {
			$lista = $lista.', '.$pCamposActualizar[$i]."=".$xvalor;
		}
	}
	return $lista;
}

?>