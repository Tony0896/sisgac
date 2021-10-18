<?php
require 'include/PHPMailer/src/PHPMailer.php';
require 'include/PHPMailer/src/SMTP.php';

$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';

$body = 'Información de proveedor ingresada correctamente';

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
$mail->Subject    = 'Proveedor ';
$mail->MsgHTML($body);

$mail->AddAddress('tesoreria@grupoaircond.mx', 'Tesorería');
$mail->send();
?>