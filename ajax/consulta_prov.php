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
    SELECT * FROM Pago_proveedor, cat_provedores WHERE fecha_ingreso BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' and cat_provedores.id_cat = Pago_proveedor.categroria order by fecha_ingreso ASC  
    ";  

$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>ID</th>
        <th>RFC</th>
        <th>CATEGORIA</th>
        <th>FACTURA</th>
        <th>CONCEPTO</th>
        <th>IMPORTE</th>
        <th>FECHA</th>
        <th>SEMANA</th>
        <th>ESTATUS</th>
        <th>MOTIVO</th>
        <th>TRANSFERENCIA</th>
        <th>CUENTA</th>
        <th>FECHA</th>
        <th>SEMANA</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["id_pago"] .'</td>
    <td>'. $row["rfc"].'</td>
    <td>'. $row["categoria"].'</td>
    <td>'. $row["n_factura"] .'</td>
    <td>'. $row["concepto"] .'</td>
    <td>'. $row["importe"] .'</td>
    <td>'. $row["fecha_ingreso"] .' </td>
    <td>'. $row["soli_semana"] .' </td>
    <td>'. $row["status"] .' </td>
    <td>'. $row["motivo"] .' </td>
    <td>'. $row["n_transferencia"] .' </td>
    <td>'. $row["n_cuenta_realizado"] .' </td>
    <td>'. $row["fecha_pago"] .' </td>
    <td>'. $row["pago_semana"] .' </td>
    </tr>';  
}  
mysqli_close($conn);
$output .= '</table>'; 
    echo $output;  
      //echo $opcion;
     // echo $entidad;
  //   echo $gg;
?>
