<?php
$id = $_REQUEST['id'];

include '../../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT documentoimg,tipodocumento FROM tbvehiculosimgre WHERE id='$id'");
    
if($rs->num_rows > 0){
    $imgDatos = $rs->fetch_assoc();

    $imagen = $imgDatos['documentoimg'];
    $tipo = $imgDatos['tipodocumento'];
    header("Content-type: $tipo");
    echo $imagen;
    
}else{
    echo 'Imagen no existe...';
}
?>