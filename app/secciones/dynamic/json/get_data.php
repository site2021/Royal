<?php
// tabla pasada como parametro desde la grilla
$tabla = $_REQUEST['tabla'];
$campoid = $_REQUEST['campoid'];

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page-1)*$rows;
$result = array();

//include 'conn.php';
$conn = @mysqli_connect('localhost','root','hector','portal');

$rs = mysqli_query($conn, "SELECT COUNT(*) FROM $tabla ");
$row = mysqli_fetch_row($rs);
$result["total"] = $row[0];

//$rs = mysql_query("SELECT * FROM $tabla ORDER BY id LIMIT $offset,$rows");
$rs = mysqli_query($conn, "SELECT * FROM $tabla ORDER BY $campoid ");

$items = array();
while($row = mysqli_fetch_object($rs)){
	array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);

?>