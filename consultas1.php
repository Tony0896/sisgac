<?php 
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
 $conn = mysqli_connect($servername, $username, $password, $database);
$inicio=$_POST['inicio'];
$fin=$_POST['fin'];
$opcion=$_POST['opcion'];
$entidad=$_POST['entidad'];
$output = '';   
if ($entidad==98){ 
$gg="TDO";
    
    if ($opcion==2){
       // $gg="tdfac";
        $sql = "  
        SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo, factura FROM Zona, depositos WHERE Zona.id_zona=entidad AND tipo = 'factura' AND fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha ASC
        ";  
    } else if ($opcion==1){
        //$gg="tddepo";
        $sql = "  
    SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo, factura FROM Zona, depositos WHERE Zona.id_zona=entidad AND tipo = 'deposito' AND fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha ASC
    ";  
    } else if($opcion==3){
        //$gg="tddodoo";
        $sql = "  
        SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo, factura FROM Zona, depositos WHERE Zona.id_zona=entidad AND fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha ASC  
        ";  
    }
}else{
    if ($opcion==2){
        //$opcion='factura';
        $sql = "  
    SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo, factura FROM Zona, depositos WHERE id_zona='".$_POST["entidad"]."' AND Zona.id_zona=entidad AND tipo = 'factura' AND fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha ASC
    ";  
    }else if ($opcion==1){
    // $opcion='deposito';
        $sql = "  
    SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo, factura FROM Zona, depositos WHERE id_zona='".$_POST["entidad"]."' AND Zona.id_zona=entidad AND tipo = 'deposito' AND fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha ASC  
    ";  
    }else if ($opcion==3){
        // $opcion='todo';
        $sql = "  
    SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo, factura FROM Zona, depositos WHERE id_zona='".$_POST["entidad"]."' AND Zona.id_zona=entidad AND fecha BETWEEN '".$_POST["inicio"]."' AND '".$_POST["fin"]."' order by fecha ASC  
    ";  
    }
}
$datos= mysqli_query($conn, $sql);
$output .= ' 
<table class="table table-bordered" width="100%" cellspacing="0">
<!-- table-->
<thead>
    <tr>
        <th>ID</th>
        <th>ENTIDAD</th>
        <th>NOMBRE</th>
        <th>MONTO</th>
        <th>DESCRIPCION</th>
        <th>FECHA</th>
        <th>TIPO</th>
        <th>FACTURA</th>
        <th>EDITAR</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["id_oper"] .'</td>
    <td>'. $row["zona"].'</td>
    <td>'. $row["nombre"] .'</td>
    <td>'. $row["monto"] .'</td>
    <td>'. $row["descripcion"] .'</td>
    <td>'. $row["fecha"] .' </td>
    <td>'. $row["tipo"] .' </td>
    <td>'. $row["factura"] .' </td>
    <td>  
    <button type="button" class="btn btn-danger btn-circle" 
    data-toggle="modal" 
    data-target="#exampleModal" 
    data-whatever="@getbootstrap"
    id="'.$row["id_oper"].'" 
    onclick="showEdit(this.id)">
    <i class="fas fa-pencil-alt text-white-600"></i>
    </button>
    </td>
    </tr>';  
}  mysqli_close($conn); 
$output .= '</table>'; 
      echo $output;  
      //echo $opcion;
     // echo $entidad;
  //   echo $gg;
?>
