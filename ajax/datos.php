<?php 

include_once('../include/conn.php');

$eco=$_POST['ECO'];

$sql = "select tb0.ECO,  tb00.zona, tb0.año, tb0.placas, tb0.serie, tb0.engomado , tb1.fecha as ul_verifi ,tb1.holograma,tb1.periodo,tb1.observaciones,tb4.fecha as f_recor, tb4.km_final , tb2.fecha as f_carga , tb2.km_carga, tb3.rendimientot ,  tb0.proveedor2, tb0.cad_gps, tb0.cad_poliza, tb0.cad_tarjeta
FROM 
(select *
from Unidad WHERE eco= '$eco' ) tb0
LEFT JOIN
(select * 
from Zona 
 ) tb00
on tb0.id_zona = tb00.id_zona 
LEFT JOIN
(select * 
from Validado_verifi where unidad = '$eco'
ORDER BY fecha DESC
LIMIT 1 ) tb1
on tb0.ECO = tb1.unidad 
LEFT JOIN
(select * 
from Carga_gasolina where unidad = '$eco'
ORDER BY fecha DESC
LIMIT 1 ) tb2
on tb0.ECO = tb2.unidad 
LEFT JOIN
(select * , AVG(rendimiento) as rendimientot
from Carga_gasolina where unidad = '$eco'
 ) tb3
on tb0.ECO = tb3.unidad 
LEFT JOIN
(select * 
from Recorrido where eco = '$eco'
ORDER BY fecha DESC
LIMIT 1 ) tb4
on tb0.ECO = tb4.eco";

mysqli_set_charset($conn, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conn, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    $zona=$row['zona'];
    $eco=$row['ECO'];
    $anio=$row['AÑO'];
    $placas=$row['PLACAS'];
    $serie=$row['SERIE'];
    $engomado=$row['ENGOMADO'];
    $holograma=$row['holograma'];
    $ul_verifi=$row['ul_verifi'];
    $periodo=$row['periodo'];
    $observaciones=$row['observaciones'];
    $f_recor=$row['f_recor'];
    $km_final=$row['km_final'];
    $f_carga=$row['f_carga'];
    $km_carga=$row['km_carga'];
    $rendimientot=$row['rendimientot'];
    $proveedor2=$row['Proveedor2'];
    $cad_gps=$row['cad_gps'];
    $cad_poliza=$row['Cad_Poliza'];
    $cad_tarjeta=$row['cad_tarjeta'];
    
    $clientes = array('zona'=> $zona, 'eco'=> $eco, 'anio'=> $anio, 'placas'=> $placas, 'serie'=> $serie, 'engomado'=> $engomado, 
    'holograma'=> $holograma, 'ul_verifi'=> $ul_verifi, 'periodo'=> $periodo, 'observaciones'=> $observaciones, 'fr'=> $f_recor,
    'kma'=> $km_final, 'fcarga'=> $f_carga, 'kmc'=> $km_carga, 
    'rendimientot'=> $rendimientot, 'Proveedor2'=> $proveedor2, 'cad_gps'=> $cad_gps, 'cad_poliza'=> $cad_poliza, 'cad_tarjeta'=> $cad_tarjeta);
}
    
$close = mysqli_close($conn) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  
echo json_encode($clientes);


?>