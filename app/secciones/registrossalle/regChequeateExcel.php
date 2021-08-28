<?php
    date_default_timezone_set('america/bogota');
    setlocale(LC_ALL,”es_ES”);

    $dt = new DateTime();
    $ahora = $dt->format('Y-m-d H:i:s');

    include '../../control/conex.php';
    //$conn = oci_connect("safix","safix2016+", "192.168.20.101:1521/safix"); 

    $consulta = "SELECT codigoencuesta,fechaencuesta,nombreencuesta,celular,temperaturaaux,tos,malestar,difrespirar,diarrea,olfatogusto,fuerapais,contactosospechoso,cuarentena,personacuarentena,compromiso,ingreso,horaingreso,salida,horasalida FROM tbsalleencuestacovid ORDER BY fechaencuesta DESC";

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
        $objDrawing->setPath('img/salud.png');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setOffsetX(10);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  


        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath('img/salle.jpg');
        $objDrawing->setHeight(36);
        $objDrawing->setCoordinates('B1');
        $objDrawing->setOffsetX(80);
        $objDrawing->setOffsetY(10);
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());      
        // ----------------------------------------------------------------------------

        $tituloReporte = "CHEQUÉATE APP";
        $subtituloReporte = "Registros Condiciones de Salud";

        $titulosColumnas = array('ID', 'FECHA Y HORA REGISTRO', 'NOMBRE COMPLETO', 'CELULAR','TEMPERATURA','INGRESO', 'FECHA Y HORA DE INGRESO', 'SALIDA', 'FECHA Y HORA DE SALIDA','TOS Y/O EXPECTORACIÓN', 'MALESTAR GENERAL, DOLOR MUSCULAR O FATIGA', 'DIFICULTAD PARA RESPIRAR', 'DIARREA', 'DISMINUCIÓN DEL GUSTO U OLFATO', '¿HA ESTADO FUERA DEL PAÍS O HA ESTADO CON PERSONAS PROCEDENTES DEL EXTRANJERO EN LOS ÚLTIMOS 14 DÍAS?', '¿HA ESTADO EN CONTACTO CON UNA PERSONA POSITIVA O SOSPECHOSA PARA COVID-19 SIN MEDIDAS DE PROTECCIÓN ADECUADAS EN LOS ÚLTIMOS 14 DÍAS?', '¿SE ENCUENTRA EN PERIODO DE CUARENTENA POR COVID-19?', '¿ALGUNA PERSONA CON LA QUE VIVE SE ENCUENTRA EN CUARENTENA POR COVID-19?', 'COMPROMISO');
        
        // combinar filas de encabezado
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:S1');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A2:S2');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A3:S3');
        

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
                    ->setCellValue('S4',  $titulosColumnas[18]);                
        
        //Se agregan los datos de la tabla
        $i = 5;        
        $indice = 1;
        while ($fila = mysqli_fetch_array($stmt)) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $fila['codigoencuesta'])
                    ->setCellValue('B'.$i,  $fila['fechaencuesta'])
                    ->setCellValue('C'.$i,  $fila['nombreencuesta'])
                    ->setCellValue('D'.$i,  $fila['celular'])
                    ->setCellValue('E'.$i,  $fila['temperaturaaux'])
                    ->setCellValue('F'.$i,  $fila['ingreso'])
                    ->setCellValue('G'.$i,  $fila['horaingreso'])
                    ->setCellValue('H'.$i,  $fila['salida'])
                    ->setCellValue('I'.$i,  $fila['horasalida'])
                    ->setCellValue('J'.$i,  $fila['tos'])
                    ->setCellValue('K'.$i,  $fila['malestar'])
                    ->setCellValue('L'.$i,  $fila['difrespirar'])
                    ->setCellValue('M'.$i,  $fila['diarrea'])
                    ->setCellValue('N'.$i,  $fila['olfatogusto'])
                    ->setCellValue('O'.$i,  $fila['fuerapais'])
                    ->setCellValue('P'.$i,  $fila['contactosospechoso'])
                    ->setCellValue('Q'.$i,  $fila['cuarentena'])
                    ->setCellValue('R'.$i,  $fila['personacuarentena'])
                    ->setCellValue('S'.$i,  $fila['compromiso']);
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
                'color' => array('argb' => '0D6B9A')
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
                    'rgb' => '0D6B9A'
                ),
                'endcolor'   => array(
                    'argb' => '0D6B9A'
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
                'color'     => array('argb' => 'FFFFFF')
            ),
            'borders' => array(
                'left'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => '0D6B9A'
                    )
                )             
            )
        ));
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:S2')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A4:S4')->applyFromArray($estiloTituloColumnas);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A5:S".($i-1));

        // formato numerico para los columnas de datos
        $objPHPExcel->getActiveSheet()->getStyle('F5:S'.$i)->getNumberFormat()
        ->setFormatCode('#,###');

                
        for($i = 'A'; $i <= 'S'; $i++){
            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(TRUE);
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Registros');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,5);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="RegistrosChequeate.xlsx"');
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