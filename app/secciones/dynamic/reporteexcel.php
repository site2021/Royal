<?php
    $conexion = new mysqli('localhost','root','hector','gcsys',3306);
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}

	$consulta = "SELECT * FROM timovimientos";

	$resultado = $conexion->query($consulta);
	if($resultado->num_rows > 0 ){
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once 'lib/PHPExcel/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
							 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel con PHP y MySQL")
							 ->setSubject("Reporte Excel con PHP y MySQL")
							 ->setDescription("Reporte de alumnos")
							 ->setKeywords("reporte alumnos carreras")
							 ->setCategory("Reporte excel");

		$nombreEmpresa = "GC-SYSTEM";
        $temaEmpresa = "somos los de los datos";
        $tituloReporte = "REPORTE DE MOVIMIENTOS";

		$titulosColumnas = array('empresa_codigo','documento','numero','fecha_documento','fecha_vence',
            'referencia_articulo','descripcion','cantidad','valor_venta','porc_descto','porc_iva','valor',
            'nit_cliente','dv','codigo_vendedor','nombre_vendedor','valor_mv','vr_excluido','vr_exento',
            'vr_dscto_gravado','vr_gravado','vr_dscto_excento','vr_iva','vr_retencion','vr_fletes','vr_Seguro',
            'vr_Otros','concepto','ccosto','su','valor_mv_otro','pedido_encabeza');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:AF1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:AF2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:AF3');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$nombreEmpresa)
                    ->setCellValue('A2',$temaEmpresa)
                    ->setCellValue('A3',$tituloReporte)
        		    ->setCellValue('A5',  $titulosColumnas[0])
		            ->setCellValue('B5',  $titulosColumnas[1])
                    ->setCellValue('C5',  $titulosColumnas[2])
                    ->setCellValue('D5',  $titulosColumnas[3])
                    ->setCellValue('E5',  $titulosColumnas[4])
                    ->setCellValue('F5',  $titulosColumnas[5])
                    ->setCellValue('G5',  $titulosColumnas[6])
                    ->setCellValue('H5',  $titulosColumnas[7])
                    ->setCellValue('I5',  $titulosColumnas[8])
                    ->setCellValue('J5',  $titulosColumnas[9])
                    ->setCellValue('K5',  $titulosColumnas[10])
                    ->setCellValue('L5',  $titulosColumnas[11])
                    ->setCellValue('M5',  $titulosColumnas[12])
        		    ->setCellValue('N5',  $titulosColumnas[13])
                    ->setCellValue('O5',  $titulosColumnas[14])
                    ->setCellValue('P5',  $titulosColumnas[15])
                    ->setCellValue('Q5',  $titulosColumnas[16])
                    ->setCellValue('R5',  $titulosColumnas[17])
                    ->setCellValue('S5',  $titulosColumnas[18])
                    ->setCellValue('T5',  $titulosColumnas[19])
                    ->setCellValue('U5',  $titulosColumnas[20])
                    ->setCellValue('V5',  $titulosColumnas[21])
                    ->setCellValue('W5',  $titulosColumnas[22])
                    ->setCellValue('X5',  $titulosColumnas[23])
                    ->setCellValue('Y5',  $titulosColumnas[24])                    
                    ->setCellValue('Z5',  $titulosColumnas[25])
                    ->setCellValue('AA5', $titulosColumnas[26])
                    ->setCellValue('AB5', $titulosColumnas[27])
                    ->setCellValue('AC5', $titulosColumnas[28])
                    ->setCellValue('AD5', $titulosColumnas[29])
                    ->setCellValue('AE5', $titulosColumnas[30])
                    ->setCellValue('AF5', $titulosColumnas[31]);


		//Se agregan los datos de los alumnos
		$i = 6;
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['empresa_codigo'])
		            ->setCellValue('B'.$i,  $fila['documento'])
        		    ->setCellValue('C'.$i,  $fila['numero'])
                    ->setCellValue('D'.$i,  $fila['fecha_documento'])
                    ->setCellValue('E'.$i,  $fila['fecha_vence'])
                    ->setCellValue('F'.$i,  $fila['referencia_articulo'])
                    ->setCellValue('G'.$i,  $fila['descripcion'])
                    ->setCellValue('H'.$i,  $fila['cantidad'])
                    ->setCellValue('I'.$i,  $fila['valor_venta'])
                    ->setCellValue('J'.$i,  $fila['porc_descto'])
                    ->setCellValue('K'.$i,  $fila['porc_iva'])
                    ->setCellValue('L'.$i,  $fila['valor'])
                    ->setCellValue('M'.$i,  $fila['nit_cliente'])
                    ->setCellValue('N'.$i,  $fila['dv'])
                    ->setCellValue('O'.$i,  $fila['codigo_vendedor'])
                    ->setCellValue('P'.$i,  $fila['nombre_vendedor'])
                    ->setCellValue('Q'.$i,  $fila['valor_mv'])
                    ->setCellValue('R'.$i,  $fila['vr_excluido'])
                    ->setCellValue('S'.$i,  $fila['vr_exento'])
                    ->setCellValue('T'.$i,  $fila['vr_dscto_gravado'])
                    ->setCellValue('U'.$i,  $fila['vr_gravado'])
                    ->setCellValue('V'.$i,  $fila['vr_dscto_excento'])
                    ->setCellValue('W'.$i,  $fila['vr_iva'])
                    ->setCellValue('X'.$i,  $fila['vr_retencion']);
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
				'color'	=> array('rgb' => '0000FF')
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

        $estiloSubtituloReporte = array(
            'font' => array(
                'name'      => 'Verdana',
                'bold'      => true,
                'italic'    => false,
                'strike'    => false,
                'size' =>10,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
            ),
            'fill' => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '0000FF')
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
            		'rgb' => '0000FF'
        		),
        		'endcolor'   => array(
            		'rgb' => 'FFFFFF'
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
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
				'color'		=> array('rgb' => 'ccccff')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	)
        ));
		 
        $objPHPExcel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:N3')->applyFromArray($estiloSubtituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A5:AF5')->applyFromArray($estiloTituloColumnas);	
		// $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A6:AF".($i-1));
				
		for($i = 'A'; $i <= 'AF'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Movimientos');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ReportedeMovimientos.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>