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
    SELECT * FROM Carga_gasolina WHERE fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha  
    ";  

$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>ID</th>
        <th>UNIDAD</th>
        <th>FECHA</th>
        <th>LITROS</th>
        <th>PRECIO LITROS</th>
        <th>IMPORTE</th>
        <th>KM CARGA</th>
        <th>KM ANTERIOR</th>
        <th>KM RECORRIDOS</th>
        <th>RENDIMIENTO</th>
        <th>SEMANA</th>
        <th>REGION</th>
        <th>PAGO</th>
        <th>OBSERVACIONES</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["id_gas"] .'</td>
    <td>'. $row["unidad"].'</td>
    <td>'. $row["fecha"] .'</td>
    <td>'. $row["litros"] .'</td>
    <td>'. $row["p_litro"] .'</td>
    <td>'. $row["p_carga"] .' </td>
    <td>'. $row["km_carga"] .' </td>
    <td>'. $row["km_anterior"] .' </td>
    <td>'. $row["km_reco"] .' </td>
    <td>'. $row["rendimiento"] .' </td>
    <td>'. $row["semana"] .' </td>
    <td>'. $row["region"] .' </td>
    <td>'. $row["forma_pago"] .' </td>
    <td>'. $row["observacion"] .' </td>
    </tr>';  
}  
mysqli_close($conn);
$output .= '</table>'; 
      echo $output;  
      //echo $opcion;
     // echo $entidad;
  //   echo $gg;
?>
