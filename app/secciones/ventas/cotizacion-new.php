<?php
require('code128-rev.php');

$numero = $_REQUEST['numero'];
$usuario = $_REQUEST['usuario'];

include '../../control/conex.php';

// nombre de usuario
$rs = mysqli_query($conexion, "SELECT * FROM tbusuarios WHERE usuario='$usuario' ");

$urow = mysqli_fetch_object($rs);
$nombreUsuario = $urow->nombre;
$ejecutivo = $urow->ejecutivo;

$rs = mysqli_query($conexion, "SELECT * FROM tbregistros WHERE numero=$numero");
$row = mysqli_fetch_object($rs);

$xfecha = $row->fecha;
$xcontacto = $row->contacto;
$xempresa = $row->empresa;

$xdireccion = $row->direccion;
$xtelefono = $row->telefono;
$xdestino = $row->destino;
$xnit = $row->nit;

$xdescripcion = $row->descripcion;
$xobservacion = $row->observacion;

$xtipovehiculo = $row->tipovehiculo;
$xnpax = $row->npax;
$xdias = $row->dias;
$xvalorservicio = $row->valorservicio;

$xobservacion = $row->observacion;

function encabezado($wpdf,$pfecha,$pcontacto,$pempresa,$pdireccion,$ptelefono,$pnit,$pnumero,$pnombreUsuario){
	// datos
	$wpdf->SetFont('Arial','',8);
	$wpdf->SetXY(140,35);$wpdf->Cell(20,5,$pfecha,0,0,'L');
	$wpdf->SetXY(35,70);$wpdf->Cell(75,5,$pcontacto,0,0,'L');
	$wpdf->SetXY(35,75);$wpdf->Cell(75,5,$pempresa,0,0,'L');
	$wpdf->SetXY(35,80);$wpdf->Cell(75,5,$pdireccion,0,0,'L');
	$wpdf->SetXY(35,85);$wpdf->Cell(75,5,$ptelefono,0,0,'L');
	//$wpdf->SetXY(35,90);$wpdf->Cell(75,5,$xdestino,0,0,'L');

	$wpdf->SetXY(120,70);$wpdf->Cell(75,5,$pnit,0,0,'L');

	//$wpdf->SetXY(12,165);$wpdf->multiCell(95,5,$xdescripcion,0,'L');
	//$wpdf->SetXY(10,110);$wpdf->multiCell(100,5,$xobservacion,0,'L');

	// valores
	//$wpdf->SetXY(110,100);$wpdf->Cell(25,5,$xtipovehiculo,0,0,'C');
	//$wpdf->SetXY(135,100);$wpdf->Cell(20,5,$xnpax,0,0,'C');
	//$wpdf->SetXY(155,100);$wpdf->Cell(20,5,$xdias,0,0,'C');
	//$wpdf->SetXY(175,100);$wpdf->Cell(30,5,number_format($xvalorservicio),0,0,'R');

	// logo
	$wpdf->Image('royal001.jpg',4,4,80);
	$wpdf->SetFont('Arial','B',8);

	// numero
	$wpdf->SetFont('Arial','B',16);
	$wpdf->SetTextColor(146,208,80);	
	$wpdf->SetXY(100,15);$wpdf->Cell(108,5,'COTIZACION',0,0,'C');

	
	$wpdf->SetTextColor(0,0,0);
	$wpdf->SetFont('Arial','B',10);
	$wpdf->SetXY(100,20);$wpdf->Cell(108,5,'No:'.$pnumero,0,0,'C');

	//A set - codigo barra
	$wpdf->SetFillColor(0,0,0);
	$wpdf->SetFont('Arial','B',10);
	$code=$pnumero;
	$wpdf->SetXY(100,25);
	$wpdf->Code128(140,25,$code,30,8);


	// encabezado
	$wpdf->SetFont('Arial','B',7);
	$wpdf->SetXY(10,35);$wpdf->Cell(100,5,'Cra 13 # 14-60 C.C. Marbella Loc. 208',0,0,'L');
	$wpdf->SetXY(10,40);$wpdf->Cell(100,5,'Pereira, Risaralda',0,0,'L');
	$wpdf->SetXY(10,45);$wpdf->Cell(100,5,utf8_decode('Teléfono: 3335401'),0,0,'L');
	$wpdf->SetXY(10,50);$wpdf->Cell(100,5,'Celular: 3226888228',0,0,'L');
	$wpdf->SetXY(10,55);$wpdf->Cell(100,5,'Asesor de venta: '.$pnombreUsuario,0,0,'L');

	$wpdf->SetFont('Arial','B',8);
	// fecha
	$wpdf->SetXY(120,35);$wpdf->Cell(20,5,'FECHA:',0,0,'L');

	// detalle
	$wpdf->SetFont('Arial','B',11);
	$wpdf->SetFillColor(146,208,80);
	$wpdf->SetXY(10,65);$wpdf->Cell(195,5,'CLIENTE',1,0,'C',true);

	$wpdf->SetFont('Arial','B',8);
	$wpdf->SetXY(10,70);$wpdf->Cell(25,5,'CONTACTO:',0,0,'L');
	$wpdf->SetXY(10,75);$wpdf->Cell(25,5,'EMPRESA:',0,0,'L');
	$wpdf->SetXY(10,80);$wpdf->Cell(25,5,'DIRECCION:',0,0,'L');
	$wpdf->SetXY(10,85);$wpdf->Cell(25,5,'TELEFONO:',0,0,'L');
	//$wpdf->SetXY(10,90);$wpdf->Cell(25,5,'DESTINO:',0,0,'L');

	$wpdf->SetXY(110,70);$wpdf->Cell(25,5,'NIT:',0,0,'L');

	$wpdf->SetXY(10,95);$wpdf->Cell(100,5,'DESCRIPCION:',1,0,'C',true);
	$wpdf->SetXY(110,95);$wpdf->Cell(25,5,'TIPO VEHICULO',1,0,'C',true);
	$wpdf->SetXY(135,95);$wpdf->Cell(20,5,'PASAJEROS',1,0,'C',true);
	$wpdf->SetXY(155,95);$wpdf->Cell(20,5,'DIAS',1,0,'C',true);
	$wpdf->SetXY(175,95);$wpdf->Cell(30,5,'VALOR TOTAL',1,0,'C',true);

	// cuerpo documento
	$wpdf->SetXY(10,100);$wpdf->Cell(100,95,'',1,0,'C');
	$wpdf->SetXY(110,100);$wpdf->Cell(25,95,'',1,0,'C');
	$wpdf->SetXY(135,100);$wpdf->Cell(20,95,'',1,0,'C');
	$wpdf->SetXY(155,100);$wpdf->Cell(20,95,'',1,0,'C');
	$wpdf->SetXY(175,100);$wpdf->Cell(30,95,'',1,0,'C');

}

