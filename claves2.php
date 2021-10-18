
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
       // header ("Location: http://localhost:8080/claves/claves.php?valor=810");
       // exit();
        if(isset($_GET['idcomandoEM']))
{
$idcomandoEM=$_GET['idcomandoEM'];
//echo $idcomandoEM;  ?>
<br>
<?php
if(isset($_GET['numeroEM']))
{
$numeroEM=$_GET['numeroEM'];
}//echo $numero;  ?><br>
<?php
if(isset($_GET['usuario']))
{
$usuario=$_GET['usuario'];
}//echo $numero;  ?><br>
<?php
if(isset($_GET['countEM']))
{
$countEM=$_GET['countEM'];
//echo $count;
} ?>
<br>
<?php
}
if(isset($_GET['claveEM']))
{
$ClaveEM=$_GET['claveEM'];
//echo $ClaveEM;
} ?>
<br>
<?php
if(isset($_GET['eco']))
{
$eco=$_GET['eco'];
//echo $eco;
}

$sql="SELECT id_em FROM Unidad WHERE ECO = $eco";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
        $idcomandoUltEmi=$row->id_em;
    }  mysqli_close($conn);
    $idcomandoUltEm=$idcomandoUltEmi+1;
    if ($idcomandoUltEmi=='0'){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Unidad SET id_em='$idcomandoEM', UltClave_APER='$ClaveEM' WHERE ECO=$eco";
            // use exec() because no results are returned
            $conn->exec($sql);
            $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'ClaveEM','$idcomandoUltEm','$idcomandoUltEmi','$eco')";
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
if ($idcomandoEM==$idcomandoUltEm){
    if ($numeroEM==$countEM){
        // echo "igual";
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "UPDATE Unidad SET id_em='0', UltClave_EM='' WHERE ECO=$eco";
          // use exec() because no results are returned
          $conn->exec($sql);
          $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'ClaveEM','$idcomandoUltEm','$idcomandoUltEmi','$eco')";         
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
          $sql = "UPDATE Unidad SET id_EM='$idcomandoEM', UltClave_EM='$ClaveEM' WHERE ECO=$eco";
          // use exec() because no results are returned
          $conn->exec($sql);
          $sql = "INSERT INTO `log`(`id`, `usuario`, `fechaHora`, `accion`, `anterior`, `nuevo`, `observaciones`) VALUES ('','$usuario',now(),'ClaveEM','$idcomandoUltEm','$idcomandoUltEmi','$eco')";
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