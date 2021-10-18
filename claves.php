<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Claves</title>
       <!-- ICONO-->
       <link rel="icon" href="assets/ico.ico">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style> 
.dropdown-menu{
height:280px;
overflow-y: scroll;
}

.selectpicker {
    overflow-y: scroll;
    color: #fff;
    background-color: #4e73df;
    border-color: #4e73df;
    background-color: #2653d4;
    border-color: #4e73df;
    display: inline-block;
    font-weight: 400;
    color: #858796;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 3px solid;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .35rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
} 
</style>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
<?php
header("Refresh: 300;");
$numero=1;
$numeroEM=1;
$numeroCierre=1;
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";

        $sql="SELECT ECO FROM Unidad  where ECO LIKE '8%' LIMIT 1";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos2= mysqli_query($conn, $sql);
        while($row = mysqli_fetch_object($datos2)){
           ?>
            <?php $ieco =  $row->ECO;?>
   <?php  }  mysqli_close($conn); 

include_once 'include/user.php';
include_once 'include/user_session.php';

$userSession=new userSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());
    $usuario =($userSession->getCurrentUser());
    $usuario1=$user->getUsername(); //obtencion del PUESTOOOO
    //include_once 'vistas/menu.php'
    //echo $user1;
}include_once ('vistas/sidebar.php');
       ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h1 class="h3 mb-0 text-gray-900">Claves <?php //echo date('l jS \of F Y h:i:s A');?></h1>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container">
    <!-- inicio row -->
                            <div class="row">                                      
                    <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Selecciona una Unidad</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" onchange="enviar_valores(this.value);">
                                                    <option data-subtext=""> Unidades </option>
                                                            <?php
                                                                    $sql="SELECT ECO FROM Unidad  where ECO LIKE '8%'";
                                                                    $conn = mysqli_connect($servername, $username, $password, $database);
                                                                    $datos= mysqli_query($conn, $sql);
                                                                        while($row = mysqli_fetch_object($datos)){
                                                                    ?>
                                                                            <option data-subtext=""> <?php echo $row->ECO;?> </option>
                                                            <?php  } mysqli_close($conn);?>  </select>
                                                    </div>
                                                </div>
                                        <div class="col">
<script>
function enviar_valores(valor){
location.href='?valor=' + valor;
}
</script>
<?php
if(isset($_GET['valor']))
{
$eco=$_GET['valor'];
//echo $eco;
}

$PHPvariable = "<script> document.write(variableJS) </script>";
$PHPvariable="810";
        //CONSULTA DATOS UNIDADES
 $sql="SELECT * FROM Unidad WHERE ECO = '".$eco."'";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
          $id_zona= $row->id_zona;
          $Unidad= $row->ECO;
          $Placa=$row->PLACAS;
          $Operador = $row->Operador;
          $Proveedor=$row->Proveedor;
          $CApertura=$row->C_APERTURA;
          $idapertura= $row->id_apertura;
          $UltClave=$row->UltClave_APER;
          $CEM=$row->C_EM;
          $idEM=$row->id_em;
          $UltClaveEM=$row->UltClave_EM;
          $CCierre=$row->C_2teclado;
          $idCierre=$row->id_2teclado;
          $UltClaveCierre=$row->UltCalve2teclado;
        }  mysqli_close($conn); 
//cONSULTA ZONA UNIDAD
          $sql="SELECT zona FROM Zona WHERE id_zona = $id_zona";
          $conn = mysqli_connect($servername, $username, $password, $database);
          $datos= mysqli_query($conn, $sql);
              while($row = mysqli_fetch_object($datos)){
            $zona= $row->zona;
        }  mysqli_close($conn);
//CONSULTA CLAVE AOERTURA
        $sql="SELECT * FROM Comando WHERE id_comando > '".$idapertura. "' and salida = 'salida 2' and plataforma='".$Proveedor."' and color = '".$CApertura."' LIMIT 1;";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
        $idcomando=$row->id_comando;
        $UltClave= $row->clave; 
        $numero = $row->numero;
          ?>
                  <!-- Page Wrapper   <a class="dropdown-item" href="#"> <?php //echo $row->zona;?> </a>     Page Wrapper -->
