<?
include '../../control/conex.php';

$rs = mysqli_query($conexion, "SELECT sum(credito)/1000000 FROM tbmovimientos WHERE codigo_cta='310505'");
$row = mysqli_fetch_row($rs);	

$total = $row[0];

?>
<html>
<head>
	<title>Royal-Como vamos???</title>
	<script src="gauge.min.js"></script>
</head>

<body>
	<div style="margin:1% 0 0 30%;">
		<canvas id="gauge1" width="550" height="550"
			data-type="canv-gauge"
			data-title="APORTES"
			data-min-value="0"
			data-max-value="220"
			data-major-ticks="0 20 40 60 80 100 120 140 160 180 200 220"
			data-minor-ticks="2"
			data-stroke-ticks="true"
			data-units="Millones"
			data-value-format="3.3"
			data-value="<? echo $total; ?>"
			data-glow="true"		
			data-colors-needle="#f00 #00f"
			data-highlights="0 30 #eee, 30 60 #ccc, 60 90 #aaa, 90 220 #eaa"

		></canvas>
	</div>

</body>
</html>
