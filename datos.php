<?php 

$conexion=mysqli_connect('207.210.228.84','grupoair_userdb1','grupoair_orlando','grupoair_db1');

$zona=$_POST['Entidad'];



	$sql="SELECT * FROM Zona where id_zona=$zona";



	$result=mysqli_query($conexion,$sql);



	$cadena="<select id='lista2' name='lista2'  class='selectpicker' data-show-subtext='true' data-live-search='true'>";



	while ($ver=mysqli_fetch_row($result)) {

		$id_entidad=$ver[0];

		$rutas=$ver[2];	

		for($b=1; $b<=$rutas; $b=$b+1){

		$cadena=$cadena.'<option value='.($b).'>Ruta '.($b).'</option>';

	}

}
mysqli_close($conexion); 
	echo  $cadena."</select> <br>";

?>