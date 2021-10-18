<?php
$fecha=$_POST['semana'];
$fechaP=$_POST['semanaP'];
//$fecha="02/05/2017";
$fecha = new DateTime($fecha);
$semana = $fecha->format('W');
$fechaP = new DateTime($fechaP);
$semanaP = $fechaP->format('W');
//echo "Semana: $semana";

$arr = array('a' => $semana, 'b' => $semanaP);
echo json_encode($arr);
//echo json_encode($semana);

?>