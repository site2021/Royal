<?php
session_start();
if (isset($_SESSION['usuario'])) {
  echo "";
}else{
  header("Location: index.html");
  exit();
}
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

    <!-- <script type="text/javascript" src="jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="jeasyui/locale/easyui-lang-es.js"></script>

    <script type="text/javascript" src="js/accounting.js"></script>
    <script type="text/javascript" src="js/datagrid-filter.js"></script> -->

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
        <a href="index2.html" class="logo"><b>Mom's </b>Kitchen</a>
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
              <img src="dist/img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">

              <p><?php echo "Nutricionista"; ?></p>
              <p><?php echo $_SESSION['usuario']; ?></p>
            </div>
          </div>

          <ul class="sidebar-menu">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
            <li class="active treeview">
              <a href="perfil2.php">
                <i class="fa fa-home"></i> <span>Inicio</span> 
              </a>
              
            </li>

            <li>
              <a href="pages/porciones_nutricionista.php">
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
            Menú´s
            <small></small>
          </h1>
          <div class="box-footer">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenu()">Nuevo</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMenu()">Editar</a>
            <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMenu()">Eliminar</a> -->
          </div>


              <!-- <table id="dg" title=" CLIENTES" class="easyui-datagrid" style="width:100%;height:400px"      
              url="user_get.php"
              toolbar="#toolbar" singleSelect="true">
              <thead>
                <tr>
                  <th field="usuario" width="300">usuario</th>
                  <th field="clave" width="300">clave</th>
                  <th field="nombre" width="300">nombre</th>      
                </tr>
              </thead>
            </table> -->
        

        <table id="dg" title=" MENÚ'S" class="easyui-datagrid" style="width:100%;height:400px"      
          url="json/menus_get.php"
          toolbar="#toolbar" singleSelect="true">
          <thead>
            <tr>
              <th field="dia" width="216">Día</th>
              <th field="sopa" width="216">Sopa</th>
              <th field="principio" width="218">Principio</th>
              <th field="carne" width="218">Carne</th>      
              <th field="jugo" width="218">Jugo</th>      
              <th field="observacion" width="218">Observacion</th>      
              <th field="aprobacion" width="218">aprobacion</th>      
            </tr>
          </thead>
        </table>

        <div id="dlg" class="easyui-dialog" class="box box-success" closed="true" style="width: 60%">
          
          <form id="fm" method="post" novalidate>
          <div class="box-body">
            <label>Día</label>
            <select id="dia" name="dia" class="form-control" placeholder="Seleccione el día" editable="false">
              <option value="Semana 1 - Lunes">Semana 1 - Lunes</option>
              <option value="Semana 1 - Martes">Semana 1 - Martes</option>
              <option value="Semana 1 - Miercoles">Semana 1 - Miercóles</option>
              <option value="Semana 1 - Jueves">Semana 1 - Jueves</option>
              <option value="Semana 1 - Viernes">Semana 1 - Viernes</option>

              <option value="Semana 2 - Lunes">Semana 2 - Lunes</option>
              <option value="Semana 2 - Martes">Semana 2 - Martes</option>
              <option value="Semana 2 - Miercoles">Semana 2 - Miercóles</option>
              <option value="Semana 2 - Jueves">Semana 2 - Jueves</option>
              <option value="Semana 2 - Viernes">Semana 2 - Viernes</option>

              <option value="Semana 3 - Lunes">Semana 3 - Lunes</option>
              <option value="Semana 3 - Martes">Semana 3 - Martes</option>
              <option value="Semana 3 - Miercoles">Semana 3 - Miercóles</option>
              <option value="Semana 3 - Jueves">Semana 3 - Jueves</option>
              <option value="Semana 3 - Viernes">Semana 3 - Viernes</option>

              <option value="Semana 4 - Lunes">Semana 4 - Lunes</option>
              <option value="Semana 4 - Martes">Semana 4 - Martes</option>
              <option value="Semana 4 - Miercoles">Semana 4 - Miercóles</option>
              <option value="Semana 4 - Jueves">Semana 4 - Jueves</option>
              <option value="Semana 4 - Viernes">Semana 4 - Viernes</option>
            </select>
            <br/>
            <label>Sopa</label>
            <select id="sopa" name="sopa" class="form-control" editable="false">
              <option value="Sancocho">Sancocho</option>
              <option value="Ajiaco">Ajiaco</option>
              <option value="Mondongo">Mondongo</option>
              <option value="Verduras">Verduras</option>
              <option value="Tomate">Tomate</option>
            </select>
            <br/>
            <label>Principio</label>
            <select id="principio" name="principio" class="form-control" editable="false">
              <option value="Lentejas">Lentejas</option>
              <option value="Frijoles">Frijoles</option>
              <option value="Espagueti">Espagueti</option>
              <option value="Pure de papa">Puré de Papá</option>
              <option value="Verduras">Verduras</option>
            </select>
            <br/>
            <label>Carne</label>
            <select id="carne" name="carne" class="form-control" editable="false">
              <option>Res asada</option>
              <option>Cerdo asada</option>
              <option>Chuleta</option>
              <option>Pollo en salsa</option>
              <option>Gulash</option>
            </select>
            <br/>
            <label>Jugos</label>
            <select id="jugo" name="jugo" class="form-control" editable="false">
              <option value="Mango">Mango</option>
              <option value="Piña">Piña</option>
              <option value="Guayaba agria">Guayaba agria</option>
              <option value="Mora">Mora</option>
              <option value="Lulo">Lulo</option>
            </select>
            <br/>
            <label>Observaciones</label>
            <textarea id="observacion" name="observacion" class="form-control" rows="2" placeholder="Escriba las observaciones"></textarea>
            <br/>
            <label>Aprobación</label>
            <select id="aprobacion" name="aprobacion" class="form-control">
              <option value="Vacio">Seleccione</option>
              <option value="Aprobado">Aprobado</option>
            </select>
          </div>
          <!-- <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div> -->
          <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()" style="width:90px">OK</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
          </div>
          <br>
        </div>
        </section>
              <!-- <table id="dg" title=" CLIENTES" class="easyui-datagrid" style="width:100%;height:400px"      
              url="user_get.php"
              toolbar="#toolbar" singleSelect="true">
              <thead>
                <tr>
                  <th field="usuario" width="300">usuario</th>
                  <th field="clave" width="300">clave</th>
                  <th field="nombre" width="300">nombre</th>      
                </tr>
              </thead>
            </table> -->

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

    <script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
    <script type="text/javascript" src="js/bootstrap.js"></script> 
    <script type="text/javascript" src="js/SmoothScroll.js"></script> 
    <script type="text/javascript" src="js/nivo-lightbox.js"></script> 
    <script type="text/javascript" src="js/main.js"></script>

    <script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="jeasyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/demo/demo.css"> -->
    
    <script type="text/javascript" src="jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="jeasyui/locale/easyui-lang-es.js"></script>


  </body>
