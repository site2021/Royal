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
		$this->view_page($pagina);die;
		
	}

	function principalg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iprincipalg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function principalcheq($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iprincipalcheq.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function principalempresa($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iprincipalempresa.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	// function principalgimpereira($xusuario,$xnombre,$xperfil) {
	// 	$pagina = $this->load_template('Titulo',$xperfil);
	// 	$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
	// 	$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
	// 	$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
	// 	$html = $this->load_page('secciones/iprincipalgimpereira.php');
	// 	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
	// 	$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
	// 	$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
	// 	$this->view_page($pagina);
		
	// }

	function principaltrekking($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iprincipaltrekking.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function conductores($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iconductores.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function encuestacovid($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iencuestacovid.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function empresacovid($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iempresacovid.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function empresacovid2($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iempresacovid2.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function condsaludliceo($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icondsaludliceo.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function conductoresrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iconductoresrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function conductoresg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iconductoresg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function personalrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ipersonalrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function vehiculosrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ivehiculosrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function vehiculosg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ivehiculosg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function pqautomotorg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ipqautomotorg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function pqautomotorrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ipqautomotorrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function pqautomotorre($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ipqautomotorre.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function contratosrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icontratosrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function contratosg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icontratosg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function contradigitalg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icontradigitalg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function contradigitalrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icontradigitalrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function contradigitalre($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icontradigitalre.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function extractosrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iextractosrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
	}

	function extractosg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iextractosg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
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
		$this->view_page($pagina);die;
		
	}

	function rutas_extractosg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/irutas_extractosg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function colaboracion_empresarialrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icolaboracion_empresarialrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function colaboracion_empresarialg3($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/icolaboracion_empresarialg3.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function accidentesrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iaccidentesrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	// function vehiculostour($xusuario,$xnombre,$xperfil) {
	// 	$pagina = $this->load_template('Titulo',$xperfil);
	// 	$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
	// 	$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
	// 	$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
	// 	$html = $this->load_page('secciones/ivehiculostour.php');
	// 	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
	// 	$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
	// 	$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
	// 	$this->view_page($pagina);
		
	// }

	// function contratostour($xusuario,$xnombre,$xperfil) {
	// 	$pagina = $this->load_template('Titulo',$xperfil);
	// 	$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
	// 	$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
	// 	$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
	// 	$html = $this->load_page('secciones/icontratostour.php');
	// 	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
	// 	$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
	// 	$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
	// 	$this->view_page($pagina);
		
	// }

	// function extractostour($xusuario,$xnombre,$xperfil) {
	// 	$pagina = $this->load_template('Titulo',$xperfil);
	// 	$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
	// 	$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
	// 	$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
	// 	$html = $this->load_page('secciones/iextractostour.php');
	// 	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
	// 	$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
	// 	$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
	// 	$this->view_page($pagina);
		
	// }

	// function rutas_extractostour($xusuario,$xnombre,$xperfil) {
	// 	$pagina = $this->load_template('Titulo',$xperfil);
	// 	$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
	// 	$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
	// 	$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
	// 	$html = $this->load_page('secciones/irutas_extractostour.php');
	// 	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
	// 	$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
	// 	$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
	// 	$this->view_page($pagina);
		
	// }

	// function colaboracion_empresarialtour($xusuario,$xnombre,$xperfil) {
	// 	$pagina = $this->load_template('Titulo',$xperfil);
	// 	$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
	// 	$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
	// 	$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
	// 	$html = $this->load_page('secciones/icolaboracion_empresarialtour.php');
	// 	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
	// 	$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
	// 	$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
	// 	$this->view_page($pagina);
		
	// }

	function alistamientos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/ialistamientos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function estudiantecontrato($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iestudiantecontrato.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	// function datosvehcliente($xusuario,$xnombre,$xperfil) {
	// 	$pagina = $this->load_template('Titulo',$xperfil);
	// 	$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
	// 	$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
	// 	$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
	// 	$html = $this->load_page('secciones/idatosvehcliente.php');
	// 	$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
	// 	$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
	// 	$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
	// 	$this->view_page($pagina);
		
	// }

	function mantenimientos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/imantenimientos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function infovehiculos($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iinfovehiculos.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function infoconductores($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iinfoconductores.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function clientesrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iclientesrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
	}

	function ventasrt($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');				
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iventasrt.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;	
		
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
		$this->view_page($pagina);die;	
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;	
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;
		
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
		$this->view_page($pagina);die;	
		
	}

	function registrochequeate($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrochequeate.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrosempresa($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrosempresa.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrosgimpereira($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrosgimpereira.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrospinoverde($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrospinoverde.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrossalle($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrossalle.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}
	//pago del gim pereira
	function regcolgimpereira($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregcolgimpereira.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registroshillside($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistroshillside.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrosempresa8($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrosempresa8.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrosempresa9($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrosempresa9.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrosempresa10($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrosempresa10.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}

	function registrostrekking($xusuario,$xnombre,$xperfil) {
		$pagina = $this->load_template('Titulo',$xperfil);
		$menu = $this->load_page('secciones/menu/menu'.$xperfil.'.html');			
		$pagina = $this->replace_content('/\#MENU\#/ms' ,$menu , $pagina);
		$pagina = $this->replace_content('/\#PERFIL\#/ms' ,$xperfil , $pagina);
		$html = $this->load_page('secciones/iregistrostrekking.php');
		$pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);		
		$pagina = $this->replace_content('/\#USUARIO\#/ms' ,$xusuario , $pagina);
		$pagina = $this->replace_content('/\#NOMBRE\#/ms' ,$xnombre , $pagina);
		$this->view_page($pagina);die;
		
	}
	
	function load_template($title='sin titulo',$perfil=0){
		if($perfil == '05'){
			$pagina = $this->load_page('secciones/pageg3.php');
			return $pagina;
		}
		// else if ($perfil == '06') {
		// 	$pagina = $this->load_page('secciones/pagecheq.php');
		// 	return $pagina;
		// }
		// royal express
		// else if ($perfil == '06' || $perfil == '07' || $perfil =='08' || $perfil == '09' || $perfil == '10' || $perfil == '11' || $perfil == '12' || $perfil == '13' || $perfil == '14' || $perfil == '15' || $perfil == '16') {
		// 	$pagina = $this->load_page('secciones/pageempresa.php');
		// 	return $pagina;
		// }
		else if ($perfil == '06' || $perfil == '07' || $perfil =='08' || $perfil =='09' || $perfil =='10'  || $perfil =='11'  || $perfil =='12'  || $perfil =='13' ) {
			$pagina = $this->load_page('secciones/pageempresa.php');
			return $pagina;
		}
		// else if ($perfil == 08) {
		// 	$pagina = $this->load_page('secciones/pageempresa.php');
		// 	return $pagina;
		// }
		// else if ($perfil == '09') {
		// 	$pagina = $this->load_page('secciones/pageempresa3.php');
		// 	return $pagina;
		// }

		else{
			$pagina = $this->load_page('secciones/page.php');		  
			return $pagina;
		}
		
		
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