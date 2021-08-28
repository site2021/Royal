<?php

session_start();
$_SESSION['perfil'];
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  // echo "";
}else{
  header("Location: index.html");
  exit();
}

require_once "control/conex.php"; 
// $conexion = conexion();

$sql="SELECT estatura,edad,peso, nombre FROM tbestudiantes WHERE usuario='$usuario'";
$result = mysqli_query($conexion,$sql);

$valoresY = array(); //estatura - estatura 
$valoresX = array(); //edad - edad

$valoresYPeso = array(); //peso - peso


while ($ver=mysqli_fetch_row($result)) {

  $valoresY[] = $ver[0];
  $valoresX[] = $ver[1];
  $valoresYPeso[] = $ver[2];


  // datos personales

  $estatura = $ver[0];
  $estatura = $estatura;

  $nombre = $ver[3];
  $nombre = $nombre;

  $peso = $ver[2];
  $peso = $peso;

  $edad = $ver[1];
  $edad = $edad;
}

$datosX = json_encode($valoresX);
$datosY = json_encode($valoresY);
$datosYPeso = json_encode($valoresYPeso);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mom's Kitchen | Perfil 00</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="jeasyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/color.css">
<!--     <link rel="stylesheet" type="text/css" href="jeasyui/demo/demo.css"> -->

    <script type="text/javascript" src="jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="jeasyui/locale/easyui-lang-es.js"></script>

    <script type="text/javascript" src="js/accounting.js"></script>
    <script type="text/javascript" src="js/datagrid-filter.js"></script>

    <script src="librerias/plotly-latest.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-green">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo"><b>Mamma's </b>Kitchen</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                  <a href="control/cerrar.php" class="">Cerrar Sesión </a>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar2.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">

              <p><?php echo "Estudiante "; ?></p>
              <p><?php echo $usuario;  ?></p>
            </div>
          </div>

          <ul class="sidebar-menu">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
            <li class="treeview">
              <a href="perfil.php">
                <i class="fa fa-home"></i> <span>Inicio</span> 
              </a>
              
            </li>

           <!--  <li>
              <a href="pages/datos_personales.php">
                <i class="fa fa-user"></i> <span>Datos Personales</span>
              </a>
            </li> -->

            <li>
              <a href="pages/pagos.php">
                <i class="fa fa-money"></i> <span>Pagos</span>
              </a>
            </li>

            <li>
              <a href="pages/menu.php">
                <i class="fa fa-cutlery"></i> <span>Menú´s</span>
              </a>
            </li>

            <li>
              <a href="pages/porciones_estudiante.php">
                <i class="fa fa-table"></i> <span>Porciones</span>
              </a>
            </li>
          </ul>
         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <!-- <ul class="sidebar-menu">
            <li class="header">MENU DE NAVEGACIÓN</li>
            
          </ul>

          <li>
            <a href="perfil.php">
              <i class="fa fa-th"></i> <span>Inicio</span> <small class="label pull-right bg-green"></small>
            </a>
          </li>

          <li>
            <a href="pages/informacion.php">
              <i class="fa fa-th"></i> <span>Vista</span> <small class="label pull-right bg-green"></small>
            </a>
          </li> -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Datos Personales 
            <small></small>
          </h1>
          <br>

          <div class="row">
            <div class="col-md-6">
              <!-- <label style="font-size: 16px">Usuario </label>
              &emsp;&emsp;  -->
              <label style="font-size: 16px">Peso</label>
              &emsp;&emsp; 
              <label style="font-size: 16px">Estatura</label>
              &emsp;&emsp; 
              <label style="font-size: 16px">Edad</label>
              &emsp;&emsp; 
              <label style="font-size: 16px">Nombre Completo</label>
              
              <br><!-- <?php  echo $usuario; ?>  -->
              <?php  echo $peso; ?>
              &emsp;&emsp;&emsp;&ensp; 
              <?php  echo $estatura; ?>
              &emsp;&emsp;&emsp;&emsp;&emsp; 
              <?php  echo $edad; ?>
              &emsp;&emsp;&ensp;&ensp; 
              <?php  echo $nombre; ?>
              
<!-- 
              <label style="font-size: 16px">Nombre Completo</label> -->
              <!-- <br><?php  echo $nombre; ?>  --> 
              

              <!-- <label style="font-size: 16px">Estatura</label>
              <br><?php  echo $peso; ?>  
              <br><br> -->
            </div>
          </div>
          <br>


          <div id="graficaEstaturaNiño"></div>

          <div id="graficaPesoNiño"></div>

          <div id="graficaEstaturaNiña"></div>

          <div id="graficaPesoNiña"></div>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">


            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>


  </body>
</html>

