<?php 
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";
$conn = mysqli_connect($servername, $username, $password, $database);
$clave=$_POST['clave'];
//echo $clave;

$sql = "SELECT * FROM depositos WHERE id_oper='".$_POST["clave"]."'";
$datos= mysqli_query($conn, $sql);

$resultado1=mysqli_fetch_object($datos);
echo json_encode($resultado1);
mysqli_close($conn); 
?>