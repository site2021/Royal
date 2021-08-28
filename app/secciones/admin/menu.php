<?php
  function linea($xetiqueta,$xaccion,$xonclick,$xicono){

    // separacion de opciones de menu
    if ($xetiqueta=='-'){
      return "<div class=\"menu-sep\"></div>";  
    }

    // opcion de menu para invocar index.php
    if ($xonclick==''){
      // iniciar comando con tab
      $cmd="<div data-options=\"";

      // revisar icono
      if ($xicono!=''){
        $cmd = $cmd."iconCls:'icon-$xicono'";
      }
      // cerrar data-options icon
      $cmd = $cmd."\" ";

      // revisar accion cambia a ejecutar con js
      if ($xaccion==''){
        $cmd = $cmd." onclick=\"ejecutar()";
      } else {
        $cmd = $cmd." onclick=\"ejecutar('".$xaccion."')";
      }

      $cmd = $cmd."\">$xetiqueta</div>";

      return $cmd;

    }

    // opcion para llamado a funciones
    if ($xonclick!=''){
      $cmd = "<div ";

      // revisar icono
      if ($xicono!=''){
        $cmd = $cmd."data-options=\"iconCls:'icon-$xicono'\" onclick=\"$xonclick()\">";
        $cmd = $cmd."$xetiqueta</div>";

        return $cmd;
      }
    }

    

  }

  //-------------------------------------------------------------
  $perfil = $_REQUEST['perfil'];

  // abrir archivo
  // "../menu/menu".$perfil.".html"
  $ar=fopen("../menu/menu".$perfil.".html","w+") or
    die("Problemas en la creacion");

  // abrir conexion con la base
  include '../../control/conex.php';
  $conexion = mysqli_connect($server, $user, $pass,$bd) 
  or die("Ha sucedido un error inexperado en la conexion de la base de datos");  

  $sql = "SELECT distinct opcion, max(nivel) as maxnivel
          from txmenu
          where perfil=$perfil
          group by opcion
          order by orden";

  $result = mysqli_query($conexion, $sql);

  // listado de opciones 
  while($row = mysqli_fetch_array($result)){
    $opcion = $row['opcion'];
    $maxnivel = $row['maxnivel'];
    
    $detalle = "SELECT etiqueta,accion,onclick,icono,nivel 
                from txmenu 
                where perfil=$perfil and opcion=$opcion 
                order by orden";

    $rdetalle = mysqli_query($conexion, $detalle);

    // listado de componentes de la opcion  
    $estadoNivel1=0;
    while ($rowd = mysqli_fetch_array($rdetalle)){      

      // nivel 0 : solo una opcion ------------------------------------------------------------------
      if ($maxnivel==0){
        $html = linea($rowd['etiqueta'],$rowd['accion'],$rowd['onclick'],$rowd['icono']);
        fputs($ar, $html."\n");  
      }

      // nivel 1: opcion - opcion -------------------------------------------------------------------
      if ($maxnivel==1){
        $yetiqueta = $rowd['etiqueta'];
        $yicono = $rowd['icono'];
        $ypaso = $rowd['nivel'];

        if ($ypaso==0){
          fputs($ar, "\n");
          fputs($ar, "<div data-options=\"iconCls:'icon-$yicono'\">\n"); 
          fputs($ar, "   <span>$yetiqueta</span>\n");
          fputs($ar, "   <div>\n");
        }

        if ($ypaso==1){
          $html = "     ".linea($rowd['etiqueta'],$rowd['accion'],$rowd['onclick'],$rowd['icono']);
          fputs($ar, $html."\n");  
             
        } 
      }

      // nivel 2: opcion - opcion - opcion
      if ($maxnivel==2){
        $yetiqueta = $rowd['etiqueta'];
        $yicono = $rowd['icono'];
        $ypaso = $rowd['nivel'];

        if ($ypaso==0){
          // igual que el encabezado del nivel 2
          fputs($ar, "\n");
          fputs($ar, "<div data-options=\"iconCls:'icon-$yicono'\">\n");
          fputs($ar, "  <span>$yetiqueta</span>\n");
          fputs($ar, "  <div>\n");
        }

        if ($ypaso==1){
          // si estadoNivel1 es 1 - abierto viene de uno anterior HAY QUE CERRARLO
          if ($estadoNivel1==1){
            fputs($ar, "      </div>\n");  
            fputs($ar, "    </div>\n");
            $estadoNivel1==0;

          }          

          fputs($ar, "    <div data-options=\"iconCls:'icon-$yicono'\">\n");
          fputs($ar, "      <span>$yetiqueta</span>\n");
          fputs($ar, "      <div>\n");
          $estadoNivel1 = 1; // queda abierto el nivel 1
        }

        if ($ypaso==2){
          $html = "         ".linea($rowd['etiqueta'],$rowd['accion'],$rowd['onclick'],$rowd['icono']);
          fputs($ar, $html."\n");
        }


      }


    } 

    // verificar niveles abierto para maxnivel2
    if ($maxnivel==2 ){
      if ($estadoNivel1==1){
        fputs($ar, "      </div>\n");  
        fputs($ar, "    </div>\n");         
      }
    }

    // completar tabs de los niveles
    if ($maxnivel==1 || $maxnivel==2){
      fputs($ar, "   </div>\n");  
      fputs($ar, "</div>\n");        
    }
  

  }

  fclose($ar);

  echo json_encode(array('success'=>true));

?>