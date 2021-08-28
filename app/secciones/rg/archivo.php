<?php

  $ar=fopen("datos.txt","a") or
    die("Problemas en la creacion");
  fputs($ar,$_REQUEST['nombre']);
  fputs($ar,"\n");
  fputs($ar,$_REQUEST['comentarios']);
  fputs($ar,"\n");
  fputs($ar,"--------------------------------------------------------");
  fputs($ar,"\n");
  fclose($ar);
  //echo "Los datos se cargaron correctamente.";

  // echo json_encode(array('errorMsg'=>'Some errors occured.'));
  echo json_encode(array('success'=>true));


?>