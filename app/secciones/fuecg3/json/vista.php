<?php
if(!empty($_GET['id'])){
    //Credenciales de conexion
    $Host = 'localhost';
    $Username = 'root';
    $Password = 'royal2019*';
    $dbName = 'ryl';
    
    //Crear conexion mysql
    $db = new mysqli($Host, $Username, $Password, $dbName);
    
    //revisar conexion
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Extraer imagen de la BD mediante GET
    $result = $db->query("SELECT imagenes FROM tbvehiculosg3 WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/jpeg"); 
        echo $imgDatos['imagenes']; 
    }else{
        echo 'Imagen no existe...';
    }
}
?>