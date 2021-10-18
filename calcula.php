<?php
$unida=$_POST['Unida'];
$kmini=$_POST['Kmini'];
$kmfin=$_POST['Kmfin'];
$fecha=$_POST['Fecha'];
$observaciones=$_POST['Observaciones'];
$motivo=$_POST['Motivo'];

$datos[]=[$unida, $kmini, $kmfin, $fecha, $observaciones, $motivo];

$recorrido=$kmfin-$kmini;

$recorrido="<script>
$('#button :input').removeAttr('disabled');
</script> 
<input type='text' id='recorrido' class='form-control form-control-user' value='".$recorrido."'disabled>";

$recorrido=[$recorrido];

//echo json_encode ($datos);
echo json_encode ($recorrido);

?>