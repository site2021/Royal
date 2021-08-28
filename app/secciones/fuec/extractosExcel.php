<?php
    date_default_timezone_set('america/bogota');
    setlocale(LC_ALL,”es_ES”);

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

 include '../../control/conex.php';
    //$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/safix"); 

    $consulta = "SELECT * FROM tbextractos";

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
        $subtituloReporte = "Extractos ";

        $titulosColumnas = array('EXTRACTO', 'CONTRATO', 'PLACA', 'MODELO', 'MARCA', 'CLASE', 'INTERNO' ,'TARJETA OPERACION' ,'CLIENTE', 'NIT' ,'RESPONSABLE' ,'CEDULA RESPONSABLE' ,'DIRECCION', 'TELEFONO' ,'MODALIDAD' ,'EMPRESA AFILIADORA' ,'FECHA INICIO' , 'FECHA FIN' ,'ORIGEN' ,'DESTINO' ,'RECORRIDO' ,'OBJETO CONTRATO' ,'CONDUCTOR 1' ,'CEDULA CONDUCTOR 1' ,'VIGENCIA LICENCIA 1' ,'CONDUCTOR 2' ,'CEDULA CONDUCTOR 2' ,'VIGENCIA LICENCIA 2' ,'CONDUCTOR 3','CEDULA CONDUCTOR 3', 'VIGENCIA LICENCIA 3', 'CANCELADO', 'FECHA CANCELADO', 'USUARIO', 'FECHA REALIZADO');
        
        // combinar filas de encabezado
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:AG1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:AG2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:AG3');
        

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
                    ->setCellValue('AC4',  $titulosColumnas[28])              
                    ->setCellValue('AD4',  $titulosColumnas[29])              
                    ->setCellValue('AE4',  $titulosColumnas[30])               
                    ->setCellValue('AF4',  $titulosColumnas[31])              
                    ->setCellValue('AG4',  $titulosColumnas[32])               
                    ->setCellValue('AH4',  $titulosColumnas[33])               
                    ->setCellValue('AI4',  $titulosColumnas[34]);               
        
        //Se agregan los datos de la tabla
        $i = 5;        
        $indice = 1;
        while ($fila = mysqli_fetch_array($stmt)) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $fila['extracto'])
                    ->setCellValue('B'.$i,  $fila['contrato'])
                    ->setCellValue('C'.$i,  $fila['placa'])
                    ->setCellValue('D'.$i,  $fila['modelo'])
                    ->setCellValue('E'.$i,  $fila['marca'])
                    ->setCellValue('F'.$i,  $fila['clase'])
                    ->setCellValue('G'.$i,  $fila['interno'])
                    ->setCellValue('H'.$i,  $fila['tarjetaoperacion'])
                    ->setCellValue('I'.$i,  $fila['cliente'])
                    ->setCellValue('J'.$i,  $fila['nit'])
                    ->setCellValue('K'.$i,  $fila['responsable'])
                    ->setCellValue('L'.$i,  $fila['cedularesponsable'])
                    ->setCellValue('M'.$i,  $fila['direccion'])
                    ->setCellValue('N'.$i,  $fila['telefono'])
                    ->setCellValue('O'.$i,  $fila['modalidad'])
                    ->setCellValue('P'.$i,  $fila['empresaafiliadora'])
                    ->setCellValue('Q'.$i,  $fila['fechainicio'])
                    ->setCellValue('R'.$i,  $fila['fechafin'])
                    ->setCellValue('S'.$i,  $fila['origen'])
                    ->setCellValue('T'.$i,  $fila['destino'])
                    ->setCellValue('U'.$i,  $fila['recorrido'])
                    ->setCellValue('V'.$i,  $fila['objetocontrato'])
                    ->setCellValue('W'.$i,  $fila['conductor1'])
                    ->setCellValue('X'.$i,  $fila['cedulaconductor1'])
                    ->setCellValue('Y'.$i,  $fila['vigencialicencia1'])
                    ->setCellValue('Z'.$i,  $fila['conductor2'])
                    ->setCellValue('AA'.$i,  $fila['cedulaconductor2'])
                    ->setCellValue('AB'.$i,  $fila['vigencialicencia2'])
                    ->setCellValue('AC'.$i,  $fila['conductor3'])
                    ->setCellValue('AD'.$i,  $fila['cedulaconductor3'])
                    ->setCellValue('AE'.$i,  $fila['vigencialicencia3'])
                    ->setCellValue('AF'.$i,  $fila['cancelado'])
                    ->setCellValue('AG'.$i,  $fila['fechacancelado'])
                    ->setCellValue('AH'.$i,  $fila['usuario'])
                    ->setCellValue('AI'.$i,  $fila['fecharealizado']);
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
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:AI2')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A4:AI4')->applyFromArray($estiloTituloColumnas);      
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:AI".($i-1));

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('F5:AG'.$i)->getNumberFormat()
        ->setFormatCode('#,###');

                
        for($i = 'A'; $i <= 'AI'; $i++){
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
        header('Content-Disposition: attachment;filename="Extractos.xlsx"');
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