</html>

<style type="text/css">
    #fm{
      margin:0;
      padding:10px 30px;
    }
    .ftitle{
      font-size:14px;
      font-weight:bold;
      padding:5px 0;
      margin-bottom:10px;
      border-bottom:1px solid #ccc;
    }
    .fitem{
      margin-bottom:5px;
    }
    .fitem label{
      display:inline-block;
      width:80px;
    }
    .fitem input{
      width:160px;
    }
  </style>

<script type="text/javascript">
  debugger
  
  var url;
  function newMenu(){
    $('#dlg').dialog('open').dialog('setTitle','MENÚ');
    $('#fm').form('clear');
    url = 'json/menus.php';
  }

  function editMenu(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
      $('#dlg').dialog('open').dialog('setTitle','Editar MENÚ');
      $('#fm').form('load',row);
      url = 'json/menu_update.php?id='+row.id;
    }
  }

  function destroyMenu(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
      $.messager.confirm('Confirm','Esta seguro de remover el menú: ' + row.dia,function(r){
        if (r){
          $.post('json/menu_destroy.php',{id:row.id},function(result){
            if (result.success){
              $('#dg').datagrid('reload');  // reload the user data
            } else {
              $.messager.show({ // show error message
                title: 'Error',
                msg: result.errorMsg
              });
            }
          },'json');
        }
      });
    }
  }

  function saveUser(){
    $('#fm').form('submit',{
      url: url,
      onSubmit: function(){
        return $(this).form('validate');
      },
      success: function(result){
        //var result = eval('('+result+')');
        if (result.errorMsg){
          $.messager.show({
            title: 'Error',
            msg: result.errorMsg
          });
        } else {
          $('#dlg').dialog('close');    // close the dialog
          $('#dg').datagrid('reload');  // reload the user data
        }
      }
    });
  }

</script>