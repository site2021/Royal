<?php
//
class clsIndice {

	function principal($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iprincipal.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function vehiculos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ivehiculos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function contratos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icontratos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function extractos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iextractos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function rutas_extractos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/irutas_extractos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function colaboracion_empresarial($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icolaboracion_empresarial.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function alistamientos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ialistamientos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function rutasliquidar($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/irutasliquidar.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function datosliquidar($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/idatosliquidar.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function listageneral($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ilistageneral.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function datosveh($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/idatosveh.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function datosvehcliente($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/idatosvehcliente.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function mantenimientos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/imantenimientos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function mantenimientoscliente($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/imantenimientoscliente.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function datos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/idatos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function reconocruta($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ireconocruta.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function estrategico($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iestrategico.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function clientes($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iclientes.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function certificados($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icertificados.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function tarifas($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/itarifas.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function ventas($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iventas.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function asociados($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iasociados.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function importarTer($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iimportarTer.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);		
		
	}

	function importarMov($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iimportarMov.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);		
		
	}

	function odometro($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iodometro.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);
		
	}

	function pingpong($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ipingpong.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);
		
	}

	function puzzle($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ipuzzle.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);
		
	}

	function grilla00($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/igrilla00.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);
		
	}

	function excel($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iexcel.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);
		
	}

	function logistico_double($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ilogistico_double.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);
		
	}

	function logistico_basic($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ilogistico_basic.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);
		
	}

	function usuarios($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iusuarios.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);		
		
	}

	function perfiles($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);	
		$html = $this->load_page('secciones/iperfiles.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);
		
	}

	function maestras($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);	
		$html = $this->load_page('secciones/imaestras.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);		
		
	}

	function dynamic($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);	
		$html = $this->load_page('secciones/idynamic.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);		
		$this->view_page($pagina);		
		
	}
	
	function load_template($title='sin titulo',$perfil=0){
		$pagina = $this->load_page('secciones/page.php');		  
		return $pagina;
		
	}

	private function load_page($page)
	{
		return file_get_contents($page);
	}

	private function view_page($html)
	{
		echo $html;
	}
	
	private function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);	 	
	}
}

?>