<?php 
$timezone  = -6;
$time6 = gmdate("YmjHis", time() + 3600*($timezone+date("I")));
//echo $time6;
$semana = date ('W');
//echo $semana;
$nombrepdf=basename($_FILES['archivopdf']['name']);
list($base,$extension) = explode('.',$nombrepdf);
$newnamepdf = implode('.', [$base. $time6, $extension]);
$guardadopdf=$_FILES['archivopdf']['tmp_name'];
$nombrexml=$_FILES['archivoxml']['name'];
list($base,$extension) = explode('.',$nombrexml);
$newnamexml = implode('.', [$base. $time6, $extension]);
$guardadoxml=$_FILES['archivoxml']['tmp_name'];
$RFC=$_POST['RFC'];
$nombre=$_POST['nombre'];
$razon=$_POST['Razon'];
$factura=$_POST['factura'];
$concepto=$_POST['concepto'];
$importe=$_POST['importe'];
$categoria=$_POST['categoria'];
$fecha=$_POST['fecha'];
if(!file_exists('proveedores')){
	mkdir('proveedores',0777,true);
	if(file_exists('proveedores')){
		if(move_uploaded_file($guardadopdf, 'proveedores/'.$newnamepdf)){
			echo "Archivo guardado con exito";
		}else{
			echo "No se pudo guardar";
		}
		if(move_uploaded_file($guardadoxml, 'proveedores/'.$newnamexml)){
			echo "Archivo guardado con exito";
		}else{
		}
	}
}else{
	if(move_uploaded_file($guardadopdf, 'proveedores/'.$newnamepdf) && move_uploaded_file($guardadoxml, 'proveedores/'.$newnamexml)){
		$servername = "207.210.228.84";
		$database = "grupoair_db1";
		$username = "grupoair_userdb1";
		$password = "grupoair_orlando";
		$conn = mysqli_connect($servername, $username, $password, $database);
		$sql = "INSERT INTO `Pago_proveedor`(`rfc`, `n_factura`, `concepto`, `importe`, `fecha_ingreso`, `soli_semana`, `categroria`, `url_factura`, `url_xlm`) 
		VALUES ('$RFC','$factura','$concepto','$importe','$fecha','$semana','$categoria','$newnamepdf','$newnamexml')";
        $datos= mysqli_query($conn, $sql);
		$conn = null;
		//MAil
		require 'include/PHPMailer/src/PHPMailer.php';
		require 'include/PHPMailer/src/SMTP.php';
		
		$mail=new PHPMailer();
		$mail->CharSet = 'UTF-8';
		
		$body = 'Información de proveedor '.$nombre.' ingresada correctamente';
		
		$mail->IsSMTP();
		$mail->Host       = 'mail.grupoaircond.mx';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->SMTPDebug  = 1;
		$mail->SMTPAuth   = true;
		$mail->Username   = 'test@grupoaircond.mx';
		$mail->Password   = '4-TzK#QUv4)A';
		$mail->SetFrom('test@grupoaircond.mx', "Grupo Air Cond");
		$mail->AddReplyTo('','');
		$mail->Subject    = 'Proveedor '.$nombre.'';
		$mail->MsgHTML($body);
		
		$mail->AddAddress('tesoreria@grupoaircond.mx', 'Tesoreria');
		$mail->send();
		//Mail
		echo "<script type='text/javascript'> window.location.href = 'gracias.php';</script>";
	}else{
		echo "No se pudo guardar, verifica tus datos y si haz colocado tu archivo PDF y XML";
	}
}
?>