<script type="text/javascript">
  function crearCadenaLineal(json){
    var parsed = JSON.parse(json);
    var arr = [];

    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>


<!-- GRAFICA DE ESTATURA DE NIÑOS -->
<script type="text/javascript">
  
  datosX = crearCadenaLineal('<?php echo $datosX ?>');
  datosY = crearCadenaLineal('<?php echo $datosY ?>');

  datosYPeso = crearCadenaLineal('<?php echo $datosYPeso ?>');

  var trace0 = {
    x: datosX,
    y: datosYPeso,
    mode: 'markers',
    name: 'PESO',
    marker: {
      color: 'rgba(67,67,67,1)', // piel
      size: 14
    }
  };

  var trace1 = {
    x: datosX,
    y: datosY,
    mode: 'markers',
    name: 'ESTATURA',
    marker: {
      color: 'rgba(67,67,67,1)', // piel
      size: 14
    }
  };

  var trace2 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [102, 109, 116, 121, 127, 133, 138, 143, 149, 156, 162, 167, 170, 171, 172, 172, 172], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '0',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 4
    }

  };

  // var trace3 = {
  //   x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
  //   y: [101, 108, 114, 120, 126, 132, 138, 145, 151, 155, 158, 159, 159, 159, 159, 159, 160], //NIÑAS
  //   type: 'scatter',
  //   marker: {
  //     color: 'rgb(128, 0, 128)',
  //     size: 6
  //   },
  // };

  var trace3 = {
    x: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    y: [98,104,110,116,121,127,131,136,142,148,154,160,163,165,165.5,166,166],
    // type: 'scatter'

    mode: 'lines',
    name: '-1',
    line: {
      width: 1,
      color: 'rgb(55, 128, 191)' //azul
    }
  };

  var trace4 = {
    x: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    y: [93,99,105,110,116,121,125,129,134,140,147,153,156,158,159,160,160],
    mode: 'lines',
    name: '-2',
    line: {
      width: 1,
      color: 'rgb(55, 128, 191)' //azul
    }
  };

  var trace5 = {
    x: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    y: [89, 95, 100, 105, 110, 115, 119, 123, 127, 133, 139, 145, 150, 152, 153, 154, 154],
    mode: 'lines',
    name: '-3',
    line: {
      width: 2,
      dash: 'dot',
      color: 'rgb(55, 128, 191)' //azul
    }
  };

  var trace6 = {
    x: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    y: [106, 114, 121, 127, 133, 139, 144, 150, 157, 163, 169, 174, 177, 178, 178, 179, 179],
    mode: 'lines',
    name: '+1',
    line: {
      width: 1,
      color: 'rgb(55, 128, 191)' //azul
    }
  };

  var trace7 = {
    x: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    y: [111, 119, 126, 132, 138, 145, 151, 157, 164, 171, 177, 181, 183, 184, 184, 184, 184],
    mode: 'lines',
    name: '+2',
    line: {
      width: 1,
      color: 'rgb(55, 128, 191)' //azul
    }
  };

  var trace8 = {
    x: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    y: [115, 123, 131, 138, 144, 151, 157, 164, 172, 179, 185, 188, 190, 190, 190, 191, 191],
    mode: 'lines',
    name: '+3',
    line: {
      width: 2,
      dash: 'dot', 
      color: 'rgb(55, 128, 191)', //azul
    }


  };

  var trace9 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [12, 13, 15, 16, 18, 20, 22, 24, 26, 28, 32, 35, 38, 40, 42, 44, 46], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-3',
    line: {
      width: 2,
      dash: 'dot', 
      color: 'rgb(55, 128, 191)', //azul
    }

  };

  var trace10 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [13, 15, 16, 18, 20, 22, 24, 27, 30, 33, 37, 40, 44, 46, 48, 50, 52], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-2',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace11 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [15, 17, 19, 21, 23, 26, 28, 32, 35, 39, 43, 47, 50, 53, 55, 57, 59], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-1',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace12 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [17, 19, 21, 24, 27, 31, 35, 39, 43, 48, 52, 56, 60, 62, 64, 66, 68], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '0',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 4
    }

  };

  var trace13 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [19, 22, 25, 29, 33, 38, 44, 48, 54, 59, 64, 68, 72, 74, 76, 78, 79], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+1',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace14 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [22, 26, 30, 36, 42, 48, 54, 60, 67, 73, 79, 84, 87, 89, 90, 92, 93], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+2',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace15 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [26, 32, 38, 46, 54, 62, 69, 76, 85, 92, 100, 105, 108, 110, 111, 112, 112], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+3',
    line: {
      width: 2,
      dash: 'dot', 
      color: 'rgb(55, 128, 191)', //azul
    }

  };



  // // var data = [trace1];
  // var data = [trace1, trace2, trace3];
  var data = [trace0 ,trace1, trace2, trace3, trace4, trace5, trace6, trace7, trace8, trace9, trace10, trace11, trace12, trace13, trace14, trace15];

  var layout = {
    title:'Estatura y Peso Niños: 4 a 20 años ',
    showlegend: false
  };

  Plotly.newPlot('graficaEstaturaNiño', data, layout);

