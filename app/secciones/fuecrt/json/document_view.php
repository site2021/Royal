<?php
$id = $_REQUEST['id'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT contratoimg,tipocontrato FROM tbcontratosimgrt WHERE id='$id'");
    
if($rs->num_rows > 0){
    $imgDatos = $rs->fetch_assoc();

    $imagen = $imgDatos['contratoimg'];
    $tipo = $imgDatos['tipocontrato'];
    header("Content-type: $tipo");
    echo $imagen;
    
}else{
    echo 'Imagen no existe...';
}
?>