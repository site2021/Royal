<?php
    $suc = $_GET['sede'];
    $anno = $_GET['anno'];

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

    $conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/SAFIX"); 


    $sql = "SELECT NMES, CALI, DOSQ, MEDE FROM INTRA_VENTAS_SEDE_2016"; 
    $campos = array('NMES','CALI','DOSQ','MEDE');

    

	// $resultado = $conexion->query($consulta);
    $stmt = oci_parse($conn, $sql);
    $ok   = oci_execute( $stmt );

    //if($resultado->num_rows > 0 ){
    $cuantasFilas = oci_num_rows($stmt);
	if($ok == true){
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once '../comercial/lib/PHPExcel/PHPExcel.php';

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
        $objDrawing->setPath('images/logomaxtrans.png');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        // ----------------------------------------------------------------------------

		$tituloReporte = "RG distribuciones S.A. ";
        $subtituloReporte = "Ventas Mensuales x sede ";

		$titulosColumnas = array('MES', 'CALI', 'DOSQ' ,'MEDE');
		
        // combinar filas de encabezado
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:M1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:M2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:M3');
		

		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',  $tituloReporte)
                    ->setCellValue('A2',  $subtituloReporte)
                    ->setCellValue('A3',  "Fecha: ".$ahora)                    
        		    ->setCellValue('A4',  $titulosColumnas[0])
		            ->setCellValue('B4',  $titulosColumnas[1])
        		    ->setCellValue('C4',  $titulosColumnas[2])
            		->setCellValue('D4',  $titulosColumnas[3]);            		
		
		//Se agregan los datos de la tabla
		$i = 5;
        
		while ($fila = oci_fetch_array($stmt)) {

            $col = 0;
            //echo 'columna:'.chr($columna+64).'<br>';

            for($c=0;$c<sizeof($campos);$c++){
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($c+65).$i,  $fila[$campos[$c]]);                        
            }            

            /*$objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  '="'.$fila['NMES'].'"')
        		    ->setCellValue('B'.$i,  $fila['CALI'])
		            ->setCellValue('C'.$i,  $fila['DOSQ'])
        		    ->setCellValue('D'.$i,  $fila['MEDE']);*/


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
				'color'	=> array('argb' => 'FFEF3C39')
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
            		'rgb' => 'F5A9A9'
        		),
        		'endcolor'   => array(
            		'argb' => 'FFEF3C39'
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
				'color'		=> array('argb' => 'FFF6CECE')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => 'F6CECE'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:N2')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A4:N4')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:N".($i-1));

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('B5:N'.$i)->getNumberFormat()
        ->setFormatCode('#,###');

				
		for($i = 'A'; $i <= 'N'; $i++){
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
		header('Content-Disposition: attachment;filename="ReportesComerciales.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>