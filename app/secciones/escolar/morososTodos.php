<?php
    ini_set ('memory_limit', '-1');
    set_time_limit(300);
    $colegio = $_REQUEST['colegio'];
    $mes = $_REQUEST['mes'];    

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

    include '../../control/conex.php';
    //$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/safix"); 

    $consulta = "SELECT * FROM tbdatosliquidar WHERE colegio='$colegio' ORDER BY nombre";

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
        
        // adicion de logo ------------------------------------------------------------
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath('royal001.jpg');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        // ----------------------------------------------------------------------------

		$tituloReporte = "Cooperativa Royal Express";
        $subtituloReporte = "Listado Morosos - ".$colegio.' - '.$mes;

		// $titulosColumnas = array('COLEGIO', 'FECHA PADO', 'CODIGO', 'NOMBRE', 'RECORRIDO', 'RUTA', 'GRADO', 'TARIFABL', 'PAGO', 'DIFERENCIA', 'MES');

        $titulosColumnas = array('CODIGO', 'NOMBRE', 'GRADO','RECORRIDO', 'RUTA', 'TARIFABL', 'FECHA PAGO', 'PAGO', 'DIFERENCIA', 'MES', 'OBERVACIONES');
		
        // combinar filas de encabezado
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:K1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:K2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:K3');
		

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
            		->setCellValue('K4',  $titulosColumnas[10]);         		
		
		//Se agregan los datos de la tabla
		$i = 5;        

		while ($fila = mysqli_fetch_array($stmt)) {
			$objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $fila['codigo'])
        		    ->setCellValue('B'.$i,  $fila['nombre'])
		            ->setCellValue('C'.$i,  $fila['grado'])
                    ->setCellValue('D'.$i,  $fila['recorrido'])
                    ->setCellValue('E'.$i,  $fila['ruta'])
                    ->setCellValue('F'.$i,  $fila['tarifabl'])
                    ->setCellValue('G'.$i,  $fila['fechapago'])
                    ->setCellValue('H'.$i,  $fila['pago'])
                    ->setCellValue('I'.$i,  $fila['diferencia'])
                    ->setCellValue('J'.$i,  $fila['mes'])                    
                    ->setCellValue('K'.$i,  $fila['observacion']);
					$i++;
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
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:K2')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A4:K4')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:K".($i-1));

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('F5:K'.$i)->getNumberFormat()
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
		header('Content-Disposition: attachment;filename="ReporteMorosos.xlsx"');
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