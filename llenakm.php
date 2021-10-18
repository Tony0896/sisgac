<?php
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";

$unida=$_POST['Unida'];
$kmini=$_POST['Kmini'];
$kmfin=$_POST['Kmfin'];
$fecha=$_POST['Fecha'];
$observaciones=$_POST['Observaciones'];
$motivo=$_POST['Motivo'];
$recorrido=$_POST['Recorrido'];

$datos[]=[$unida, $kmini, $kmfin, $fecha, $observaciones, $motivo, $recorrido];

$recorrido=$kmfin-$kmini;

$Todo="<script>
Swal.fire('Agregado con éxito','','success')
$('#button :input').removeAttr('disabled');
document.getElementById('unida').value = '800';
document.getElementById('kmini').value = '';
document.getElementById('kmfin').value = '';
document.getElementById('observaciones').value = '';
document.getElementById('motivo').value = '';
document.getElementById('recorrido').value = '';
</script>";

$conn = mysqli_connect($servername, $username, $password, $database);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `Recorrido` VALUES (null,'$fecha','$unida','$kmini','$kmfin','$recorrido','$observaciones','$motivo');";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo json_encode ($Todo);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

//echo json_encode ($datos);
//echo json_encode ($recorrido);

?>