<?php // content="text/plain; charset=utf-8"
require_once ('../../jpgraph/jpgraph.php');
require_once ('../../jpgraph/jpgraph_bar.php');
require_once ('../../jpgraph/jpgraph_line.php');

include '../../control/conex.php';

function separator1000($aVal) {
    return number_format($aVal);
}

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT MONTH(fecha),MONTHNAME(fecha),SUM(credito) valor
		FROM tbmovimientos 
		WHERE codigo_cta='310505' AND YEAR(fecha)=2017 
		GROUP BY MONTH(fecha),MONTHNAME(fecha)
		ORDER BY MONTH(fecha) ";

mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

while($row = mysqli_fetch_array($result))	
{
 $data[] = $row[1]; 
 $val[] = $row[2];
 
} 

// Create the graph. These two calls are always required
$graph = new Graph(950,550);	
$graph->SetScale("textlin");
$graph->yaxis->scale->SetGrace(20);
$graph->yaxis->SetLabelFormatCallback('separator1000');

$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#EFEFEF@0.5','#C5FFBB@0.5');
$graph->xgrid->Show();

// Add a drop shadow
$graph->SetShadow();

// Adjust the margin a bit to make more room for titles
$graph->img->SetMargin(100,30,20,40);

// Create a bar pot
$bplot = new BarPlot($val);
// Adjust fill color
$bplot->SetFillColor('orange');
$bplot->value->SetMargin(80);
$bplot->value->Show();
//$bplot->SetColor("white");
//$bplot->SetFillGradient("#004400","green",GRAD_LEFT_REFLECTION);
$bplot->value->SetFormatCallback('separator1000');
$graph->Add($bplot);

// Create the linear plot
$lineplot=new LinePlot($val);
$lineplot->SetBarCenter();
$lineplot->SetColor( 'green' );
$lineplot->SetWeight( 2 );   // Two pixel wide
$lineplot->value->SetFont(FF_ARIAL,FS_BOLD);
$lineplot->mark->SetType(MARK_IMG_DIAMOND,'blue',0.5);
// Add the plot to the graph
$graph->Add($lineplot);


// Setup the titles
$graph->title->Set("Grafico APORTES asociados");
$graph->xaxis->title->Set("mes-2017");
$graph->xaxis->SetTickLabels($data);
$graph->yaxis->title->Set("Valor ($)");
$graph->yaxis->SetTitlemargin(80);

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$graph->Stroke();
?>