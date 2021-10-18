<?php
$clave=$_POST['clave'];
include_once('../include/conn.php');
$sql = "SELECT * from Carga_gasolina WHERE id_gas= '$clave'";
$datos= mysqli_query($conn, $sql);

$resultado1=mysqli_fetch_object($datos);
echo json_encode($resultado1);
mysqli_close($conn);
?>