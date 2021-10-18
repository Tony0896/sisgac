<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
 $conn = mysqli_connect($servername, $username, $password, $database);
$inicio=$_POST['inicio'];
$fin=$_POST['fin'];
$output = '';   
        $sql = "  
    SELECT * FROM Recorrido WHERE fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha  
    ";  

$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>ID</th>
        <th>FECHA</th>
        <th>ECO</th>
        <th>KM_INI</th>
        <th>KM_FIN</th>
        <th>RECORRIDO</th>
        <th>OBSERVACIONES</th>
        <th>MOTIVO</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["id_odo"] .'</td>
    <td>'. $row["fecha"].'</td>
    <td>'. $row["eco"] .'</td>
    <td>'. $row["km_inicial"] .'</td>
    <td>'. $row["km_final"] .'</td>
    <td>'. $row["recorrido"] .' </td>
    <td>'. $row["obseraviones"] .' </td>
    <td>'. $row["motivo"] .' </td>
    </tr>';  
}  
mysqli_close($conn);
$output .= '</table>'; 
      echo $output;  
      //echo $opcion;
     // echo $entidad;
  //   echo $gg;
?>
