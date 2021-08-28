<?php
    date_default_timezone_set('america/bogota');
    setlocale(LC_ALL,”es_ES”);

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

 include '../../control/conex.php';
    //$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/safix"); 

    $consulta = "SELECT * FROM tbvehiculos";

    $stmt = mysqli_query($conexion, $consulta);
    //$ok   = oci_execute( $stmt );
    $ok = true;

    //if($resultado->num_rows > 0 ){
    //$cuantasFilas = oci_num_rows($stmt);

	if($ok == true){
						
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
        $objDrawing->setPath('img/royal001.jpg');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());      
        // ----------------------------------------------------------------------------

		$tituloReporte = "Cooperativa Royal Express";
        $subtituloReporte = "Vehiculos ";

		$titulosColumnas = array('INT', 'PLACA', 'TIPO VINCULACION', 'EMPRESA AFILIADORA', 'LICENCIA', 'CAPACIDAD', 'MARCA' ,'MOTOR' ,'MODELO', 'CILINDRAJE' ,'COLOR' ,'CLASE' ,'CARROCERIA', 'COMBUSTIBLE' ,'CHASIS' ,'INICIO SOAT' ,'FIN SOAT' , 'INICIO TECNICO MECANICA' ,'FIN TECNICO MECANICA' ,'TARJETA OPERACION' ,'INICIO TARJETA OPERACION' ,'FIN TARJETA OPERACION' ,'INICIO POLIZA CONTRACTUAL' ,'FIN POLIZA CONTRACTUAL' ,'INICIO POLIZA EXTRACONTRACTUAL' ,'FIN POLIZA EXTRACONTRACTUAL' ,'INICIO PREVENTIVA' ,'FIN PREVENTIVA' ,'PROPIETARIO');
		
        // combinar filas de encabezado
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:AC1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:AC2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:AC3');
		

		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',  $tituloReporte)
                    ->setCellValue('A2',  $subtituloReporte)
                    ->setCellValue('A3',  "Fecha: ".$ahora)                    
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
                    ->setCellValue('N4',  $titulosColumnas[13])               
                    ->setCellValue('O4',  $titulosColumnas[14])       
                    ->setCellValue('P4',  $titulosColumnas[15])                
                    ->setCellValue('Q4',  $titulosColumnas[16])                
                    ->setCellValue('R4',  $titulosColumnas[17])                
                    ->setCellValue('S4',  $titulosColumnas[18])                
                    ->setCellValue('T4',  $titulosColumnas[19])                
                    ->setCellValue('U4',  $titulosColumnas[20])                
                    ->setCellValue('V4',  $titulosColumnas[21])                
                    ->setCellValue('W4',  $titulosColumnas[22])             
                    ->setCellValue('X4',  $titulosColumnas[23])                
                    ->setCellValue('Y4',  $titulosColumnas[24])                
                    ->setCellValue('Z4',  $titulosColumnas[25])          
                    ->setCellValue('AA4',  $titulosColumnas[26])               
                    ->setCellValue('AB4',  $titulosColumnas[27])             
                    ->setCellValue('AC4',  $titulosColumnas[28]);         		
		
		//Se agregan los datos de la tabla
		$i = 5;        
        $indice = 1;
		while ($fila = mysqli_fetch_array($stmt)) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['interno'])
		            ->setCellValue('B'.$i,  $fila['placa'])
                    ->setCellValue('C'.$i,  $fila['tipovinculacion'])
                    ->setCellValue('D'.$i,  $fila['empresaafiliadora'])
                    ->setCellValue('E'.$i,  $fila['licencia'])
                    ->setCellValue('F'.$i,  $fila['capacidad'])
                    ->setCellValue('G'.$i,  $fila['marca'])
                    ->setCellValue('H'.$i,  $fila['motor'])
                    ->setCellValue('I'.$i,  $fila['modelo'])
                    ->setCellValue('J'.$i,  $fila['cilindraje'])
                    ->setCellValue('K'.$i,  $fila['color'])
                    ->setCellValue('L'.$i,  $fila['clase'])
                    ->setCellValue('M'.$i,  $fila['carroceria'])
                    ->setCellValue('N'.$i,  $fila['combustible'])
                    ->setCellValue('O'.$i,  $fila['chasis'])
                    ->setCellValue('P'.$i,  $fila['iniciosoat'])
                    ->setCellValue('Q'.$i,  $fila['finsoat'])
                    ->setCellValue('R'.$i,  $fila['iniciotecmecanica'])
                    ->setCellValue('S'.$i,  $fila['fintecmecanica'])
                    ->setCellValue('T'.$i,  $fila['tarjetaoperacion'])
                    ->setCellValue('U'.$i,  $fila['iniciotarjetaoperacion'])
                    ->setCellValue('V'.$i,  $fila['fintarjetaoperacion'])
                    ->setCellValue('W'.$i,  $fila['iniciopolizacontrac'])
                    ->setCellValue('X'.$i,  $fila['finpolizacontrac'])
                    ->setCellValue('Y'.$i,  $fila['iniciopolizaextra'])
                    ->setCellValue('Z'.$i,  $fila['finpolizaextra'])
                    ->setCellValue('AA'.$i,  $fila['iniciopreventiva'])
                    ->setCellValue('AB'.$i,  $fila['finpreventiva'])
                    ->setCellValue('AC'.$i,  $fila['propietario']);
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
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'F088A08')
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
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
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
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'Fd0fbd0')
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
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:AC2')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A4:AC4')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:AC".($i-1));

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('F5:AC'.$i)->getNumberFormat()
        ->setFormatCode('#,###');

				
		for($i = 'A'; $i <= 'AC'; $i++){
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
		header('Content-Disposition: attachment;filename="Vehiculos.xlsx"');
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