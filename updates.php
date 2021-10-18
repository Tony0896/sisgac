<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
$fecha=$_POST['fecha'];
$descripcion=$_POST['Des'];
$monto=$_POST['monto'];
$clave=$_POST['clave'];
$tipo=$_POST['tipo'];
$fac=$_POST['fac'];
$entidad=$_POST['entidad'];
$nombre=$_POST['nombre'];
$Correcto="<script>
Swal.fire('Registro agregado correctamente','','success');
$('#exampleModal').modal('hide');
consulta();
</script>";
$Incorrecto="<script>
Swal.fire('Registro agregado correctamente','','success');
$('#exampleModal').modal('hide');
consulta();
</script>";

//$datos[]=[$entidad, $nombre,$fecha, $descripcion,$monto,$clave,$tipo,$fac];
//echo json_encode($datos);

$conn = mysqli_connect($servername, $username, $password, $database);
if($fac==""||$fac=="0"){
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="UPDATE `depositos` SET `entidad`='$entidad',`nombre`='$nombre',`fecha`='$fecha',`monto`='$monto',`descripcion`='$descripcion',`tipo`='$tipo',`factura`='NA' WHERE id_oper = $clave";
    $conn->exec($sql);
  echo ($Correcto);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
}else{
  try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql="UPDATE `depositos` SET `entidad`='$entidad',`nombre`='$nombre',`fecha`='$fecha',`monto`='$monto',`descripcion`='$descripcion',`tipo`='$tipo',`factura`='$fac' WHERE id_oper = $clave";
  $conn->exec($sql);
echo ($Incorrecto);
} catch(PDOException $e) {
echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
}

//echo json_encode ($datos);
?>