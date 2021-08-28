<?php
    $conexion = new mysqli('localhost','root','hector','sisgac',3306);
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}

	$consulta = "SELECT ges.fecha, ges.hora, ges.documento, ges.contrato_codigo,
	acc.nombre accion, act.nombre actividad, arr.nombre arreglo, cau.nombre causal,
	con.nombre contacto, via.nombre via,
	ges.observacion, ges.compromiso_fecha, ges.compromiso_valor,
	car.saldo, car.diferida, car.capital, car.cla_penal, car.cla_permanencia, car.intereses,
	car.honorarios, car.deuda_total, cli.nombre, cli.cartera
	from tbgestiones ges, txacciones acc, txactividades act, txarreglos arr, txcausales cau,
		txcontactos con, txvias via, tbcarterax car, tbclientex cli
	where ges.id_accion = acc.id and ges.id_actividad=act.id and ges.id_arreglo=arr.id and
		ges.id_causal=cau.id and ges.id_contacto=con.id and ges.id_via=via.id and
		ges.documento=car.documento and ges.contrato_codigo=car.contrato_codigo and
		car.documento=cli.documento";

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

		$tituloReporte = "REPORTE DE GESTIONES";
		$titulosColumnas = array('FECHA', 'HORA', 'DOCUMENTO', 'CONTRATO_CODIGO', 'ACCION', 'ACTIVIDAD',
			'ARREGLO', 'CAUSAL', 'CONTACTO', 'VIA', 'OBSERVACION', 'COMPROMISO_FECHA', 'COMPROMISO_VALOR',
			'SALDO', 'DIFERIDA', 'CAPITAL', 'CLA_PENAL', 'CLA_PERMANENCIA', 'INTERESES', 'HONORARIOS',
			'DEUDA_TOTAL', 'NOMBRE', 'CARTERA');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:W1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A3',  $titulosColumnas[0])
		            ->setCellValue('B3',  $titulosColumnas[1])
        		    ->setCellValue('C3',  $titulosColumnas[2])
            		->setCellValue('D3',  $titulosColumnas[3])
            		->setCellValue('E3',  $titulosColumnas[4])
            		->setCellValue('F3',  $titulosColumnas[5])
            		->setCellValue('G3',  $titulosColumnas[6])
            		->setCellValue('H3',  $titulosColumnas[7])
            		->setCellValue('I3',  $titulosColumnas[8])
            		->setCellValue('J3',  $titulosColumnas[9])
            		->setCellValue('K3',  $titulosColumnas[10])
            		->setCellValue('L3',  $titulosColumnas[11])
            		->setCellValue('M3',  $titulosColumnas[12])
            		->setCellValue('N3',  $titulosColumnas[13])
            		->setCellValue('O3',  $titulosColumnas[14])
            		->setCellValue('P3',  $titulosColumnas[15])
            		->setCellValue('Q3',  $titulosColumnas[16])
            		->setCellValue('R3',  $titulosColumnas[17])
            		->setCellValue('S3',  $titulosColumnas[18])
            		->setCellValue('T3',  $titulosColumnas[19])
            		->setCellValue('U3',  $titulosColumnas[20])
            		->setCellValue('V3',  $titulosColumnas[21])
            		->setCellValue('W3',  $titulosColumnas[22]);
		
		//Se agregan los datos de los alumnos
		$i = 4;
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['fecha'])
		            ->setCellValue('B'.$i,  $fila['hora'])
        		    ->setCellValue('C'.$i,  $fila['documento'])
            		->setCellValue('D'.$i,  $fila['contrato_codigo'])
            		->setCellValue('E'.$i,  $fila['accion'])
            		->setCellValue('F'.$i,  $fila['actividad'])
            		->setCellValue('G'.$i,  $fila['arreglo'])
            		->setCellValue('H'.$i,  $fila['causal'])
            		->setCellValue('I'.$i,  $fila['contacto'])
            		->setCellValue('J'.$i,  $fila['via'])
            		->setCellValue('K'.$i,  $fila['observacion'])
            		->setCellValue('L'.$i,  $fila['compromiso_fecha'])
            		->setCellValue('M'.$i,  $fila['compromiso_valor'])
            		->setCellValue('N'.$i,  $fila['saldo'])            		
            		->setCellValue('O'.$i,  $fila['diferida'])
            		->setCellValue('P'.$i,  $fila['capital'])            		
            		->setCellValue('Q'.$i,  $fila['cla_penal'])
            		->setCellValue('R'.$i,  $fila['cla_permanencia'])
            		->setCellValue('S'.$i,  $fila['intereses'])
            		->setCellValue('T'.$i,  $fila['honorarios'])
            		->setCellValue('U'.$i,  $fila['deuda_total'])
            		->setCellValue('V'.$i,  $fila['nombre'])        		
            		->setCellValue('W'.$i,  $fila['cartera']);            		
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
				'color'	=> array('argb' => 'FF220835')
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
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'c47cf2'
        		),
        		'endcolor'   => array(
            		'argb' => 'FF431a5d'
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
				'color'		=> array('argb' => 'FFd9b7f4')
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
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:W1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A3:W3')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:W".($i-1));
				
		for($i = 'A'; $i <= 'W'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Gestiones');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="ReportedeGestiones.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>