<?php
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";
$conn = mysqli_connect($servername, $username, $password, $database);
$RFC=$_POST['RFC'];
//echo $RFC;
$sql = "SELECT nombre, r_social, rfc, correo, id_categoria FROM Proveedores WHERE rfc ='$RFC'";
$datos= mysqli_query($conn, $sql);
$resultado1=mysqli_fetch_object($datos);
echo json_encode($resultado1);
mysqli_close($conn);
?>