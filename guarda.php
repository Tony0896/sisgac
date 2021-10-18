<?php
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";
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
$noFac=$_POST['noFac'];
$concepto=$_POST['concepto'];
$importe=$_POST['importe'];
$fecha=$_POST['fecha'];
$semana=$_POST['semana'];
$categoria=$_POST['categoria'];
$motivo=$_POST['motivo'];
$status=$_POST['status'];
$noTransferencia=$_POST['noTransferencia'];
$noCuenta=$_POST['noCuenta'];
$fechaP=$_POST['fechaP'];
$semanaP=$_POST['semanaP'];

//$arr = array('RFC' => $RFC, 'noFac' => $noFac, 'concepto' => $concepto, 'importe' => $importe, 'fecha' => $fecha, 'semana' => $semana, 'categoria' =>$categoria, "motivo" => $motivo, 'status' => $status, 'noTrans' => $noTransferencia, 'noCuenta' => $noCuenta, 'fechaP' => $fechaP, 'semanapa' => $semanaP, 'PDF' => $newnamepdf, 'XML' => $newnamexml);
//echo json_encode($arr);
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
	//echo "sip";
    //echo "<script type='text/javascript'> window.location.href = 'gracias.php';</script>";
}else{
	//if(move_uploaded_file($guardadopdf, 'proveedores/'.$newnamepdf) && move_uploaded_file($guardadoxml, 'proveedores/'.$newnamexml)){
        
		$conn = mysqli_connect($servername, $username, $password, $database);
		$sql = "INSERT INTO `Pago_proveedor`(`rfc`, `n_factura`, `concepto`, `importe`, `fecha_ingreso`, `soli_semana`, `categroria`, `url_factura`, `url_xlm`, `status`, `motivo`, `n_transferencia`, `n_cuenta_realizado`, `fecha_pago`, `pago_semana`) 
		VALUES ('$RFC','$noFac','$concepto','$importe','$fecha','$semana','$categoria','$newnamepdf','$newnamexml', '$status', '$motivo', '$noTransferencia', '$noCuenta', '$fechaP', '$semanaP')";
        $datos= mysqli_query($conn, $sql);
        mysqli_close($conn);
	
   // }
   echo "<script type='text/javascript'> window.location.href = 'listo.php';</script>";
}
    
?>