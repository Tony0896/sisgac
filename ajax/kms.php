<?php
$eco=$_POST['Eco'];
include_once('../include/conn.php');
$sql = "SELECT * from Carga_gasolina WHERE unidad= '$eco' ORDER BY fecha DESC LIMIT 1";
$datos= mysqli_query($conn, $sql);

$resultado1=mysqli_fetch_object($datos);
echo json_encode($resultado1);
mysqli_close($conn);
?>