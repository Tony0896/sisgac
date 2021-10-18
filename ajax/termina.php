<?php
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";

$eco=$_POST['eco'];
$fecha=$_POST['fecha'];
$litros=$_POST['litros'];
$p_litro=$_POST['p_litro'];
$p_carga=$_POST['p_carga'];
$km_carga=$_POST['km_carga'];
$km_anterior=$_POST['km_anterior'];
$km_reco=$_POST['km_reco'];
$rendimiento=$_POST['rendimiento'];
$region=$_POST['region'];
$forma_pago=$_POST['forma_pago'];
$observacion=$_POST['observacion'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `Carga_gasolina`(`unidad`, `fecha`, `litros`, `p_litro`, `p_carga`, 
    `km_carga`, `km_anterior`, `km_reco`, `rendimiento`, `semana`, `region`, `forma_pago`, `observacion`) 
VALUES ('$eco','$fecha','$litros','$p_litro','$p_carga','$km_carga','$km_anterior','$km_reco','$rendimiento','','$region','$forma_pago','$observacion');";
    // use exec() because no results are returned
    $conn->exec($sql);
    $resultado1="<script language='javascript'> Swal.fire('Registro agregado correctamente','','success')
    $('#litros').val('');
    $('#preciovslts').val('');
    $('#importe').val('');
    $('#kmc').val('');
    $('#kma').val('');
    $('#kmr').val('');
    $('#rendimiento').val('');
    $('#pago').val('');
    $('#observaciones').val('');

    zona();
    kms();
    hoy();

    </script>;";
} catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    $resultado1="<script language='javascript'>  Swal.fire({icon: 'error', title: 'Ocurrio un error',})
    </script>;";
}
$conn = null;
echo($resultado1);
?>