<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";

$entidad=$_POST['Entidad'];
$ruta=$_POST['Ruta'];
$sap=$_POST['SAP'];
$plaza=$_POST['Plaza'];
$tolerancia=$_POST['Tolerancia'];
$costo=$_POST['Costo'];
$dias=$_POST['Dias'];
$usuario=$_POST['Usuario'];
$datos[] = [$entidad,$ruta,$sap,$plaza,$tolerancia,$dias];
$Todo="<script>
  Swal.fire('Agregado con éxito','','success');
  document.getElementById('lista11').value = '';
  document.getElementById('lista21').value = '';
  document.getElementById('SAP').value = '';
  document.getElementById('plaza').value = '';
  document.getElementById('tolerancia').value = '';
  document.getElementById('costo').value = '';
  document.getElementById('lista4').value = '';
  $('#exampleModal').modal('hide');
</script>";
$conn = mysqli_connect($servername, $username, $password, $database);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO estacionamientos VALUES (null,'$entidad','$ruta','$sap','$plaza','$tolerancia','$costo','$dias','$usuario');";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo json_encode ($Todo);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
//echo json_encode($datos);
?>