<?php  }  mysqli_close($conn); 
//CONSULTA CLAVE AOERTURa EME
        $sql="SELECT * FROM Comando WHERE id_comando > '".$idEM. "' and salida = 'salida 1' and plataforma='".$Proveedor."' and color = '".$CEM."' LIMIT 1;";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
        $idcomandoEM=$row->id_comando;
        $UltClaveEM= $row->clave; 
        $numeroEM = $row->numero;
          ?>
          <?php  }  mysqli_close($conn); 
//CONSULTA CLAVE AOERTURa cierre
        $sql="SELECT * FROM Comando WHERE id_comando > '".$idCierre. "' and salida = 'salida 1' and plataforma='".$Proveedor."' and color = '".$CCierre."' LIMIT 1;";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
        $idcomandoCierre=$row->id_comando;
        $UltClaveCierre= $row->clave; 
        $numeroCierre = $row->numero;
          ?>
                  <!-- Page Wrapper   <a class="dropdown-item" href="#"> <?php //echo $row->zona;?> </a>     Page Wrapper -->
<?php  }  mysqli_close($conn); 
//CONSULTA cuantas claves hay salida 2
$sql="SELECT COUNT(*)  as cuenta FROM Comando WHERE salida = 'salida 2' and plataforma='".$Proveedor."' and color = '".$CApertura."' LIMIT 1;";
$conn = mysqli_connect($servername, $username, $password, $database);
$datos= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_object($datos)){
$count=$row->cuenta;
  ?>
          <!-- Page Wrapper   <a class="dropdown-item" href="#"> <?php //echo $row->zona;?> </a>     Page Wrapper -->
<?php  }  mysqli_close($conn);
//CONSULTA cuantas claves hay salida 1 
$sql="SELECT COUNT(*)  as cuenta FROM Comando WHERE salida = 'salida 1' and plataforma='".$Proveedor."' and color = '".$CEM."' LIMIT 1;";
$conn = mysqli_connect($servername, $username, $password, $database);
$datos= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_object($datos)){
$countEM=$row->cuenta;
  ?>
  <?php  }  mysqli_close($conn);
//CONSULTA cuantas claves hay salida 1 
$sql="SELECT COUNT(*)  as cuenta FROM Comando WHERE salida = 'salida 1' and plataforma='".$Proveedor."' and color = '".$CCierre."' LIMIT 1;";
$conn = mysqli_connect($servername, $username, $password, $database);
$datos= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_object($datos)){
$countCierre=$row->cuenta;
  ?>
          <!-- Page Wrapper   <a class="dropdown-item" href="#"> <?php //echo $row->zona;?> </a>     Page Wrapper -->
<?php  }  mysqli_close($conn); 
//CONSULTA cuantas claves hay salida 1 
$sql="SELECT * FROM permisos WHERE usuario = '".$usuario."';";
$conn = mysqli_connect($servername, $username, $password, $database);
$datos= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_object($datos)){
$PbtnClaves=$row->PbtnClaves;}
mysqli_close($conn); 
?>
                                        </div>
                                            </div>
                                        </div>
                                    <div class="col-auto">
                                            <i class="fas fa-shipping-fast fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                UNIDAD</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if ($Unidad=='800'){echo 'Unidad';}else{  echo $Unidad; } ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-truck fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                          <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PLACA
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $Placa ?></div>
                                                </div>
                                                <div class="col"></div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-columns fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- Tasks Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ENTIDAD</div>
                          <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $zona ?></div>
                          </div>
                                <div class="col"></div>
                      </div>
                  </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marker-alt fa-2x text-gray-600"></i>
                        </div>
              </div>
          </div>
      </div>
</div>
</div>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<br>
<!-- incio row -->
<div class="row">
 <!-- Espacio al frente-->
<!-- Tasks Card Example -->
  <div class="col-xl-5 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">OPERADOR
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $Operador ?></div>
                          </div>
                    <div class="col"></div>
                      </div>
                  </div>
                    <div class="col-auto">
                        <i class="fas fa-address-book fa-2x text-gray-600"></i>
                    </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Tasks Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PROVEEDOR
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $Proveedor ?></div>
                          </div>
                          <div class="col"></div>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-handshake fa-2x text-gray-600"></i>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">POLIZAS
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              1
                          </div>
                          <div class="col">2</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