</script>

<!-- GRAFICA PESO NIÑOS -->
<!-- <script type="text/javascript">
  
  datosX = crearCadenaLineal('<?php echo $datosX ?>');
  datosYPeso = crearCadenaLineal('<?php echo $datosYPeso ?>');

  var trace1 = {
    x: datosX,
    y: datosYPeso,
    mode: 'markers',
    name: 'Posición Niño',
    marker: {
      color: 'rgba(67,67,67,1)', // piel
      size: 14
    }
  };

  var trace2 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [12, 13, 15, 16, 18, 20, 22, 24, 26, 28, 32, 35, 38, 40, 42, 44, 46], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-3',
    line: {
      width: 2,
      dash: 'dot', 
      color: 'rgb(55, 128, 191)', //azul
    }

  };

  var trace3 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [13, 15, 16, 18, 20, 22, 24, 27, 30, 33, 37, 40, 44, 46, 48, 50, 52], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-2',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace4 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [15, 17, 19, 21, 23, 26, 28, 32, 35, 39, 43, 47, 50, 53, 55, 57, 59], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-1',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace5 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [17, 19, 21, 24, 27, 31, 35, 39, 43, 48, 52, 56, 60, 62, 64, 66, 68], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '0',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 4
    }

  };

  var trace6 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [19, 22, 25, 29, 33, 38, 44, 48, 54, 59, 64, 68, 72, 74, 76, 78, 79], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+1',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace7 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [22, 26, 30, 36, 42, 48, 54, 60, 67, 73, 79, 84, 87, 89, 90, 92, 93], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+2',
    line: {
      color: 'rgb(55, 128, 191)', //azul
      width: 1
    }

  };

  var trace8 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [26, 32, 38, 46, 54, 62, 69, 76, 85, 92, 100, 105, 108, 110, 111, 112, 112], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+3',
    line: {
      width: 2,
      dash: 'dot', 
      color: 'rgb(55, 128, 191)', //azul
    }

  };

  // // var data = [trace1];
  // var data = [trace1, trace2, trace3];
  var dataPesoNiños = [trace1,trace2, trace3, trace4, trace5, trace6, trace7, trace8];

  var layoutPesoNiños = {
    title:'Peso Niños: 4 a 20 años ',
    showlegend: false
  };

  Plotly.newPlot('graficaPesoNiño', dataPesoNiños, layoutPesoNiños);

</script> -->

