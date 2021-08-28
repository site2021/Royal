<?php

  $usuario=$_GET['usuario'];
  $estado=$_GET['estado'];

  if ($usuario!=''){
    include '../../control/conex.php';
    
    //Creamos la conexión
    //$conexion = mysqli_connect($server, $user, $pass, $bd)
    //or die("Ha sucedido un error inexperado en la conexion de la base de datos");

    //generamos la consulta
    $sql = "UPDATE tbusuarios SET estado=".$estado." WHERE usuario='".$usuario."'";
    $result = mysqli_query($conexion, $sql);

  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mom's Kitchen | Iniciar Sesión</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">

        <div id="variables" style="display:none">         
          <input id="xnombre" class="textbox" style="width:90%;height:20px" name="xnombre">
          <input id="xestado" class="textbox" style="width:90%;height:20px" name="xestado">
          <input id="xvalor" class="textbox" style="width:90%;height:20px" name="xvalor">
          <input id="xperfil" class="textbox" style="width:90%;height:20px" name="xperfil">           
        </div>
        <a href="../index.html"><b>Mom's </b>Kitchen</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicia Sesión</p>
<!-- 
        <form action='../control/validar.php' method="post">
      <input placeholder="Usuario" name='txtusuario'>
      <input type="password" placeholder="Contraseña" name='txtpass'>
      <button type="submit" name="login">Login</button>
    </form>
 -->

        <form action='../control/validar.php' method="post">
        <!-- <form action="../../index2.html" method="post"> -->
          <div class="form-group has-feedback">
            <input id="txtusuario" name="txtusuario" type="text" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input id="txtpass" name="txtpass" type="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">




            <select id="txtperfil" name="txtperfil" type="password" class="form-control" placeholder="Tipo de Usuario">
              <option >Seleccione</option>
              <option value="00">Estudiante</option>
              <option value="02">Nutricionista</option>
              <option value="03">Jefe de Cocina</option>
              <option value="04">Auxiliar de Cocina</option>
              <option value="05">Enfermería</option>
              <option value="06">Administrador</option>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </select>
          </div>

          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <!-- <label>
                  <input type="checkbox"> Remember Me
                </label> -->
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div><!-- /.col -->
          </div>
        </form>



        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>
 -->
        <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>