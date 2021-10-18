<?php
 $servername = "207.210.228.84";
 $database = "grupoair_db1";
 $username = "grupoair_userdb1";
 $password = "grupoair_orlando";
 $conn = mysqli_connect($servername, $username, $password, $database);

    $Eco=$_POST['Unida'];
    //echo ($Eco);
    $output = '';
        $sql = "  
        SELECT * FROM Recorrido where eco=".$_POST["Unida"]." Order by fecha desc Limit 1
        ";  
$datos= mysqli_query($conn, $sql);
$output .= ' 
<table id="t01">
<!-- table-->
<thead>
    <tr>
        <th>ECO</th>
        <th>KM INICIAL</th>
        <th>KM FINAL</th>
        <th>FECHA</th>
    </tr>
</thead>
'; 
while($row = mysqli_fetch_array($datos))
{ 
    $output .= '  
    <tr>   
    <td>'. $row["eco"] .'</td>
    <td>'. $row["km_inicial"].'</td>
    <td>'. $row["km_final"] .'</td>
    <td>'. $row["fecha"] .'</td>
    </tr>';  
}  
mysqli_close($conn); 
$output .= '</table>'; 
    echo $output;  
?>