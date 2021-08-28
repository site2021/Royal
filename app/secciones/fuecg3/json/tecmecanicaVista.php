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
    $result = $db->query("SELECT tecmecanicaimg,tipotecmecanica FROM tbvehiculosg3 WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();

        $imagen = $imgDatos['tecmecanicaimg']; // Datos binarios de la imagen.
        $tipo = $imgDatos['tipotecmecanica'];  // Mime Type de la imagen.
        // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
        header("Content-type: $tipo");
        // A continuación enviamos el contenido binario de la imagen.
        echo $imagen;
        
        //Mostrar Imagen
        // header("Content-type: application/pdf"); 
        // // header("Content-type: image/jpeg"); 
        // // header("Content-type: image/x-png"); 
        // echo $imgDatos['soatimg']; 
    }else{
        echo 'Imagen no existe...';
    }
}
?>