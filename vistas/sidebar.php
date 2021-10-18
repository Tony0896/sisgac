<?php

$servername = "207.210.228.84";
$database = "grupoair_db1";
$username = "grupoair_userdb1";
$password = "grupoair_orlando";

include_once 'include/user.php';
include_once 'include/user_session.php';

$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());
    $usuario =($userSession->getCurrentUser());
    $usuario1=$user->getUsername(); //obtencion del PUESTOOOO
 /*
    if ($usuario1=="CallCenter" && $usuario="Eduardo"){

        $PClaves="";
        $PRenova="";
    }
    */

    $sql="SELECT * FROM `permisos` WHERE Usuario = '$usuario'";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $datos2= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_object($datos2)){
        ?>
        <?php 
        $PClaves=$row->PClaves;
        $PUnidad=$row->PUnidad;
        $PLicencias=$row->PLicencias;
        $PPolizas=$row->PPolizas;
        $PGps=$row->PGps;
        $PVerifica=$row->PVerifica;
        $PEstaciona=$row->PEstaciona;
        $Pmantenimento=$row->Pmantenimiento;
        $Popalo=$row->Popalo;
        $Pvaca=$row->Pvaca;
        $Pauditorias=$row->Pauditorias;
        $Pchecklist=$row->Pchecklist;
        $Pdepositos=$row->Pdepositos;
        $Pfacturacion=$row->Pfacturacion;

    }  mysqli_close($conn); 
    ?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
<div class="sidebar-brand-icon rotate-n-15">
</div>
<i class="fa fa-home fa-2x"></i>
<div class="sidebar-brand-text mx-3">GAC</div>
</a>
<!-- Divider -->

<hr class="sidebar-divider d-none d-md-block">

<li class="nav-item active">
<a class="nav-link">
<i class="fa fa-user"></i>
<span class="menu-title"><?php echo $usuario; ?></span>
</a>
</li>
<!-- Divider -->

<hr class="sidebar-divider d-none d-md-block">

<li class="nav-item">
<a class="nav-link <?php echo $PClaves?>" href="claves.php?valor=800">
<i class="fa fa-key"></i>
<span class="menu-title">Claves</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
<i class="fas fa-chart-line"></i>
<span class="menu-title">Indicadores</span>
</a>
<div id="collapse2" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="#">Escaneo</a>
        <a class="collapse-item" href="#">Facturación</a>
        <a class="collapse-item" href="#">Gasolina</a>
        <a class="collapse-item" href="#">KM Recorridos</a>
        <a class="collapse-item" href="#">Guías recolectadas</a>
        <a class="collapse-item" href="#">Paquetes iniciales</a>
        <a class="collapse-item" href="unidad.php">Unidad</a>
    </div>
</div>
</li>

<li class="nav-item">
<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
<i class="fas fa-dollar-sign"></i>
<span class="menu-title">Finanzas</span>
</a>
<div id="collapse4" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo $Pdepositos?>.php">Depósitos</a>
        <a class="collapse-item" href="menu_prov.php">Depósitos Proveedor</a>
        <a class="collapse-item" href="<?php echo $Pfacturacion?>.php">Facturación</a>
        <a class="collapse-item" href="<?php echo $PEstaciona?>.php">Estacionamientos</a>
    </div>
</div>
</li>

<li class="nav-item">
<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
<i class="fas fa-truck"></i>
<span class="menu-title">Operaciones</span>
</a>
<div id="collapse5" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="km.php">Kilometrajes</a>
        <a class="collapse-item" href="<?php echo $PUnidad?>.php">Unidades</a>
        <a class="collapse-item" href="<?php echo $Pmantenimento?>.php">Mantenimientos</a>
        <a class="collapse-item" href="cargas.php">Cargas</a>
    </div>
</div>
</li>

<li class="nav-item">
<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-sync-alt"></i>
<span class="menu-title">Renovaciones</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo $PLicencias?>.php">Licencias</a>
        <a class="collapse-item" href="<?php echo $PPolizas?>.php">Polizas de seguro</a>
        <a class="collapse-item" href="<?php echo $PGps?>.php">GPS</a>
        <a class="collapse-item" href="<?php echo $Popalo?>.php">Opalo</a>
        <a class="collapse-item" href="<?php echo $PVerifica?>.php">Verificaciones</a>
        <a class="collapse-item" href="<?php echo $Pvaca?>.php">Vacaciones</a>
    </div>
</div>
</li>

<li class="nav-item">
<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
<i class="fas fa-exclamation-triangle"></i>
<span class="menu-title">Prevención</span>
</a>
<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo $Pauditorias?>.php">Auditorías</a>
        <a class="collapse-item" href="<?php echo $Pchecklist?>.php">CheckList</a>
    </div>
</div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<li class="nav-item">
<a class="nav-link" href="include/logout.php">
<i class="fas fa-window-close"></i>
<span class="menu-title">Salir</span>
</a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->
<!--end side bar-->

<?php
}else {
    echo"<script language='javascript'>window.location='/sisgac/index.php'</script>;";
}
    