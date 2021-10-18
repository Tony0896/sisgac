<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";

$entidad=$_POST['Entidad'];
$colaborador=$_POST['Colaborador'];
$monto=$_POST['Monto'];
$tipo=$_POST['Tipo'];
$fecha=$_POST['Fecha'];
$des=$_POST['Des'];
$tipo1=$_POST['Tipo1'];
//$datos[] = [$entidad,$colaborador,$monto,$tipo,$fecha,$des];
$Todo="<script>
  Swal.fire('Agregado con éxito','','success');
  document.getElementById('monto').value = '';
  document.getElementById('fecha').value = '';
  document.getElementById('descripcion').value = '';
  document.getElementById('lista4').value = '0';
  $('#button :input').removeAttr('disabled');
</script>";
$correcto="correcto";
$incorrecto="incorrecto";
$datos[]=[$correcto];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `depositos` VALUES (null,'$entidad','$colaborador','$fecha','$monto','$des','$tipo','$tipo1');";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo json_encode ($Todo);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
//echo json_encode($colaborador);
?>