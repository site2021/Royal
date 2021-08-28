<?php

    date_default_timezone_set('america/bogota');
    setlocale(LC_ALL,”es_ES”);

    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     
    $fecha =  htmlspecialchars($dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." ( ".date("H:i:s")." )");

    //$dt = new DateTime();
    //$ahora = $dt->format('Y-m-d H:i:s');

    include 'udfs.php';
    
    // parametros desde web
    $xdb = $_REQUEST['xdb'];

    $tabla = $_REQUEST['tabla'];
    $filas = $_REQUEST['campos'];

    // lista de campos ya seleccionados de la tabla
    $columnas = $_REQUEST['columnas'];
    $ncolumnas = $_REQUEST['ncolumnas'];

    $filtros = $_REQUEST['filtros'];
    $nfiltros = str_replace("\\","",$filtros);

    $valores = $_REQUEST['valores'];
    $listaValores = $_REQUEST['listaValores'];

    // cadena de conexion
    if($xdb=='oracle'){
        $conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/SAFIX");     
    }
    if($xdb=='mysql'){
        include '../../control/conex.php';

    }
    
    // extraer columna de valores
    // si hay campos en COLUMNAS
    // solo habra UN VALOR
    if($columnas!=''){

        $desde = strpos($valores,'(')+1;
        $hasta = strpos($valores,')');

        // redefinir el campo valor porque viene con la operacion
        // SUM(VENTA_NETA) VENTA_NETA   
        $campoValor = substr($valores,$desde,$hasta-$desde);

        // solo x comodidad creamos vector de columnas nuevas 
        // a partir de ncolumnas (lista de campos)
        $cols = add_array($ncolumnas);

        $columnaSQL = '';
        for($i=0;$i<sizeof($cols);$i++){        
            $columnaSQL = $columnaSQL." SUM( CASE $columnas WHEN '$cols[$i]' THEN $campoValor ELSE 0 END ) $cols[$i], ";
            
        }

        //echo "<script>alert($columnaSQL)</script>";

        $sql="SELECT $filas, $columnaSQL $valores FROM $tabla WHERE $nfiltros GROUP BY $filas ORDER BY $filas";
    
    } else {

        $sql="SELECT $filas, $valores FROM $tabla WHERE $nfiltros GROUP BY $filas ORDER BY $filas"; 

    }
    
    //construir vectores de filas, valores
    $fils = add_array($filas);
    $vals = add_array($listaValores);

    // --------------------------------------------------------------- fin del homenaje ----------------

    // ejecucion de la consulta dependiendo de la db ---------------------------------------------- 
    if($xdb=='oracle'){        
        $stmt = oci_parse($conn, $sql);
        $ok   = oci_execute( $stmt );
        // meramente informativo - oci_parse 
        $cuantasFilas = oci_num_rows($stmt);        
    }
    if($xdb=='mysql'){
        $stmt = mysqli_query($conexion, $sql);

        // mis disculpas aca solo ok para ejecutar siguiente seccion
        $ok = true;
    }

	if($ok == true){		

		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
        //require_once '../comercial/lib/PHPExcel/PHPExcel.php';
		require_once 'lib/PHPExcel/PHPExcel.php';

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
        $objDrawing->setPath('images/royal001.jpg');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        // ----------------------------------------------------------------------------

		$tituloReporte = "Royal Express";
        $subtituloReporte = "Generador Reportes";

		//$titulosColumnas = array('MES', 'CALI', 'DOSQ' ,'MEDE');
		
        // combinar filas de encabezado
        $xCols = sizeof($fils) + sizeof($cols) + sizeof($vals) - 1;

		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:'.chr($xCols+65).'1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:'.chr($xCols+65).'2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:'.chr($xCols+65).'3');
		
        
        // ajustar columnas a maxima entrada      
        for($i = 0; $i <= $xCols+1 ; $i++){
            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension(chr($i+65))->setAutoSize(TRUE);
        }

		// Se agregan los TITULOS del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',  $tituloReporte)
                    ->setCellValue('A2',  $subtituloReporte)
                    ->setCellValue('A3',  "Fecha: ".$fecha);

                    /*
        		    ->setCellValue('A4',  $titulosColumnas[0])
		            ->setCellValue('B4',  $titulosColumnas[1])
        		    ->setCellValue('C4',  $titulosColumnas[2])
            		->setCellValue('D4',  $titulosColumnas[3]);            		
                    */
        $i = 4; 
        $t = 0;
        for($t=0; $t<sizeof($fils); $t++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($t+65).$i,  $fils[$t] );                        
        }

        // si tiene columnas 
        if($columnas!=''){
            $nt = $t;            
            for($t=0; $t<sizeof($cols); $t++, $nt++ ){
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($nt+65).$i,  $cols[$t] );                        
            }             

        } else {
            $nt = $t;     

        }

        for($t=0; $t<sizeof($vals); $t++, $nt++ ){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($nt+65).$i,  $vals[$t] );                        
        }
        // ------------------- fin de TITULOS -----------------------------


        // ------------------- REGISTTROS desde sql--------------------------------------
		//Se agregan los datos de la consulta a hoja Excel
		$i = 5;
        
        if($xdb=='oracle'){            
    		while ($fila = oci_fetch_array($stmt)) {

                $col = 0;
                for($c=0;$c<sizeof($fils);$c++){
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($c+65).$i,  $fila[$fils[$c]]);                        
                }            


                // si tiene columnas         
                if($columnas!=''){
                    $col = $c;            
                    for($c=0; $c<sizeof($cols); $c++, $col++ ){
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($col+65).$i,  $fila[$cols[$c]] );                        
                    }
                    $ncol = $col;

                } else {
                    $ncol = $c;    
                }

            
                for($v=0; $v<sizeof($vals); $v++, $ncol++ ){
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($ncol+65).$i,  $fila[$vals[$v]]);                        
                }            

    			$i++;

    		}
		}

        if($xdb=='mysql'){
            while ($fila = mysqli_fetch_array($stmt)) {

                $col = 0;
                for($c=0;$c<sizeof($fils);$c++){
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($c+65).$i,  $fila[$fils[$c]]);                        
                }            


                // si tiene columnas         
                if($columnas!=''){
                    $col = $c;            
                    for($c=0; $c<sizeof($cols); $c++, $col++ ){
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($col+65).$i,  $fila[$cols[$c]] );                        
                    }
                    $ncol = $col;

                } else {
                    $ncol = $c;    
                }

            
                for($v=0; $v<sizeof($vals); $v++, $ncol++ ){
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($ncol+65).$i,  $fila[$vals[$v]]);                        
                }            


                $i++;
                
            }

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
				'color'	=> array('argb' => 'FF92D050')
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
            		'rgb' => '92D050'
        		),
        		'endcolor'   => array(
            		'argb' => 'FF088A08'
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
				'color'		=> array('argb' => 'FF9FF781')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '9FF781'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:'.chr($xCols+65).'2')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A4:'.chr($xCols+65).'4')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, 'A5:'.chr($xCols+65).($i-1));

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('B5:'.chr($xCols+65).$i)->getNumberFormat()
        ->setFormatCode('#,###');

		/*		
		for($i = 0; $i <= $xCols+1 ; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension(chr($i+65))->setAutoSize(TRUE);
		}
        */
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Reporte');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,5);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="GeneradorReportes.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>