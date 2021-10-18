<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";

 if(isset($_POST['Eco']))
{
    $Eco=$_POST['Eco'];
    $costo=$Eco;
 //echo ($Eco);
        $sql = "SELECT SUM(costo) as costo FROM MtoUnidad where eco=$Eco;";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
                $costo= $row->costo;
 } mysqli_close($conn);
 echo ($costo);}
?>
