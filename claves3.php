
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
       // header ("Location: http://localhost:8080/claves/claves.php?valor=810");
       // exit();
        if(isset($_GET['idcomandoCierre']))
{
$idcomandoCierre=$_GET['idcomandoCierre'];
//echo $idcomandoCierre;  ?>
<br>
<?php
if(isset($_GET['numeroCierre']))
{
$numeroCierre=$_GET['numeroCierre'];
}//echo $numero;  ?><br>
<?php
if(isset($_GET['usuario']))
{
$usuario=$_GET['usuario'];
}//echo $numero;  ?><br>
<?php
if(isset($_GET['countCierre']))
{
$countCierre=$_GET['countCierre'];
//echo $count;
} ?>
<br>
<?php
}
if(isset($_GET['claveCierre']))
{
$ClaveCierre=$_GET['claveCierre'];
//echo $ClaveCierre;
} ?>
<br>
<?php
if(isset($_GET['eco']))
{
$eco=$_GET['eco'];
//echo $eco;
}

$sql="SELECT id_2teclado FROM Unidad WHERE ECO = $eco";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
        $idcomandoCierrei=$row->id_2teclado;
    }  mysqli_close($conn);
    $idcomandoUltCierre=$idcomandoCierrei+1;
if ($idcomandoCierrei=='0'){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Unidad SET id_2teclado='$idcomandoCierre', UltCalve2teclado='$ClaveCierre' WHERE ECO=$eco";
        // use exec() because no results are returned
        $conn->exec($sql);
        $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'ClaveCierre','$idcomandoUltCierre','$idcomandoCierrei','$eco')";
        // use exec() because no results are returned
        $conn->exec($sql);
        ?>
    <br>
    <?php
        //echo "New record created successfully";
        echo"<script language='javascript'>window.location='/sisgac/claves.php?valor=$eco'</script>;";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}else{
    if ($idcomandoCierre==$idcomandoUltCierre){
        if ($numeroCierre==$countCierre){
        // echo "igual";
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Unidad SET id_2teclado='0', UltCalve2teclado='' WHERE ECO=$eco";
        // use exec() because no results are returned
        $conn->exec($sql);
        $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'ClaveCierre','$idcomandoUltCierre','$idcomandoCierrei','$eco')";
            // use exec() because no results are returned
        $conn->exec($sql);
        ?>
    <br>
    <?php
        //echo "New record created successfully";
        echo"<script language='javascript'>window.location='/sisgac/claves.php?valor=$eco'</script>;";
        exit();
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
    }else{ 
        //echo "no igual";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Unidad SET id_2teclado='$idcomandoCierre', UltCalve2teclado='$ClaveCierre' WHERE ECO=$eco";
        // use exec() because no results are returned
        $conn->exec($sql);
        $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'ClaveCierre','$idcomandoUltCierre','$idcomandoCierrei','$eco')";
        // use exec() because no results are returned
        $conn->exec($sql);
        ?>
    <br>
    <?php
        //echo "New record created successfully";
        echo"<script language='javascript'>window.location='/sisgac/claves.php?valor=$eco'</script>;";
        exit();
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    }
}else{
    echo"<script type='text/javascript'>
        Swal.fire({icon: 'error', title: 'Parece que alguien ya dio esta clave se refresacara la página para mostrar la clave correcta',})
        window.location='/sisgac/claves.php?valor=$eco';
        </script>";
}
}
            ?>