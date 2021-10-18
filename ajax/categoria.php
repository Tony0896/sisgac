<?php
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";
$categoria=$_POST['categoria'];
//echo $RFC;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `cat_provedores`(`categoria`) VALUES ('$categoria')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $resultado1="<script language='javascript'> Swal.fire('Registro agregado correctamente','','success')</script>;";
    //echo"<script language='javascript'>window.location='/sisgac/claves.php?valor=$eco'</script>;";
} catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    $resultado1="<script language='javascript'>  Swal.fire({icon: 'error', title: 'Ocurrio un error',})</script>;";
}
$conn = null;
echo($resultado1);
?>