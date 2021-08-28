<?php
    date_default_timezone_set('america/bogota');
    setlocale(LC_ALL,”es_ES”);

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

 include '../../control/conex.php';

    $consulta = "SELECT * FROM tbaccidentesrt";

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
        $objDrawing->setPath('img/royaltour.jpg');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());      
        // ----------------------------------------------------------------------------

        $tituloReporte = "Royal Tour Plus S.A.S";
        $subtituloReporte = "ACCIDENTES";

        $titulosColumnas = array('FECHA', 'CONDUCTOR', 'CEDULA CONDUCTOR', 'SECCION', 'TIPO CONTRATO', 'CARGO', 'TIPO' ,'DESCRIPCION' ,'DIAS PERDIDOS', 'TIPO DE LESION' ,'PARTE AFECTADA' ,'AGENTE LESION' ,'TIPO DE ACCIDENTE', 'INVESTIGADO' ,'ENVIADO A ARL' ,'CAUSA INMEDIATA' ,'CAUSA BASICA' , 'ACCION A IMPLEMENTAR' ,'FECHA DE EJECUCION' ,'RESPONSABLE' ,'FECHA DE SEGUIMIENTO' ,'OBSERVACIONES');
        
        // combinar filas de encabezado
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:T1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:T2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:T3');
        

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
                    ->setCellValue('V4',  $titulosColumnas[21]);               
        
        //Se agregan los datos de la tabla
        $i = 5;        
        $indice = 1;
        while ($fila = mysqli_fetch_array($stmt)) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $fila['fecha'])
                    ->setCellValue('B'.$i,  $fila['conductor'])
                    ->setCellValue('C'.$i,  $fila['cedulaconductor'])
                    ->setCellValue('D'.$i,  $fila['seccion'])
                    ->setCellValue('E'.$i,  $fila['tipocontrato'])
                    ->setCellValue('F'.$i,  $fila['cargo'])
                    ->setCellValue('G'.$i,  $fila['tipo'])
                    ->setCellValue('H'.$i,  $fila['descripcion'])
                    ->setCellValue('I'.$i,  $fila['diasperdidos'])
                    ->setCellValue('J'.$i,  $fila['tipolesion'])
                    ->setCellValue('K'.$i,  $fila['parteafectada'])
                    ->setCellValue('L'.$i,  $fila['agentelesion'])
                    ->setCellValue('M'.$i,  $fila['tipoaccidente'])
                    ->setCellValue('N'.$i,  $fila['investigado'])
                    ->setCellValue('O'.$i,  $fila['enviadoarl'])
                    ->setCellValue('P'.$i,  $fila['causainmediata'])
                    ->setCellValue('Q'.$i,  $fila['causabasica'])
                    ->setCellValue('R'.$i,  $fila['accionimplementar'])
                    ->setCellValue('S'.$i,  $fila['fechaejecucion'])
                    ->setCellValue('T'.$i,  $fila['responsable'])
                    ->setCellValue('U'.$i,  $fila['fechaseguimiento'])
                    ->setCellValue('V'.$i,  $fila['observacion']);
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
                'color' => array('rgb' => 'FF3333')
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
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => 'FF3333'
                ),
                'endcolor'   => array(
                    'rgb' => 'FF3333'
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
                'color'     => array('rgb' => 'EEEEEE')
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
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:V2')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A4:V4')->applyFromArray($estiloTituloColumnas);      
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:V".($i-1));

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('F5:V'.$i)->getNumberFormat()
        ->setFormatCode('#,###');

                
        for($i = 'A'; $i <= 'V'; $i++){
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
        header('Content-Disposition: attachment;filename="Accidentes_RoyalTour.xlsx"');
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