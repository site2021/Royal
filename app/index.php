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
	else if ( $_GET['action'] == 'estudiantecontrato' ){
			$indice->estudiantecontrato($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'datosveh' ){
			$indice->datosveh($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'datosvehcliente' ){
			$indice->datosvehcliente($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'mantenimientos' ){
			$indice->mantenimientos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'encuestacovid' ){
			$indice->encuestacovid($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'empresacovid' ){
			$indice->empresacovid($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'empresacovid2' ){
			$indice->empresacovid2($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'condsaludliceo' ){
			$indice->condsaludliceo($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'mantenimientoscliente' ){
			$indice->mantenimientoscliente($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'infovehiculos' ){
			$indice->infovehiculos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'infoconductores' ){
			$indice->infoconductores($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'datos' ){
			$indice->datos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'vehiculos' ){
			$indice->vehiculos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'vehiculosrt' ){
			$indice->vehiculosrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'vehiculosg3' ){
			$indice->vehiculosg3($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'pqautomotorg3' ){
			$indice->pqautomotorg3($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'pqautomotorrt' ){
			$indice->pqautomotorrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'pqautomotorre' ){
			$indice->pqautomotorre($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'contratos' ){
			$indice->contratos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'contratosrt' ){
			$indice->contratosrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'contratosg3' ){
			$indice->contratosg3($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'contradigitalg3' ){
			$indice->contradigitalg3($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'contradigitalrt' ){
			$indice->contradigitalrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'contradigitalre' ){
			$indice->contradigitalre($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'extractos' ){
			$indice->extractos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'extractosrt' ){
			$indice->extractosrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'extractosg3' ){
			$indice->extractosg3($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'rutas_extractos' ){
			$indice->rutas_extractos($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'rutas_extractosg3' ){
			$indice->rutas_extractosg3($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'colaboracion_empresarial' ){
			$indice->colaboracion_empresarial($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'colaboracion_empresarialrt' ){
			$indice->colaboracion_empresarialrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'colaboracion_empresarialg3' ){
			$indice->colaboracion_empresarialg3($qusuario,$qnombre,$qperfil);
	}
	// else if ( $_GET['action'] == 'vehiculostour' ){
	// 		$indice->vehiculostour($qusuario,$qnombre,$qperfil);
	// }
	// else if ( $_GET['action'] == 'contratostour' ){
	// 		$indice->contratostour($qusuario,$qnombre,$qperfil);
	// }
	// else if ( $_GET['action'] == 'extractostour' ){
	// 		$indice->extractostour($qusuario,$qnombre,$qperfil);
	// }
	// else if ( $_GET['action'] == 'rutas_extractostour' ){
	// 		$indice->rutas_extractostour($qusuario,$qnombre,$qperfil);
	// }
	// else if ( $_GET['action'] == 'colaboracion_empresarialtour' ){
	// 		$indice->colaboracion_empresarialtour($qusuario,$qnombre,$qperfil);
	// }
	else if ( $_GET['action'] == 'conductores' ){
			$indice->conductores($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'conductoresrt' ){
			$indice->conductoresrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'conductoresg3' ){
			$indice->conductoresg3($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'personalrt' ){
			$indice->personalrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'accidentesrt' ){
			$indice->accidentesrt($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'reconocruta' ){
			$indice->reconocruta($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'estrategico' ){
			$indice->estrategico($qusuario,$qnombre,$qperfil);
	}		
	else if ( $_GET['action'] == 'tarifas' ){
			$indice->tarifas($qusuario,$qnombre,$qperfil);
	}
	else if ( $_GET['action'] == 'certificados' ){
			$indice->certificados($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'ventas' ){
			$indice->ventas($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'ventasrt' ){
			$indice->ventasrt($qusuario,$qnombre,$qperfil);
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
	else if ( $_GET['action'] == 'clientesrt' ){
			$indice->clientesrt($qusuario,$qnombre,$qperfil);
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
	else if ( $_GET['action'] == 'principalg3' ){
			$indice->principalg3($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'principalcheq' ){
			$indice->principalcheq($qusuario,$qnombre,$qperfil);
	}	
	else if ( $_GET['action'] == 'principalempresa' ){
			$indice->principalempresa($qusuario,$qnombre,$qperfil);
	}		
	// else if ( $_GET['action'] == 'principalgimpereira' ){
	// 		$indice->principalgimpereira($qusuario,$qnombre,$qperfil);
	// }		
	else if ( $_GET['action'] == 'principaltrekking' ){
			$indice->principaltrekking($qusuario,$qnombre,$qperfil);
	}		
	else if ( $_GET['action'] == 'registrochequeate' ){
			$indice->registrochequeate($qusuario,$qnombre,$qperfil);
	}			
	else if ( $_GET['action'] == 'registrosempresa' ){
			$indice->registrosempresa($qusuario,$qnombre,$qperfil);
	}			
	else if ( $_GET['action'] == 'registrosgimpereira' ){
			$indice->registrosgimpereira($qusuario,$qnombre,$qperfil);
	}			
	else if ( $_GET['action'] == 'registrospinoverde' ){
			$indice->registrospinoverde($qusuario,$qnombre,$qperfil);
	}				
	else if ( $_GET['action'] == 'registrossalle' ){
			$indice->registrossalle($qusuario,$qnombre,$qperfil);
	}					
	else if ( $_GET['action'] == 'regcolgimpereira' ){
			$indice->regcolgimpereira($qusuario,$qnombre,$qperfil);
	}					
	else if ( $_GET['action'] == 'registroshillside' ){
			$indice->registroshillside($qusuario,$qnombre,$qperfil);
	}					
	else if ( $_GET['action'] == 'registrosempresa8' ){
			$indice->registrosempresa8($qusuario,$qnombre,$qperfil);
	}						
	else if ( $_GET['action'] == 'registrosempresa9' ){
			$indice->registrosempresa9($qusuario,$qnombre,$qperfil);
	}							
	else if ( $_GET['action'] == 'registrosempresa10' ){
			$indice->registrosempresa10($qusuario,$qnombre,$qperfil);
	}			
	else if ( $_GET['action'] == 'registrostrekking' ){
			$indice->registrostrekking($qusuario,$qnombre,$qperfil);
	}	
	else {
		if($qperfil ==05){

			$indice->principalg3($qusuario,$qnombre,$qperfil);
		}
		else if ($qperfil == 06) {
			
			$indice->principalcheq($qusuario,$qnombre,$qperfil);
		}
		// else if ($qperfil == '07' || $qperfil == '08' || $qperfil == '09' || $qperfil == '10' || $qperfil == '11' || $qperfil == '12' || $qperfil == '13' || $qperfil == '14' || $qperfil == '15' || $qperfil == '16') {
			
		// 	$indice->principalempresa($qusuario,$qnombre,$qperfil);
		// }

		else if ($qperfil == '07' || $qperfil == '08' || $qperfil == '09' || $qperfil == '10' || $qperfil == '11' || $qperfil == '12' || $qperfil == '13') {
			
			$indice->principalempresa($qusuario,$qnombre,$qperfil);
		}

		// else if ($qperfil == 08) {
			
		// 	$indice->principalempresa($qusuario,$qnombre,$qperfil);
		// }
		// else if ($qperfil == 09) {
			
		// 	$indice->principalempresa3($qusuario,$qnombre,$qperfil);
		// }
		else if ($qusuario!=''){
			$indice->principal($qusuario,$qnombre,$qperfil);	
		}
	}

?>