<?php
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";
$conn = mysqli_connect($servername, $username, $password, $database);
$semana=$_POST['semana'];
//echo $RFC;
$sql = "SELECT sum(importe) as importe1 FROM Pago_proveedor WHERE soli_semana=$semana";
$datos= mysqli_query($conn, $sql);
$resultado1=mysqli_fetch_object($datos);
echo json_encode($resultado1);
mysqli_close($conn);
?>