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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="../jeasyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../jeasyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../jeasyui/themes/color.css">
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
                  <a href="../control/cerrar.php" class="">Cerrar Sesión </a>
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
              <img src="../dist/img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">

              <p><?php echo "Nutricionista"; ?></p>
              <p><?php echo $_SESSION['usuario']; ?></p>
            </div>
          </div>

          <ul class="sidebar-menu">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
            <li class="active treeview">
              <a href="../perfil2.php">
                <i class="fa fa-home"></i> <span>Inicio</span> 
              </a>
              
            </li>

            <li>
              <a href="porciones_nutricionista.php">
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
            Porciones
            <small></small>
          </h1>
          <div class="box-footer">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newPorcion()">Nuevo</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editPorcion()">Editar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyPorcion()">Eliminar</a>
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
        

          <table id="dg" title="MINUTAS" class="easyui-datagrid" style="width:100%;height:400px"      
            url="../json/porciones_get.php"
            toolbar="#toolbar" singleSelect="true">
            <thead>
              <tr>
                <th field="edad" width="215">Edad</th>
                <th field="alimento" width="215">Grupo Alimento</th>
                <th field="pbruto" width="215">P. Bruto</th>
                <th field="pneto" width="215">P. Neto</th>
                <th field="udcasera" width="215">Unidad Casera</th>      
              </tr>
            </thead>
          </table>

          <div id="dlg" class="easyui-dialog" class="box box-success" closed="true" style="width: 60%">
            
            <form id="fm" method="post" novalidate>
            <div class="box-body">
              <label>Edad</label>
              <select id="edad" name="edad" class="form-control" placeholder="Seleccione el día">
                <option value="2a5">2 a 5 años</option>
                <option value="6a12">6 a 12 años</option>
                <option value="13a18">13 a 18 años</option>
              </select>

              <label>Grupo Alimento</label>
              <input id="alimento" name="alimento" class="form-control"></input>
              <br/>

              <label>Peso Bruto</label>
              <input id="pbruto" name="pbruto" class="form-control"></input>
              <br/>

              <label>Peso Neto</label>
              <input id="pneto" name="pneto" class="form-control"></input>
              <br/>

              <label>Unidad Casera</label>
              <input id="udcasera" name="udcasera" class="form-control"></input>
              <br/>
            </div>
            <!-- <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div> -->
            <div id="dlg-buttons">
              <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="savePorcion()" style="width:90px">OK</a>
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
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>

    <script type="text/javascript" src="../js/jquery.1.11.1.js"></script> 
    <script type="text/javascript" src="../js/bootstrap.js"></script> 
    <script type="text/javascript" src="../js/SmoothScroll.js"></script> 
    <script type="text/javascript" src="../js/nivo-lightbox.js"></script> 
    <script type="text/javascript" src="../js/main.js"></script>

    <script type="text/javascript" src="../jeasyui/jquery.easyui.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="jeasyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="jeasyui/demo/demo.css"> -->
    
    <script type="text/javascript" src="../jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="../jeasyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../jeasyui/locale/easyui-lang-es.js"></script>


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
  function newPorcion(){
    $('#dlg').dialog('open').dialog('setTitle','PORCIÓN');
    $('#fm').form('clear');
    url = '../json/porciones.php';
  }

  function editPorcion(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
      $('#dlg').dialog('open').dialog('setTitle','Editar PORCIÓN');
      $('#fm').form('load',row);
      url = '../json/porcion_update.php?id='+row.id;
    }
  }

  function destroyPorcion(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
      $.messager.confirm('Confirm','Esta seguro de remover la porción: ' + row.alimento,function(r){
        if (r){
          $.post('../json/porcion_destroy.php',{id:row.id},function(result){
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

  function savePorcion(){
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