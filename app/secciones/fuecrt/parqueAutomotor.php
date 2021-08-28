<?php
    date_default_timezone_set('america/bogota');
    setlocale(LC_ALL,”es_ES”);

    $xfecharesolucion = $_REQUEST['fecharesolucion'];

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

 include '../../control/conex.php';
    //$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/safix"); 

    $consulta = "SELECT * FROM tbvehiculosrt WHERE tipovinculacion!= 'CONVENIO EMPRESARIAL' AND estado!='DESVINCULADO'";
    
    $conautorizada  = "SELECT * FROM tbpqautomotorrt WHERE fecharesolucion='$xfecharesolucion' AND estado!='DESVINCULADO'";

    $conmicrobus = "SELECT COUNT(clase) microbus FROM tbvehiculosrt WHERE clase='MICROBUS' AND tipovinculacion!= 'CONVENIO EMPRESARIAL' AND estado!='DESVINCULADO'";

    $conbus = "SELECT COUNT(clase) bus FROM tbvehiculosrt WHERE clase='BUS' AND tipovinculacion!= 'CONVENIO EMPRESARIAL' AND estado!='DESVINCULADO'";

    $conbuseta = "SELECT COUNT(clase) buseta FROM tbvehiculosrt WHERE clase='BUSETA' AND tipovinculacion!= 'CONVENIO EMPRESARIAL' AND estado!='DESVINCULADO'";

    $concamioneta = "SELECT COUNT(clase) duster FROM tbvehiculosrt WHERE clase='DUSTER' AND tipovinculacion!= 'CONVENIO EMPRESARIAL' AND estado!='DESVINCULADO'";


    $stmt = mysqli_query($conexion, $consulta);
    $cantautorizada = mysqli_query($conexion, $conautorizada);
    $cantmicro = mysqli_query($conexion, $conmicrobus);
    $cantbus = mysqli_query($conexion, $conbus);
    $cantbuseta = mysqli_query($conexion, $conbuseta);
    $cantcamioneta = mysqli_query($conexion, $concamioneta);
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

        $tituloReporte = "ROYAL TOUR PLUS S.A.S";
        $subtituloReporte = "PARQUE AUTOMOTOR";

        $titulosColumnas = array('PLACA', 'INTERNO', 'CLASE', 'CAPACIDAD', 'MODELO', 'PROPIETARIO','MARCA', 'No MOTOR', 'CHASIS', 'ESTADO');
        
        // combinar filas de encabezado
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:J1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:J2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:J3');
        

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
                    ->setCellValue('J4',  $titulosColumnas[9]);          
        
        //Se agregan los datos de la tabla
        $i = 5;        
        $cap = 4;        
        $indice = 1;
        while ($fila = mysqli_fetch_array($stmt)) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $fila['placa'])
                    ->setCellValue('B'.$i,  $fila['interno'])
                    ->setCellValue('C'.$i,  $fila['clase'])
                    ->setCellValue('D'.$i,  $fila['capacidad'])
                    ->setCellValue('E'.$i,  $fila['modelo'])
                    ->setCellValue('F'.$i,  $fila['propietario'])
                    ->setCellValue('G'.$i,  $fila['marca'])
                    ->setCellValue('H'.$i,  $fila['motor'])
                    ->setCellValue('I'.$i,  $fila['chasis'])
                    ->setCellValue('J'.$i,  $fila['estado']);
                    $i++;

            $indice = $indice + 1;

        }

        while ($fila = mysqli_fetch_array($cantautorizada)) {
            $valorcapmicro = $fila['capmicrobus'];
            $valorcapbus = $fila['capbus'];
            $valorcapbuseta = $fila['capbuseta'];
            $valorcapcamioneta = $fila['capcamioneta'];
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('L'.$cap, 'CLASE')
                    ->setCellValue('L'.'5', 'MICROBUS')
                    ->setCellValue('M'.'5', $fila['capmicrobus'])
                    ->setCellValue('L'.'6', 'BUS')
                    ->setCellValue('M'.'6', $fila['capbus'])
                    ->setCellValue('L'.'7', 'BUSETA')
                    ->setCellValue('M'.'7', $fila['capbuseta'])
                    ->setCellValue('L'.'8', 'CAMIONETA')
                    ->setCellValue('M'.'8', $fila['capcamioneta'])
                    ->setCellValue('M'.$cap, 'AUTORIZADA')
                    ->setCellValue('N'.$cap, 'OCUPADA')
                    ->setCellValue('O'.$cap, 'DISPONIBLE');
                
            // $indice = $indice + 1;

        }
        
        while ($fila = mysqli_fetch_array($cantmicro)) {
            $disponiblemicro = $valorcapmicro - $fila['microbus'];
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('N'.'5',  $fila['microbus'])
                    ->setCellValue('O'.'5',  $disponiblemicro);
        }

        while ($fila = mysqli_fetch_array($cantbus)) {
            $disponiblebus = $valorcapbus - $fila['bus'];
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('N'.'6',  $fila['bus'])
                    ->setCellValue('O'.'6',  $disponiblebus);
        }

        while ($fila = mysqli_fetch_array($cantbuseta)) {
            $disponiblebuseta = $valorcapbuseta - $fila['buseta'];
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('N'.'7',  $fila['buseta'])
                    ->setCellValue('O'.'7',  $disponiblebuseta);
        }

        while ($fila = mysqli_fetch_array($cantcamioneta)) {
            $disponiblecamioneta = $valorcapcamioneta - $fila['duster'];
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('N'.'8',  $fila['duster'])
                    ->setCellValue('O'.'8',  $disponiblecamioneta);
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
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => 'FF3333'
                ),
                'endcolor'   => array(
                    'argb' => 'FF3333'
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
                'color'     => array('argb' => 'EEEEEE')
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
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:J2')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A4:J4')->applyFromArray($estiloTituloColumnas);     
        $objPHPExcel->getActiveSheet()->getStyle('L4:O4')->applyFromArray($estiloTituloColumnas); 
        $objPHPExcel->getActiveSheet()->getStyle('L5:L8')->applyFromArray($estiloTituloColumnas);      
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:J".($i-1));
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "M5:O8");

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('F5:J'.$i)->getNumberFormat()
        ->setFormatCode('#,###');

                
        for($i = 'A'; $i <= 'J'; $i++){
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
        header('Content-Disposition: attachment;filename="parqueAutomotor.xlsx"');
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