<!-- GRAFICA ESTATURA DE LA NIÑA -->
<script type="text/javascript">
  
  datosX = crearCadenaLineal('<?php echo $datosX ?>');
  datosY = crearCadenaLineal('<?php echo $datosY ?>');
  datosYPeso = crearCadenaLineal('<?php echo $datosYPeso ?>');

  var trace0 = {
    x: datosX,
    y: datosYPeso,
    mode: 'markers',
    name: 'PESO',
    marker: {
      color: 'rgba(67,67,67,1)', // piel
      size: 14
    }
  };

  var trace1 = {
    x: datosX,
    y: datosY,
    mode: 'markers',
    name: 'ESTATURA',
    marker: {
      color: 'rgba(67,67,67,1)', // piel
      size: 14
    }
  };

  var trace2 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [114, 122, 129, 136, 143, 150, 157, 164, 170, 173, 175, 176, 176, 176, 176, 176, 176], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '+3',
    line: {
      color: 'rgb(234, 153, 153)', //rosa
      width: 1,
      dash: 'dot'
    }

  };

  var trace3 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [109, 117, 124, 131, 137, 143, 151, 158, 164, 168, 169, 170, 170, 170, 170, 170, 170], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '+2',
    line: {
      color: 'rgb(234, 153, 153)', //rosa
      width: 1
    }

  };

  var trace4 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [105, 113, 119, 126, 132, 138, 144, 151, 157, 161, 163, 164, 164, 164, 164, 165, 165], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '+1',
    line: {
      color: 'rgb(234, 153, 153)', //rosa
      width: 1
    }

  };

  var trace5 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [101, 108, 114, 120, 126, 132, 138, 145, 151, 155, 158, 159, 159, 159, 159, 159, 159], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '0',
    line: {
      color: 'rgb(234, 153, 153)', //rosa
      width: 4
    }

  };

  var trace6 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [97, 103, 109, 115, 120, 126, 132, 139, 145, 149, 152, 153, 153, 153, 154, 154, 154], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '-1',
    line: {
      color: 'rgb(234, 153, 153)', //rosa
      width: 1
    }

  };

  var trace7 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [93, 99, 104, 110, 115, 120, 126, 132, 138, 143, 146, 147, 148, 148, 148, 148, 149], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '-2',
    line: {
      color: 'rgb(234, 153, 153)', //rosa
      width: 1
    }

  };

  var trace8 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [88, 94, 100, 105, 109, 114, 119, 126, 132, 137, 140, 141, 142, 142, 143, 143, 143], //NIÑOS
    // type: 'scatter',

    mode: 'lines',
    name: '-3',
    line: {
      color: 'rgb(234, 153, 153)', //rosa
      width: 1,
      dash: 'dot'

    }

  };

  var trace9 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [25, 30, 36, 43, 50, 58, 66, 74, 80, 85, 88, 90, 90, 90, 90, 90, 90], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+3',
    line: {
      width: 2,
      dash: 'dot', 
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace10 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [21, 25, 29, 34, 39, 45, 51, 58, 64, 68, 72, 73, 74, 74, 74, 74, 75], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+2',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace11 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [18, 21, 24, 28, 32, 36, 41, 46, 52, 56, 59, 61, 62, 62, 62, 63, 64], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+1',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace12 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [16, 18, 21, 23, 26, 30, 34, 37, 42, 47, 50, 52, 53, 54, 54, 54 , 55], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '0',
    line: {
      width: 4,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace13 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [14, 16, 18, 20, 22, 25, 28, 32, 36, 39, 42, 44, 46, 47, 48, 48, 49], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-1',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace14 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [13, 14, 16, 18, 20, 22, 24, 27, 31, 34, 37, 39, 40, 41, 42, 43, 44], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-2',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace15 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [12, 13, 14, 16, 17, 19, 21, 24, 27, 29, 32, 34, 36, 37, 38, 39, 40], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-3',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
      dash: 'dot'
    }

  };

  // // var data = [trace1];
  // var data = [trace1, trace2, trace3];
  var data = [trace0,trace1, trace2, trace3, trace4, trace5, trace6, trace7, trace8, trace9, trace10, trace11, trace12, trace13, trace14, trace15];

  var layout = {
    title:'Estatura Y Peso Niñas: 4 a 20 años ',
    showlegend: false
  };

  Plotly.newPlot('graficaEstaturaNiña', data, layout);

</script>

<!-- GRAFICA PESO NIÑAS -->
<!-- <script type="text/javascript">
  
  datosX = crearCadenaLineal('<?php echo $datosX ?>');
  datosYPeso = crearCadenaLineal('<?php echo $datosYPeso ?>');

  var trace1 = {
    x: datosX,
    y: datosYPeso,
    mode: 'markers',
    name: 'Posición Niño',
    marker: {
      color: 'rgba(67,67,67,1)', // piel
      size: 14
    }
  };

  var trace2 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [25, 30, 36, 43, 50, 58, 66, 74, 80, 85, 88, 90, 90, 90, 90, 90, 90], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+3',
    line: {
      width: 2,
      dash: 'dot', 
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace3 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [21, 25, 29, 34, 39, 45, 51, 58, 64, 68, 72, 73, 74, 74, 74, 74, 75], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+2',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace4 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [18, 21, 24, 28, 32, 36, 41, 46, 52, 56, 59, 61, 62, 62, 62, 63, 64], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '+1',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace5 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [16, 18, 21, 23, 26, 30, 34, 37, 42, 47, 50, 52, 53, 54, 54, 54 , 55], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '0',
    line: {
      width: 4,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace6 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [14, 16, 18, 20, 22, 25, 28, 32, 36, 39, 42, 44, 46, 47, 48, 48, 49], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-1',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace7 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [13, 14, 16, 18, 20, 22, 24, 27, 31, 34, 37, 39, 40, 41, 42, 43, 44], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-2',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
    }

  };

  var trace8 = {
    x: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    y: [12, 13, 14, 16, 17, 19, 21, 24, 27, 29, 32, 34, 36, 37, 38, 39, 40], //NIÑOS PESO -3
    // type: 'scatter',

    mode: 'lines',
    name: '-3',
    line: {
      width: 1,
      color: 'rgb(234, 153, 153)', //rosa
      dash: 'dot'
    }

  };

  // // var data = [trace1];
  // var data = [trace1, trace2, trace3];
  var dataPesoNiños = [trace1, trace2, trace3, trace4, trace5, trace6, trace7, trace8];

  var layoutPesoNiños = {
    title:'Peso Niñas: 4 a 20 años ',
    showlegend: false
  };

  Plotly.newPlot('graficaPesoNiña', dataPesoNiños, layoutPesoNiños);

</script> -->