<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
 $conn = mysqli_connect($servername, $username, $password, $database);
$entidad=$_POST['Entidad'];
$ruta=$_POST['Ruta'];

$output = '';
        $sql = "  
        SELECT * FROM estacionamientos where id_entidad='".$entidad."' AND id_ruta='".$ruta."'
        ";  
$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>SAP</th>
        <th>NOMBRE</th>
        <th>COSTO</th>
        <th>TOLERANCIA</th>
        <th>DIA AUTORIZADO</th>
        <th>ACCIONES</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["sap"] .'</td>
    <td>'. $row["plaza"].'</td>
    <td>'. $row["costo"] .'</td>
    <td>'. $row["tolerancia"] .'</td>
    <td>'. $row["autoriza"] .' </td>
    <td>  
    <a href="#" class="btn btn-success btn-circle btn-sm">
    <i class="fas fa-pencil-alt"></i></a>&nbsp&nbsp&nbsp
    <a href="#" class="btn btn-danger btn-circle btn-sm">
    <i class="fas fa-trash"></i></a>
    </td>
    </tr>';  
}    mysqli_close($conn);
$output .= '</table>'; 
      echo $output;  
      //echo $opcion;
     // echo $entidad;
  //   echo $gg;


?>
