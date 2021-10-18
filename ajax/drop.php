<?php
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";

$clave=$_POST['clave'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM `Carga_gasolina` WHERE id_gas='$clave';";
    // use exec() because no results are returned
    $conn->exec($sql);
    $resultado1="<script language='javascript'> Swal.fire('Eliminado correctamente','','success')
    $('#exampleModal').modal('hide');
    zona();
    kms();
    hoy();
    </script>;";
} catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    $resultado1="<script language='javascript'>  Swal.fire({icon: 'error', title: 'Ocurrio un error',})
    </script>;";
}
$conn = null;
echo $resultado1;
?>