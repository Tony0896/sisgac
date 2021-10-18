<?php
include_once('../include/conn.php');

$fecha=$_POST['fecha'];
$output = '';   
        $sql = "  
    SELECT * FROM Carga_gasolina where fecha = '$fecha' ORDER BY id_gas desc
    ";  

$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>EDITAR</th>
        <th>ID</th>
        <th>UNIDAD</th>
        <th>FECHA</th>
        <th>LITROS</th>
        <th>PRECIO LITRO</th>
        <th>IMPORTE</th>
        <th>KM CARGA</th>
        <th>KM ANTERIOR</th>
        <th>KM RECORRIDO</th>
        <th>RENDIMIENTO</th>
        <th>REGION</th>
        <th>PAGO</th>
        <th>OBSER</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>  
    <button type="button" class="btn btn-success btn-circle" 
    data-toggle="modal" 
    data-target="#exampleModal" 
    data-whatever="@getbootstrap"
    id="'.$row["id_gas"].'" 
    onclick="showEdit(this.id)">
    <i class="fas fa-pencil-alt text-white-600"></i>
    </button>
    </td>
    <td>'. $row["id_gas"] .'</td>
    <td>'. $row["unidad"] .'</td>
    <td>'. $row["fecha"].'</td>
    <td>'. $row["litros"] .'</td>
    <td>'. $row["p_litro"] .'</td>
    <td>'. $row["p_carga"] .'</td>
    <td>'. $row["km_carga"] .' </td>
    <td>'. $row["km_anterior"] .' </td>
    <td>'. $row["km_reco"] .' </td>
    <td>'. $row["rendimiento"] .' </td>
    <td>'. $row["region"] .' </td>
    <td>'. $row["forma_pago"] .' </td>
    <td>'. $row["observacion"] .' </td>
    </tr>';  
}  
mysqli_close($conn);
$output .= '</table>'; 
      echo $output;  
?>