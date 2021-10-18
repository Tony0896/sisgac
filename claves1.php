
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
       // header ("Location: http://localhost:8080/claves/claves.php?valor=810");
       // exit();
if(isset($_GET['idcomando']))
{
$idcomando=$_GET['idcomando'];
}//echo $idcomando;  ?>
<br>
<?php
if(isset($_GET['numero']))
{
$numero=$_GET['numero'];
}//echo $numero;  ?><br>
<?php
if(isset($_GET['usuario']))
{
$usuario=$_GET['usuario'];
}//echo $numero;  ?><br>
<?php
if(isset($_GET['count']))
{
$count=$_GET['count'];
//echo $count;
} ?>
<br>
<?php
if(isset($_GET['clave']))
{
$Clave=$_GET['clave'];
//echo $Clave;
} ?>
<br>
<?php
if(isset($_GET['eco']))
{
$eco=$_GET['eco'];
//echo $eco;
}
$sql="SELECT id_apertura FROM Unidad WHERE ECO = $eco";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
        $idcomandoUlti=$row->id_apertura;
    }  mysqli_close($conn);
    $idcomandoUlt=$idcomandoUlti+1;
if ($idcomandoUlti=='0'){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Unidad SET id_apertura='$idcomando', UltClave_APER='$Clave' WHERE ECO=$eco";
        // use exec() because no results are returned
        $conn->exec($sql);
        $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'Clave','$idcomandoUlt','$idcomandoUlti','$eco')";
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
    if ($idcomando==$idcomandoUlt){
        if ($numero==$count){
            // echo "igual";
            try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Unidad SET id_apertura='0', UltClave_APER='' WHERE ECO=$eco";
            // use exec() because no results are returned
            $conn->exec($sql);
            $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'Clave','$idcomandoUlt','$idcomandoUlti','$eco')";
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
            $sql = "UPDATE Unidad SET id_apertura='$idcomando', UltClave_APER='$Clave' WHERE ECO=$eco";
            // use exec() because no results are returned
            $conn->exec($sql);
            $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'Clave','$idcomandoUlti','$idcomandoUlt','$eco')";
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
        }
    }else{
        echo"<script type='text/javascript'>
            Swal.fire({icon: 'error', title: 'Parece que alguien ya dio esta clave se refresacara la página para mostrar la clave correcta',})
            window.location='/sisgac/claves.php?valor=$eco';
            </script>";
    }
}
            ?>