$pdf = new PDF_Code128();
$pdf->AddPage('P','Letter');

encabezado($pdf,$xfecha,$xcontacto,$xempresa,$xdireccion,$xtelefono,$xnit,$numero,$nombreUsuario);

$rsx = mysqli_query($conexion, "SELECT * FROM tbregistrosdetalles WHERE numero='$numero' ORDER BY id");

// contar las paginas
$pagina = 1;
$tpagina = 1;

$fila = 100;
while($row = mysqli_fetch_object($rsx)){

	$fila = $fila + 5;

	// definir las lineas de observacion
	$cadena = $row->destino.' - '.strtoupper($row->observalinea);
	$long = strlen($cadena);
	$cuantas = ceil($long/55);

	$fila = $fila + (4*$cuantas);

	// validar fila para nueva pagina
	if($fila>180){
		$tpagina = $tpagina + 1;

		$fila = 100;

	}
}

$pdf->SetXY(175,60);$pdf->Cell(30,5,'PAGINA: '.$pagina.'/'.$tpagina,0,0,'R',0);

$rsx = mysqli_query($conexion, "SELECT * FROM tbregistrosdetalles WHERE numero='$numero' ORDER BY id");

// imprimir detalle del registro
$fila = 100;
while($row = mysqli_fetch_object($rsx)){
	$pdf->SetFont('Arial','B',8);
	$pdf->SetXY(10,$fila);$pdf->Cell(30,5,'-'.$row->descripcion,0,0,'L');
	
	$xvehiculo = $row->vehiculo;
	if($xvehiculo!=''){
		$pdf->SetXY(110,$fila);$pdf->CellFitScale(25, 5, $xvehiculo, 0, 1, '', 0, '');	
	}
	
	$pdf->SetXY(135,$fila);$pdf->Cell(20,5,$row->pasajeros,0,0,'C');
	$pdf->SetXY(155,$fila);$pdf->Cell(20,5,$row->dias,0,0,'C');
	$pdf->SetXY(175,$fila);$pdf->Cell(30,5,number_format($row->valor),0,0,'R');

	$fila = $fila + 4;

	// definir las lineas de observacion
	$pdf->SetFont('Arial','',8);
	$cadena = $row->destino.' - '.strtoupper($row->observalinea);
	$long = strlen($cadena);
	$cuantas = ceil($long/57);

	$pdf->SetXY(15,$fila);$pdf->MultiCell(95,4,$cadena,0,'L',0);
	
	$fila = $fila + (4*$cuantas) + 2;

	// validar fila para nueva pagina
	if($fila>175){
		// imprimir pie de pagina
		pie($pdf,$nombreUsuario,$ejecutivo);

		$pdf->AddPage('P','Letter');
		encabezado($pdf,$xfecha,$xcontacto,$xempresa,$xdireccion,$xtelefono,$xnit,$numero,$nombreUsuario);

		$pagina = $pagina + 1;
		$pdf->SetXY(175,60);$pdf->Cell(30,5,'PAGINA: '.$pagina.'/'.$tpagina,0,0,'R',0);

		$fila = 100;
	}
}

