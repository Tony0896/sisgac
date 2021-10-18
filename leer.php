<?php

// ruta al archivo remoto
$remote_file = 'proveedores/Acta.pdf';
$local_file = 'proveedores/Acta.pdf';

// abrir un archivo para escribir
$handle = fopen($local_file, 'w');

// establecer una conexión básica
$conn_id = ftp_connect($ftp_server);

// iniciar sesión con nombre de usuario y contraseña
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// intenta descargar un $remote_file y guardarlo en $handle
if (ftp_fget($conn_id, $handle, $remote_file, FTP_ASCII, 0)) {
 echo "Se ha escrito satisfactoriamente sobre $local_file\n";
} else {
 echo "Ha habido un problema durante la descarga de $remote_file en $local_file\n";
}

// cerrar la conexión ftp y el gestor de archivo
ftp_close($conn_id);
fclose($handle);
?>