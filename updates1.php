<?php 
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";

$timezone  = -6;
$time6 = gmdate("YmjHis", time() + 3600*($timezone+date("I")));
//echo $time6;
$semana = date ('W');

$id=$_POST['id'];
$status=$_POST['status'];
$motivo=$_POST['motivo'];
$transferencia=$_POST['transferencia'];
$fechaP=$_POST['fechaP'];
$cuenta=$_POST['cuenta'];

$Correcto="<script>
Swal.fire('Registro agregado correctamente','','success');
$('#exampleModal').modal('hide');
cargaPag();
</script>";
$Incorrecto="<script>
Swal.fire('Registro agregado correctamente','','success');
$('#exampleModal').modal('hide');
consulta();
</script>";

//$datos[]=[$id, $status,$motivo,$transferencia,$fechaP];
//echo json_encode($datos);

$conn = mysqli_connect($servername, $username, $password, $database);

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="UPDATE `Pago_proveedor` SET `status`='$status',`motivo`='$motivo',`fecha_pago`='$fechaP',`n_transferencia`='$transferencia', `n_cuenta_realizado`= '$cuenta', `pago_semana`='$semana' WHERE id_pago = $id";
    $conn->exec($sql);
  echo ($Correcto);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>