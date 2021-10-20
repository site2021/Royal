<?php

	require 'control/corIndice.php';
	
	include 'control/conex.php';
	
	$qusuario=$_GET['usuario'];
	$qnombre=$_GET['nombre'];
	$qestado=$_GET['estado'];
	$qperfil=$_GET['perfil'];
	
	//Creamos la conexi�n
	$conexion = mysqli_connect($server,$user,$pass,$bd) 
	or die("Ha sucedido un error inexperado en la conexion de la base de datos");

	//generamos la consulta
	$sql = "UPDATE tbusuarios SET estado=".$qestado." WHERE usuario='".$qusuario."'";
	$result = mysqli_query($conexion, $sql);	

	/*	
	session_start();
	if(isset($_GET['usuario'])){		
		$_SESSION['nickname']=$_GET['usuario'];
		$_SESSION['usuario']=$_GET['usuario'];		
		$_SESSION['nombre']=$_GET['nombre'];
		$_SESSION['perfil']=$_GET['perfil'];
	}	
	
	if($_SESSION['nickname']){		
		$qusuario=$_SESSION['usuario'];		
		$qnombre=$_SESSION['nombre'];
		$qperfil=$_SESSION['perfil'];		
	}

	*/

	$indice = new clsIndice();
	
	if ( $_GET['action'] == 'usuarios'){
		$indice->usuarios($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'alistamientos' ){
			$indice->alistamientos($qusuario,$qnombre,$qperfil);
	}		
	else if ( $_GET['action'] == 'rutasliquidar' ){
			$indice->rutasliquidar($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'datosliquidar' ){
			$indice->datosliquidar($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'listageneral' ){
			$indice->listageneral($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'datosveh' ){
			$indice->datosveh($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'datos' ){
			$indice->datos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'estrategico' ){
			$indice->estrategico($qusuario,$qnombre,$qperfil);
	}		
	else if ( $_GET['action'] == 'tarifas' ){
			$indice->tarifas($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'ventas' ){
			$indice->ventas($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'asociados' ){
			$indice->asociados($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'importarTer' ){
			$indice->importarTer($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'importarMov' ){
			$indice->importarMov($qusuario,$qnombre,$qperfil);
	}					
	else if ( $_GET['action'] == 'odometro' ){
			$indice->odometro($qusuario,$qnombre,$qperfil);
	}			
	else if ( $_GET['action'] == 'pingpong' ){
			$indice->pingpong($qusuario,$qnombre,$qperfil);
	}		
	else if ( $_GET['action'] == 'puzzle' ){
			$indice->puzzle($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'excel' ){
			$indice->excel($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'grilla00' ){
			$indice->grilla00($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'perfiles' ){
			$indice->perfiles($qusuario,$qnombre,$qperfil);
	}							
	else if ( $_GET['action'] == 'clientes' ){
			$indice->clientes($qusuario,$qnombre,$qperfil);
	}						
	else if ( $_GET['action'] == 'importar' ){
			$indice->importar($qusuario,$qnombre,$qperfil);
	}					
	else if ( $_GET['action'] == 'maestras' ){
			$indice->maestras($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'dynamic' ){
			$indice->dynamic($qusuario,$qnombre,$qperfil);
	}					
	else if ( $_GET['action'] == 'logistico_basic' ){
			$indice->logistico_basic($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'logistico_double' ){
			$indice->logistico_double($qusuario,$qnombre,$qperfil);
	}	
	else {
		if ($qusuario!=''){
			$indice->principal($qusuario,$qnombre,$qperfil);	
		}
	}

?>