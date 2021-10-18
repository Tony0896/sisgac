<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
 $clave=$_POST['clave'];
 //echo ($clave);
$Correcto="<script>
Swal.fire('Eliminado','','success');
$('#exampleModal').modal('hide');
consulta();
</script>";
$conn = mysqli_connect($servername, $username, $password, $database);
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="DELETE FROM `depositos` WHERE id_oper = $clave";
    $conn->exec($sql);
  echo ($Correcto);
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
?>