</div>
<!-- End row -->
<!-- incio row -->
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <br>
<div class="row">
 <!-- Espacio al frente-->
 <div class="col-xl-1   col-md-6 mb-4"></div>
     <!-- Tasks Card Example -->
     <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-secondary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">COLOR
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $CApertura?></div>
                          </div>
                          <div class="col">                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  <!-- Tasks Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Clave Apertura
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?php echo $numero ?> &nbsp &nbsp    *<?php echo $UltClave ?>#</div>
                          </div>
                          <div class="col"></div>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-sign-out-alt fa-2x text-gray-600"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
            <!-- Buttton -->
            <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          CONFIRMAR CLAVE APERTURA</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <div class="my-2"></div>
                                    <a 
                                    <?php
                                    if ($PbtnClaves=="no"){?>
                                        class="btn btn-success btn-icon-split"
                                    <?php
                                    }else if ($PbtnClaves=="si"){
                                        ?>
                                    href="claves1.php?idcomando=<?php echo $idcomando?>&clave=<?php echo $UltClave?>&eco=<?php echo $eco?>&numero=<?php echo $numero?>&count=<?php echo $count?>&usuario=<?php echo $usuario?>" class="btn btn-success btn-icon-split" 
                                    <?php } ?>
                                    >
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">CLAVE CONFIRMADA</span>
                                    </a>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-600"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<br>
<div class="row">
 <!-- Espacio al frente-->
 <div class="col-xl-1   col-md-6 mb-4"></div>
     <!-- Tasks Card Example -->
     <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-secondary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">COLOR CIERRE
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $CCierre?></div>
                          </div>
                          <div class="col">                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
          <!-- Earnings (Annual) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                          Clave CIERRE</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroCierre ?> &nbsp &nbsp *<?php echo $UltClaveCierre?>#</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-sign-out-alt fa-2x text-gray-600"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>  
<!-- End row -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                          CONFIRMAR CLAVE CIERRE</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <div class="my-2"></div>
                                    <a 
                                    <?php
                                    if ($PbtnClaves=="no"){?>
                                        class="btn btn-info btn-icon-split"
                                    <?php
                                    }else if ($PbtnClaves=="si"){
                                        ?> 
                                    href="claves3.php?idcomandoCierre=<?php echo $idcomandoCierre?>&claveCierre=<?php echo $UltClaveCierre?>&eco=<?php echo $eco?>&numeroCierre=<?php echo $numeroCierre?>&countCierre=<?php echo $countCierre?>&usuario=<?php echo $usuario?>" class="btn btn-info btn-icon-split"
                                    <?php } ?>
                                    >
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">CIERRE CONFIRMADA</span>
                                    </a>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-600"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script>
function myFunction() {
    location.href='?valor=' + valor;
window.location;
}
</script>
</div>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<br>
<div class="row">
 <!-- Espacio al frente-->
 <div class="col-xl-1   col-md-6 mb-4"></div>
     <!-- Tasks Card Example -->
     <div class="col-xl-2 col-md-6 mb-4">
      <div class="card border-left-secondary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">COLOR EMERGENTE
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $CEM?></div>
                          </div>
                          <div class="col">                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
          <!-- Earnings (Annual) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                          Clave EME</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numeroEM ?> &nbsp &nbsp *<?php echo $UltClaveEM ?>#</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-sign-out-alt fa-2x text-gray-600"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>  
<!-- End row -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                          CONFIRMAR CLAVE EME</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <div class="my-2"></div>
                                    <a 
                                    <?php
                                    if ($PbtnClaves=="no"){?>
                                        class="btn btn-danger btn-icon-split"
                                    <?php
                                    }else if ($PbtnClaves=="si"){
                                        ?> 
                                        href="claves2.php?idcomandoEM=<?php echo $idcomandoEM?>&claveEM=<?php echo $UltClaveEM?>&eco=<?php echo $eco?>&numeroEM=<?php echo $numeroEM?>&countEM=<?php echo $countEM?>&usuario=<?php echo $usuario?>" class="btn btn-danger btn-icon-split"
                                        <?php } ?>
                                        >
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">EME CONFIRMADA</span>
                                    </a>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-600"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
<!-- End row -->
                          </div>
                      </div>
                  </div>      
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> Grupo Air Cond 2021 ®</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>