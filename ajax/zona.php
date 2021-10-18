<?php
include_once ('../include/conn.php');

$eco=$_POST['Eco'];
//$zona=1;

$sql="SELECT Zona.id_zona, zona from Zona, Unidad where Zona.id_zona= Unidad.id_zona And ECO=$eco";

	$result=mysqli_query($conn,$sql);

	while ($ver=mysqli_fetch_row($result)) {
		$id_zona=$ver[0];
		$zona=$ver[1];	
}mysqli_close($conn); 
	echo  $zona;
?>
