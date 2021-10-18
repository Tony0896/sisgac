<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
 $conn = mysqli_connect($servername, $username, $password, $database);

 if(isset($_POST['Eco']))
{
    $Eco=$_POST['Eco'];
 //echo ($Eco);
$output = '';
        $sql = "  
        SELECT * FROM MtoUnidad where eco=".$_POST["Eco"]." Order by fecha desc
        ";  
$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>FECHA</th>
        <th>CONCEPTO</th>
        <th>KM</th>
        <th>PROX. SERVICIO</th>
        <th>COSTO</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["fecha"] .'</td>
    <td>'. $row["Concepto"].'</td>
    <td>'. $row["km"] .'</td>
    <td>'. $row["proximo"] .'</td>
    <td>'. $row["costo"] .' </td>
    </tr>';  
}  
$output .= '</table>'; 
      echo $output;  
      //echo $opcion;
     // echo $entidad;
  //   echo $gg;
}
mysqli_close($conn); 
?>
