<?php

$path = $_REQUEST['path'];

function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            
            $items = array();

            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){

                    list($nombre, $extension) = split('[.]',$archivo);
                    if($extension=='jpg'){
                        list($width, $height, $type, $attr) = getimagesize($carpeta.'/'.$archivo);    
                    }else {
                        $width = '';
                        $height = '';
                    }

                    array_push($items, array('archivo'=>$archivo,'tipo'=>$extension,'ancho'=>$width,'alto'=>$height));

                }
            }            
            closedir($dir);

            // enviar json para la grid
            echo json_encode($items);

        }
    }
}
 
echo listar_archivos($path);

?>