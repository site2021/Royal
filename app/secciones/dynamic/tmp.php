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
                    ->setCellValue('X'.$i,  $fila['vr_retencion'])
                    ->setCellValue('Y'.$i,  $fila['vr_fletes'])
                    ->setCellValue('Z'.$i,  $fila['vr_Seguro'])
                    ->setCellValue('AA'.$i, $fila['vr_Otros'])
                    ->setCellValue('AB'.$i, $fila['concepto'])
                    ->setCellValue('AC'.$i, $fila['ccosto'])
                    ->setCellValue('AD'.$i, $fila['su'])
                    ->setCellValue('AE'.$i, $fila['valor_mv_otro'])
                    ->setCellValue('AF'.$i, $fila['pedido_encabeza']);                  
