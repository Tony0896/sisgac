<?php
$unida=$_POST['Unida'];
$kmini=$_POST['Kmini'];
$kmfin=$_POST['Kmfin'];
$fecha=$_POST['Fecha'];
$observaciones=$_POST['Observaciones'];
$motivo=$_POST['Motivo'];

$datos[]=[$unida, $kmini, $kmfin, $fecha, $observaciones, $motivo];

$recorrido=$kmfin-$kmini;

$Todo="<script>
  Swal.fire('Agregado con éxito','','success');
  $('#button :input').removeAttr('disabled');
</script>";

$recorrido="<script>
Swal.fire('Agregado con éxito','','success');
$('#button :input').removeAttr('disabled');
</script>" + $recorrido;

//$recorrido=[$recorrido];

//echo json_encode ($datos);
echo json_encode ($recorrido);

?>