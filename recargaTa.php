<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
 $conn = mysqli_connect($servername, $username, $password, $database);
 //echo ($Eco);
 $semana=$_POST['semana'];
$output = '';
        $sql = "  
        SELECT * FROM Pago_proveedor where soli_semana=".$semana." and status is null or status='Programado' Order by fecha_ingreso desc
        ";  
$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>ID</th>
        <th>RFC</th>
        <th>FACTURA</th>
        <th>CONCEPTO</th>
        <th>IMPORTE</th>
        <th>DESCARGA</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["id_pago"] .'</td>
    <td>'. $row["rfc"].'</td>
    <td>'. $row["n_factura"] .'</td>
    <td>'. $row["concepto"] .'</td>
    <td>'. $row["importe"] .' </td>
    <td>  
    <button type="button" class="btn btn-primary btn-circle" 
    data-toggle="modal" 
    data-target="#exampleModal" 
    data-whatever="@getbootstrap"
    id="'.$row["id_pago"].'" 
    onclick="showEdit(this.id)">
    <i class="fas fa-pencil-alt text-white-600"></i>
    </button>&nbsp&nbsp&nbsp
    <a href=https://sistemas.grupoaircond.mx/sisgac/proveedores/'.$row["url_factura"].'  class="btn btn-danger btn-circle" target="_blank">
    <i class="fas fa-file-pdf"></i></a>&nbsp&nbsp&nbsp
    <a href=https://sistemas.grupoaircond.mx/sisgac/proveedores/'.$row["url_xlm"].' class="btn btn-success btn-circle" download>
    <i class="fas fa-file-excel"></i></a>
    </td>
    </tr>';   
}  
$output .= '</table>'; 
      echo $output;  

      //echo $opcion;
     // echo $entidad;
//echo $semana;
mysqli_close($conn); 
?>