// observacion general del registro
$pdf->SetXY(12,165);$pdf->MultiCell(95,28,$xobservacion,1,'L',0);

// pie de pagina de la ultima pagina
pie($pdf,$nombreUsuario,$ejecutivo);




function pie($wpdf,$pnombreUsuario,$pejecutivo){
	// terminos y condiciones
	$wpdf->SetXY(10,200);$wpdf->Cell(125,5,'TERMINOS Y CONDICIONES',1,0,'C',true);
	$wpdf->SetXY(10,200);$wpdf->Cell(125,35,'',1,0,'C');

	$wpdf->SetFont('Arial','',8);
	$wpdf->SetXY(10,205);
	$wpdf->Cell(125,5,utf8_decode('1. Se requiere confirmación previa.'),0,0,'L');

	$wpdf->SetXY(10,210);
	$wpdf->Cell(125,5,utf8_decode('2. Sujeto a disponibilidad del vehículo.'),0,0,'L');

	$wpdf->SetXY(10,215);
	$wpdf->Cell(125,5,utf8_decode('3. En caso de aceptar el servicio, se requiere anticipo del 50%, fotocopia de cédula contratante '),0,0,'L');
	$wpdf->SetXY(10,220);
	$wpdf->Cell(125,5,utf8_decode('y listado de pasajeros.'),0,0,'L');

	$wpdf->SetXY(10,225);
	$wpdf->Cell(125,5,utf8_decode('4. Validar las condiciones del vehículo y mantener el estado en el que fue encontrado.'),0,0,'L');

	$wpdf->SetXY(10,230);
	$wpdf->Cell(125,5,utf8_decode('5. Ingreso del vehículo hasta donde lo permitan las condiciones de la vía.'),0,0,'L');

	$wpdf->SetXY(10,240);
	$wpdf->Cell(200,5,utf8_decode('Si usted tiene alguna pregunta sobre esta cotización, por favor, póngase en contacto con nosotros'),0,0,'C');

	$wpdf->SetXY(10,245);
	$wpdf->Cell(200,5,utf8_decode($pnombreUsuario.',  teléfono: 3335401, célular 3148372049, E-mail:  '.$pejecutivo),0,0,'C');

	$wpdf->SetFont('Arial','BI',9);
	$wpdf->SetXY(10,250);
	$wpdf->Cell(200,5,utf8_decode('Gracias por hacer negocios con nosotros!'),0,0,'C');
}

$pdf->Output();

?>
