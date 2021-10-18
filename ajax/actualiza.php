<?php
$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";

$check=$_POST['check'];
    if ($check==1){
        $fecha=$_POST['Fecha'];
        $lts=$_POST['Lts'];
        $Plts=$_POST['Plts'];
        $importe=$_POST['Importe'];
        $Kmc=$_POST['Kmc'];
        $Kma=$_POST['Kma'];
        $Kmr=$_POST['Kmr'];
        $rendimiento=$_POST['Rendimiento'];
        $observacion=$_POST['Observa'];
        $idGas=$_POST['Idgas'];
        $Pago=$_POST['Pago'];
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `Carga_gasolina` SET `fecha`='$fecha',`litros`='$lts',`p_litro`='$Plts',`p_carga`='$importe',`km_carga`='$Kmc',
        `km_anterior`='$Kma',`km_reco`='$Kmr',`rendimiento`='$rendimiento',`forma_pago`='$Pago',`observacion`='$observacion' WHERE `id_gas`='$idGas';";
        // use exec() because no results are returned
        $conn->exec($sql);
        $resultado1="<script language='javascript'> Swal.fire('Registro actualizado correctamente','','success')
        $('#exampleModal').modal('hide');
        $('#Mcheckbox').prop('checked', false);
        $('#Mpago').hide();
        zona();
        kms();
        hoy();

        </script>;";
        } catch(PDOException $e) {
        //echo $sql . "<br>" . $e->getMessage();
        $resultado1="<script language='javascript'>  Swal.fire({icon: 'error', title: 'Ocurrio un error',})
        $('#exampleModal').modal('hide');
        </script>;";
        }
    }else{
        $fecha=$_POST['Fecha'];
        $lts=$_POST['Lts'];
        $Plts=$_POST['Plts'];
        $importe=$_POST['Importe'];
        $Kmc=$_POST['Kmc'];
        $Kma=$_POST['Kma'];
        $Kmr=$_POST['Kmr'];
        $rendimiento=$_POST['Rendimiento'];
        $observacion=$_POST['Observa'];
        $idGas=$_POST['Idgas'];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `Carga_gasolina` SET `fecha`='$fecha',`litros`='$lts',`p_litro`='$Plts',`p_carga`='$importe',`km_carga`='$Kmc',
            `km_anterior`='$Kma',`km_reco`='$Kmr',`rendimiento`='$rendimiento',`observacion`='$observacion' WHERE `id_gas`='$idGas';";
            // use exec() because no results are returned
            $conn->exec($sql);
            $resultado1="<script language='javascript'> Swal.fire('Registro actualizado correctamente','','success')
            $('#exampleModal').modal('hide');
            zona();
            kms();
            hoy();
    
            </script>;";
            } catch(PDOException $e) {
            //echo $sql . "<br>" . $e->getMessage();
            $resultado1="<script language='javascript'>  Swal.fire({icon: 'error', title: 'Ocurrio un error',})
            $('#exampleModal').modal('hide');
            </script>;";
            }
    }
$conn = null;
echo($resultado1);
?>