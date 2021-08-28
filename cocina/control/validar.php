<?php
include('conex.php');
if (isset($_POST['login'])) {
	//VARIABLES DEL USUARIO
$usuario = $_POST['txtusuario'];
$clave = $_POST['txtpass'];
$perfil = $_POST['txtperfil'];
//VALIDAR CONTENIDO EN LAS VARIABLES O CAJAS DE TEXTO
if (empty($usuario) | empty($clave) | empty($perfil)) 
	{
	header("Location: ../index.html");
	exit();
	}
//VALIDANDO EXISTENCIA DEL USUARIO
$sql = mysqli_query("SELECT * from tbestudiantes where usuario = '$usuario' and clave = '$clave' and perfil = '$perfil' ");

if ($row = mysqli_fetch_array($sql)){

	if($perfil == '00'){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../perfil.php");
	}
	elseif($perfil == '02'){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../perfil2.php");
	}
	elseif($perfil == '03'){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../perfil3.php");
	}
	elseif($perfil == '04'){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../perfil4.php");
	}
	elseif($perfil == '05'){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../perfil5.php");
	}
	elseif($perfil == '06'){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: ../perfil6.php");
	}

}else{
	header("Location: ../pages/iniciar_sesion.php");
	exit();
	}
}
?>