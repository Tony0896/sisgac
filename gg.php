<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Licencias</title>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
<?php
if(!$_GET){
    header('Location:gg.php?pagina=1');
}
//if($_GET['pagina']>$paginas or $_GET['pagina']<=0){
  //  header('Location:index.php?pagina=1');
//}
$datos_x_pag=3;
$iniciar =($_GET['pagina']-1)*$datos_x_pag;
//echo $iniciar;
?>
<body id="page-top">
<?php
if(isset($_GET['usuario']))
{
$usuario=$_GET['usuario'];
//echo
}?>
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
       ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
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
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link">
    <i class="fa fa-user"></i>
<span class="menu-title"><?php echo $usuario?></span>
</li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
<li class="nav-item">
<a class="nav-link" href="claves.php?valor=801&usuario=<?php echo $usuario?>">
<i class="fa fa-key"></i>
<span class="menu-title">Claves</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="unidades.php?usuario=<?php echo $usuario?>">
<i class="fas fa-truck"></i>
<span class="menu-title">Unidades</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
<i class="fas fa-sync-alt"></i>
<span class="menu-title">Renovaciones</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="licencias.php?usuario=<?php echo $usuario?>">Licencias</a>
                        <a class="collapse-item" href="renovaciones.php?usuario=<?php echo $usuario?>">Polizas</a>
                        <a class="collapse-item" href="renovaciones.php?usuario=<?php echo $usuario?>">GPS</a>
                        <a class="collapse-item" href="renovaciones.php?usuario=<?php echo $usuario?>">Verificaciones</a>
                    </div>
                </div>
</li>
<li class="nav-item">
<a class="nav-link" href="estacionamientos.php?usuario=<?php echo $usuario?>">
<i class="fas fa-dollar-sign"></i>
<span class="menu-title">Estacionamientos</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link">
<i class=""></i>
<span class="menu-title"></span>
</a>
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
        <h1 class="h3 mb-0 text-gray-900">Licencias</h1>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="container">
<!-- inicio row -->
 <!-- Donut Chart -->
 <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 border-bottom-primary">
                                    <h6 class="m-0 font-weight-bold text-secondary">Renovación</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <!-- table-->
                                    <thead>
                                        <tr>
                                            <th>OPERADOR</th>
                                            <th>TIPO</th>
                                            <th>VENCIMIENTO</th>
                                            <th>ESTATUS</th>
                                            <th>EDITAR</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql="SELECT * FROM Liencias";
                                    $conn = mysqli_connect($servername, $username, $password, $database);
                                    $datos= mysqli_query($conn, $sql);
                                        $sql="SELECT * FROM Liencias Limit ".$iniciar.",2";
                                        $datos1=mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_object($datos1)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row->Operador; ?></td>
                                            <td><?php echo $row->Tipo; ?></td>
                                            <td><?php echo $row->Vencimiento; ?></td>
                                            <td><?php echo $row->Estatus;
                                            echo '<td>  <a href="" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-pencil-alt"></i></a></td>'; }  
                                            $total_datos = $datos->num_rows;
                                            //echo($total_datos);
                                            $paginas=$total_datos/$datos_x_pag;
                                            //echo($paginas);
                                            $paginas=ceil($paginas);
                                            //echo $paginas;
                                        mysqli_close($conn); 
                                            ?></td>
                                        
                                        </tr>
</tbody> 
</table> 
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item  <?php echo $_GET['pagina']<= 1 ? 'disabled' :'' ?>"><a class="page-link" 
    href="gg.php?pagina=<?php echo $_GET['pagina']-1 ?> ">Anterior</a></li>
    <?php for ($i=0;$i<$paginas;$i++):?>
    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' :'' ?>">
    <a class="page-link" 
    href="gg.php?pagina=<?php echo $i+1 ?>">
    <?php echo $i+1 ?>
    </a></li>
    <?php endfor ?>
    <li class="page-item <?php echo $_GET['pagina']>= $paginas ? 'disabled' :'' ?>">
    <a class="page-link" href="gg.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
  </ul>
</nav>
</div>                                </div>
                            </div>
                        </div>
                         <!-- END Donut Chart -->
</div><!-- End row -->


   <!-- END table -->                                       
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
    <script src="js/demo/chart-bar-demo.js"></script>
</body>
</html>
