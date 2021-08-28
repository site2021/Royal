<?php
    $colegio = $_REQUEST['colegio'];

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

    include '../../control/conex.php';
    //$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/safix"); 

    $consulta = "SELECT * FROM tblistageneralnew 
                 WHERE colegio = '$colegio' AND fechacreado!=''
                 ORDER BY convert(codigo,unsigned)";

    $stmt = mysqli_query($conexion, $consulta);
    //$ok   = oci_execute( $stmt );
    $ok = true;

    //if($resultado->num_rows > 0 ){
    //$cuantasFilas = oci_num_rows($stmt);

    if($ok == true){
                        
        date_default_timezone_set('America/Mexico_City');

        if (PHP_SAPI == 'cli')
            die('Este archivo solo se puede ver desde un navegador web');

        /** Se agrega la libreria PHPExcel */
        //require_once 'lib/PHPExcel/PHPExcel.php';
        require_once dirname(__FILE__) . '/libe/Classes/PHPExcel.php';

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();
        
        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
                             ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
                             ->setTitle("Reporte Excel con PHP y MySQL")
                             ->setSubject("Reporte Excel con PHP y MySQL")
                             ->setDescription("Reportes Comerciales")
                             ->setKeywords("reporte movimientos ventas")
                             ->setCategory("Reporte excel");    
        
        // adicion de logo royal ------------------------------------------------------
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath('royal001.jpg');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        // adicion de logo royal ------------------------------------------------------
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('LogoColegio');
        $objDrawing->setDescription('LogoColegio');
        $objDrawing->setPath('../logos/'.$colegio.'.jpg');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('N1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());        
        // ----------------------------------------------------------------------------
        
        $tituloReporte = "Cooperativa Royal Express";
        $subtituloReporte = "Listado Estudiantes Nuevos - ".$colegio;

        $titulosColumnas = array('No', 'FECHA CREADO', 'FECHA REGISTRO','CODIGO', 'NOMBRE', 'ESTADO','RECORRIDO', 'RUTA COMPLETA', 'RUTA AM','RUTA PM','DOS DIRECCIONES', 'TARIFA','DIAS RUTA','PAGO RUTA');
        
        // combinar filas de encabezado
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:N1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:N2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:C3');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('L3:M3');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('G3:I3');
        

        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',  $tituloReporte)
                    ->setCellValue('A2',  $subtituloReporte)
                    ->setCellValue('A3',  "Fecha: ".$ahora)             
                    ->setCellValue('L3',  "PAGO RUTA")               
                    ->setCellValue('A4',  $titulosColumnas[0])
                    ->setCellValue('B4',  $titulosColumnas[1])
                    ->setCellValue('C4',  $titulosColumnas[2])
                    ->setCellValue('D4',  $titulosColumnas[3])
                    ->setCellValue('E4',  $titulosColumnas[4])
                    ->setCellValue('F4',  $titulosColumnas[5])
                    ->setCellValue('G4',  $titulosColumnas[6])
                    ->setCellValue('H4',  $titulosColumnas[7])
                    ->setCellValue('I4',  $titulosColumnas[8])
                    ->setCellValue('J4',  $titulosColumnas[9])
                    ->setCellValue('K4',  $titulosColumnas[10])
                    ->setCellValue('L4',  $titulosColumnas[11])
                    ->setCellValue('M4',  $titulosColumnas[12])           
                    ->setCellValue('N4',  $titulosColumnas[13]);                
        
        //Se agregan los datos de la tabla
        $i = 5;        
        $indice = 1;
        while ($fila = mysqli_fetch_array($stmt)) {
            // FORMATO PARA SOLO TOMAR EL DIA Y EL MES 
            
            $fechadia = new DateTime($fila['fecha']);
            $diasalida = $fechadia->format('j');
            $formatomes = $fechadia->format('n');
            $tarifaruta1 = $fila['tarifavant'];
            $tarifaruta2 = $fila['tarifav'];
            //////////////////DIAS DE MARZO/////////////////////
            $dias_marzo = '31';
            $habiles_marzo = '22';
            //////////////////DIAS DE ABRIL/////////////////////
            $dias_abril = '30';
            $habiles_abril = '20';
            //////////////////DIAS DE MAYO/////////////////////
            $dias_mayo = '31';
            $habiles_mayo = '20';
            //////////////////DIAS DE JUNIO/////////////////////
            $dias_junio = '30';
            $habiles_junio = '20';
            //////////////////DIAS DE JULIO/////////////////////
            $dias_julio = '31';
            $habiles_julio = '20';
            //////////////////DIAS DE AGOSTO/////////////////////
            $dias_agosto = '31';
            $habiles_agosto = '21';
            //////////////////DIAS DE SEPTIEMBRE/////////////////
            $dias_septiembre = '30';
            $habiles_septiembre = '22';
            //////////////////DIAS DE OCTUBRE////////////////////
            $dias_octubre = '31';
            $habiles_octubre = '20';
            //////////////////DIAS DE NOVIEMBRE////////////////////
            $dias_noviembre = '30';
            $habiles_noviembre = '20';
            //////////////////DIAS DE DICIEMBRE////////////////////
            $dias_diciembre = '31';
            $habiles_diciembre = '22';

            ////////////// MARZO ////////////////////////////////////////
            if ($formatomes == '3' && $diasalida >=1 && $diasalida <=5){
                $ruta1 = ($diasalida);
                $ruta2 = (($dias_marzo - $diasalida)-9);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_marzo); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_marzo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if ($formatomes == '3' && $diasalida >=8 && $diasalida <=12){
                $ruta1 = ($diasalida - 2);
                $ruta2 = (($dias_marzo - $diasalida)-7);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_marzo); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_marzo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if ($formatomes == '3' && $diasalida >=15 && $diasalida <=19){
                $ruta1 = ($diasalida - 4);
                $ruta2 = (($dias_marzo - $diasalida)-5);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_marzo);
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_marzo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if ($formatomes == '3' && $diasalida >=23 && $diasalida <=26){
                $ruta1 = ($diasalida - 7);
                $ruta2 = (($dias_marzo - $diasalida)-2); 
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_marzo);
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_marzo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if ($formatomes == '3' && $diasalida >=29 && $diasalida <=31){
                $ruta1 = ($diasalida - 9);
                $ruta2 = ($dias_marzo - $diasalida);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_marzo);
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_marzo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }

            //////////////////////MES DE ABRIL////////////////////////
            else if($formatomes == '4' && $diasalida >=5 && $diasalida <=9){
                $ruta1 = ($diasalida - 4);
                $ruta2 = (($dias_abril - $diasalida)-6);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_abril); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_abril);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '4' && $diasalida >=12 && $diasalida <=16){
                $ruta1 = ($diasalida - 6);
                $ruta2 = (($dias_abril - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_abril); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_abril);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '4' && $diasalida >=19 && $diasalida <=23){
                $ruta1 = ($diasalida - 8);
                $ruta2 = (($dias_abril - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_abril); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_abril);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '4' && $diasalida >=26 && $diasalida <=30){
                $ruta1 = ($diasalida - 10);
                $ruta2 = ($dias_abril - $diasalida);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_abril); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_abril);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            ////////////////////// MES DE MAYO /////////////////////////
            else if($formatomes == '5' && $diasalida >=3 && $diasalida <=7){
                $ruta1 = ($diasalida - 2);
                $ruta2 = (($dias_mayo - $diasalida)-9);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_mayo); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_mayo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '5' && $diasalida >=10 && $diasalida <=14){
                $ruta1 = ($diasalida - 4);
                $ruta2 = (($dias_mayo - $diasalida)-6);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_mayo); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_mayo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '5' && $diasalida >=18 && $diasalida <=21){
                $ruta1 = ($diasalida - 7);
                $ruta2 = (($dias_mayo - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_mayo); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_mayo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '5' && $diasalida >=24 && $diasalida <=28){
                $ruta1 = ($diasalida - 9);
                $ruta2 = (($dias_mayo - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_mayo); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_mayo);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            ///////////////////////MES DE JUNIO//////////////////////
            else if($formatomes == '6' && $diasalida >=1 && $diasalida <=4){
                $ruta1 = $diasalida;
                $ruta2 = (($dias_junio - $diasalida)-10);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_junio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_junio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '6' && $diasalida >=8 && $diasalida <=11){
                $ruta1 = ($diasalida-3);
                $ruta2 = (($dias_junio - $diasalida)-7);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_junio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_junio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '6' && $diasalida >=15 && $diasalida <=18){
                $ruta1 = ($diasalida-6);
                $ruta2 = (($dias_junio - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_junio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_junio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '6' && $diasalida >=21 && $diasalida <=25){
                $ruta1 = ($diasalida-8);
                $ruta2 = (($dias_junio - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_junio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_junio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '6' && $diasalida >=28 && $diasalida <=30){
                $ruta1 = ($diasalida-10);
                $ruta2 = ($dias_junio - $diasalida);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_junio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_junio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            /////////////////////////MES DE JULIO ///////////////////////
            else if($formatomes == '7' && $diasalida >=1 && $diasalida <=2){
                $ruta1 = ($diasalida);
                $ruta2 = (($dias_julio - $diasalida)-10);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_julio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_julio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '7' && $diasalida >=5 && $diasalida <=9){
                $ruta1 = ($diasalida-2);
                $ruta2 = (($dias_julio - $diasalida)-8);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_julio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_julio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '7' && $diasalida >=12 && $diasalida <=16){
                $ruta1 = ($diasalida-4);
                $ruta2 = (($dias_julio - $diasalida)-6);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_julio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_julio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '7' && $diasalida >=19 && $diasalida <=19){
                $ruta1 = ($diasalida-6);
                $ruta2 = (($dias_julio - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_julio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_julio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '7' && $diasalida >=21 && $diasalida <=23){
                $ruta1 = ($diasalida-7);
                $ruta2 = (($dias_julio - $diasalida)-3);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_julio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_julio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '7' && $diasalida >=26 && $diasalida <=30){
                $ruta1 = ($diasalida-9);
                $ruta2 = (($dias_julio - $diasalida)-1);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_julio); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_julio);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            /////////////////////////MES DE AGOSTO//////////////////////////
            else if($formatomes == '8' && $diasalida >=2 && $diasalida <=6){
                $ruta1 = ($diasalida-1);
                $ruta2 = (($dias_agosto - $diasalida)-9);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_agosto); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_agosto);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '8' && $diasalida >=9 && $diasalida <=13){
                $ruta1 = ($diasalida-3);
                $ruta2 = (($dias_agosto - $diasalida)-7);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_agosto); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_agosto);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '8' && $diasalida >=17 && $diasalida <=20){
                $ruta1 = ($diasalida-6);
                $ruta2 = (($dias_agosto - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_agosto); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_agosto);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '8' && $diasalida >=23 && $diasalida <=27){
                $ruta1 = ($diasalida-8);
                $ruta2 = (($dias_agosto - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_agosto); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_agosto);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '8' && $diasalida >=30 && $diasalida <=31){
                $ruta1 = ($diasalida-10);
                $ruta2 = ($dias_agosto - $diasalida);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_agosto); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_agosto);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            //////////////////MES DE SEPTIEMBRE/////////////////////
            else if($formatomes == '9' && $diasalida >=1 && $diasalida <=3){
                $ruta1 = ($diasalida);
                $ruta2 = (($dias_septiembre - $diasalida)-8);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_septiembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_septiembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '9' && $diasalida >=6 && $diasalida <=10){
                $ruta1 = ($diasalida-2);
                $ruta2 = (($dias_septiembre - $diasalida)-6);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_septiembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_septiembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '9' && $diasalida >=13 && $diasalida <=17){
                $ruta1 = ($diasalida-4);
                $ruta2 = (($dias_septiembre - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_septiembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_septiembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '9' && $diasalida >=20 && $diasalida <=24){
                $ruta1 = ($diasalida-6);
                $ruta2 = (($dias_septiembre - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_septiembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_septiembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '9' && $diasalida >=27 && $diasalida <=30){
                $ruta1 = ($diasalida-8);
                $ruta2 = ($dias_septiembre - $diasalida);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_septiembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_septiembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            //////////////////////MES DE OCTUBRE /////////////////////////
            else if($formatomes == '10' && $diasalida >=1 && $diasalida <=1){
                $ruta1 = ($diasalida);
                $ruta2 = (($dias_octubre - $diasalida)-11);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_octubre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_octubre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '10' && $diasalida >=4 && $diasalida <=8){
                $ruta1 = ($diasalida-2);
                $ruta2 = (($dias_octubre - $diasalida)-9);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_octubre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_octubre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '10' && $diasalida >=11 && $diasalida <=15){
                $ruta1 = ($diasalida-4);
                $ruta2 = (($dias_octubre - $diasalida)-7);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_octubre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_octubre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '10' && $diasalida >=19 && $diasalida <=22){
                $ruta1 = ($diasalida-7);
                $ruta2 = (($dias_octubre - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_octubre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_octubre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '10' && $diasalida >=25 && $diasalida <=29){
                $ruta1 = ($diasalida-9);
                $ruta2 = (($dias_octubre - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_octubre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_octubre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            //////////////////////NOVIEMBRE/////////////////////////
            else if($formatomes == '11' && $diasalida >=2 && $diasalida <=5){
                $ruta1 = ($diasalida-1);
                $ruta2 = (($dias_noviembre - $diasalida)-9);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_noviembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_noviembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '11' && $diasalida >=8 && $diasalida <=12){
                $ruta1 = ($diasalida-3);
                $ruta2 = (($dias_noviembre - $diasalida)-7);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_noviembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_noviembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2); 
            }
            else if($formatomes == '11' && $diasalida >=16 && $diasalida <=19){
                $ruta1 = ($diasalida-6);
                $ruta2 = (($dias_noviembre - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_noviembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_noviembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '11' && $diasalida >=22 && $diasalida <=26){
                $ruta1 = ($diasalida-8);
                $ruta2 = (($dias_noviembre - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_noviembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_noviembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '11' && $diasalida >=29 && $diasalida <=30){
                $ruta1 = ($diasalida-10);
                $ruta2 = ($dias_noviembre - $diasalida);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_noviembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_noviembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            ////////////////////MES DE DICIEMBRE////////////////////////
            else if($formatomes == '12' && $diasalida >=1 && $diasalida <=3){
                $ruta1 = ($diasalida);
                $ruta2 = (($dias_diciembre - $diasalida)-9);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_diciembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_diciembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '12' && $diasalida >=6 && $diasalida <=7){
                $ruta1 = ($diasalida-2);
                $ruta2 = (($dias_diciembre - $diasalida)-7);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_diciembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_diciembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '12' && $diasalida >=9 && $diasalida <=10){
                $ruta1 = ($diasalida-3);
                $ruta2 = (($dias_diciembre - $diasalida)-6);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_diciembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_diciembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '12' && $diasalida >=13 && $diasalida <=17){
                $ruta1 = ($diasalida-5);
                $ruta2 = (($dias_diciembre - $diasalida)-4);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_diciembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_diciembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '12' && $diasalida >=20 && $diasalida <=24){
                $ruta1 = ($diasalida-7);
                $ruta2 = (($dias_diciembre - $diasalida)-2);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_diciembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_diciembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else if($formatomes == '12' && $diasalida >=27 && $diasalida <=31){
                $ruta1 = ($diasalida-9);
                $ruta2 = ($dias_diciembre - $diasalida);
                $pagoruta1 = (($tarifaruta1*$ruta1)/$habiles_diciembre); 
                $pagoruta2 = (($tarifaruta2*$ruta2)/$habiles_diciembre);
                $saldopendiente = ($tarifaruta1-$pagoruta1-$pagoruta2);
            }
            else{
                $ruta1 = '';
                $ruta2 = '';
                $pagoruta1 = '';
                $pagoruta2 = '';
                $saldopendiente = '';
            }

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $indice)
                    ->setCellValue('B'.$i,  $fila['fechacreado'])
                    ->setCellValue('C'.$i,  $fila['fecha'])
                    ->setCellValue('D'.$i,  $fila['codigo'])
                    ->setCellValue('E'.$i,  $fila['nombre'])
                    ->setCellValue('F'.$i,  $fila['estado'])
                    ->setCellValue('G'.$i,  $fila['recorrido'])
                    ->setCellValue('H'.$i,  $fila['ruta'])
                    ->setCellValue('I'.$i,  $fila['mrutaam'])
                    ->setCellValue('J'.$i,  $fila['mrutapm'])
                    ->setCellValue('K'.$i,  $fila['ruta2da'])
                    ->setCellValue('L'.$i,  $fila['tarifav'])
                    ->setCellValue('M'.$i,  $ruta2)
                    ->setCellValue('N'.$i,  $pagoruta2);
                    $i++;

            $indice = $indice + 1;

        }
        
        $estiloTituloReporte = array(
            'font' => array(
                'name'      => 'Verdana',
                'bold'      => true,
                'italic'    => false,
                'strike'    => false,
                'size' =>16,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
            ),
            'fill' => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => 'F088A08')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_NONE                    
                )
            ), 
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'          => TRUE
            )
        );

        $estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => '088A08'
                ),
                'endcolor'   => array(
                    'argb' => 'F0dd90d'
                )
            ),
            'borders' => array(
                'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => FALSE
            ));



        //OTRO COLOR NARANJA OSCURO PARA TITULO
        $estiloTituloColumnas2 = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => 'FA8F1C'
                ),
                'endcolor'   => array(
                    'argb' => 'FA8F1C'
                )
            ),
            'borders' => array(
                'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => FALSE
        ));

        //OTRO COLOR VERDE CLARO OSCURO PARA TITULO
        $estiloTituloColumnas3 = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => '66EA66'
                ),
                'endcolor'   => array(
                    'argb' => '66EA66'
                )
            ),
            'borders' => array(
                'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => FALSE
        ));
            
        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray(
            array(
                'font' => array(
                'name'      => 'Arial',               
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                'color'     => array('argb' => 'Fd0fbd0')
            ),
            'borders' => array(
                'left'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => 'FFD9B3'
                    )
                )             
            )
        ));
        //NARANJA CLARO
        $estiloInformacion2 = new PHPExcel_Style();
        $estiloInformacion2->applyFromArray(
            array(
                'font' => array(
                'name'      => 'Arial',               
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                'color'     => array('argb' => 'FFCF9E')
            ),
            'borders' => array(
                'left'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => 'FFCF9E'
                    )
                )             
            )
        ));

        $estiloInformacion3 = new PHPExcel_Style();
        $estiloInformacion3->applyFromArray(
            array(
                'font' => array(
                'name'      => 'Arial',               
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                'color'     => array('argb' => 'D1FFB9')
            ),
            'borders' => array(
                'left'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => 'D1FFB9'
                    )
                )             
            )
        ));
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:L2')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A4:L4')->applyFromArray($estiloTituloColumnas);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:L".($i-1));

        //OTRO CPOLOR NARANJA
        $objPHPExcel->getActiveSheet()->getStyle('L4:N4')->applyFromArray($estiloTituloColumnas2);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "L5:N".($i-1));       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "L3:N3");

        //OTRO COLOR VERDE CLARO
        $objPHPExcel->getActiveSheet()->getStyle('R4:M4')->applyFromArray($estiloTituloColumnas3);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion3, "R5:M".($i-1));       
        // $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "L3:Q3");

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('F5:M'.$i)->getNumberFormat()
        ->setFormatCode('#,###');

                
        for($i = 'A'; $i <= 'K'; $i++){
            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(TRUE);
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Reporte');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,5);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="EstudiantesNuevos.xlsx"');
        header('Cache-Control: max-age=0');

        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

        exit;
        
    }
    else{
        print_r('No hay resultados para mostrar');
    }
?>