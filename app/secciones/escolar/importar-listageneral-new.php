<!-- http://ProgramarEnPHP.wordpress.com -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Importar de Excel a la Base de Datos ::</title>
</head>

<body>
<!-- FORMULARIO PARA SOICITAR LA CARGA DEL EXCEL -->
IMPORTAR - Lista General<br>
Selecciona el archivo a importar:
<form name="importa" method="post" action="<?php echo $PHP_SELF; ?>" enctype="multipart/form-data" >
<input type="file" name="excel" />
<input type='submit' name='enviar'  value="Importar"  />
<input type="hidden" value="upload" name="action" />
</form>

<!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->

<?php 
extract($_POST);
if ($action == "upload"){
//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 
	$archivo = $_FILES['excel']['name'];
	$tipo = $_FILES['excel']['type'];
	$destino = "bak_".$archivo;
	if (copy($_FILES['excel']['tmp_name'],$destino)) echo "Archivo Cargado Con Éxito";
	else echo "Error Al Cargar el Archivo";
////////////////////////////////////////////////////////
if (file_exists ("bak_".$archivo)){ 
/** Clases necesarias */
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Reader/Excel2007.php');

include '../../control/conex.php';

// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("bak_".$archivo);
$objFecha = new PHPExcel_Shared_Date();       

// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);

//conectamos con la base de datos 
//$cn = mysql_connect ($server, $user, $pass) or die ("ERROR EN LA CONEXION");
//$db = mysql_select_db ($bd, $cn) or die ("ERROR AL CONECTAR A LA BD");

        // Llenamos el arreglo con los datos  del archivo xlsx
for ($i=2;
	$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()!='';
	$i++){
	$_DATOS_EXCEL[$i]['colegio'] 		= $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['fecha'] 			= $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['codigo'] 		= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['estado'] 		= $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['grado'] 			= $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['nombre'] 		= $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['direccion'] 		= $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['barrio'] 		= $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['comuna'] 		= $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['ciudad'] 		= $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['direccion2'] 	= $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['barrio2'] 		= $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['comuna2'] 		= $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['ciudad2'] 		= $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['telefono'] 		= $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['celular1'] 		= $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['celular2'] 		= $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['nombreacudiente']= $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['cedula'] 		= $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['email'] 			= $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['observaciones'] 	= $objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();

/*		
	$_DATOS_EXCEL[$i]['recorrido'] 		= $objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['tarifav'] 		= $objPHPExcel->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['tarifabl'] 		= $objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['tarifaaso'] 		= $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['ruta'] 			= $objPHPExcel->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['ruta2da'] 		= $objPHPExcel->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['mrutaam'] 		= $objPHPExcel->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['mrutapm'] 		= $objPHPExcel->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue();

*/

	}
	
}
//si por algo no cargo el archivo bak_ 
else{echo "Necesitas primero importar el archivo";}
$errores=0;
//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD
$indice=1;
foreach($_DATOS_EXCEL as $campo => $valor){	

	$sql = "INSERT INTO tblistageneralnew (";
	foreach ($valor as $campo2 => $valor2){
		if ($campo2 == "observaciones"){
			$sql.= $campo2.") VALUES (";
		}	
		else { 
			$sql.= $campo2.",";
		}	
	}
	foreach ($valor as $campo2 => $valor2){
		if ($campo2 == "observaciones"){
			$sql.= "'".$valor2."');";
		} else {
			$sql.= "'".$valor2."',";
		} 	
	}
	
	//echo $sql;
	
	$result = mysqli_query($conexion,$sql);
	if (!$result){ echo "Error al insertar registro ".$campo;$errores+=1;}
	$indice=$indice+1;
	
}	

echo "<strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campo REGISTROS Y $errores ERRORES</center></strong>";
//una vez terminado el proceso borramos el 
//archivo que esta en el servidor el bak_
unlink($destino);
}

?>
</body>
</html>