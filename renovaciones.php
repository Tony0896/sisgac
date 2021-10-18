<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Licencias</title>
       <!-- ICONO-->
       <link rel="icon" href="assets/ico.ico">
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

<body id="page-top">
<?php
include_once 'include/user.php';
include_once 'include/user_session.php';

$userSession=new userSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());
    $usuario =($userSession->getCurrentUser());
    //include_once 'vistas/menu.php';
    //echo $user1;
}?>
    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php   include_once ('vistas/sidebar.php'); ?>

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
<div class="row">

<!-- inicio tar -->
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Licencias</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <div>
                                                    <a href="#" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <span class="text">Buscar</span>
                                    </a>
                                                    </div>
                                                    </div>  
                                                    </div>
                                                </div>
                                        <div class="col"></div>
                                            </div>
                                        <div class="col-auto">
                                            <i class="fas fa-address-card fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div> 
<!-- end tar -->
<!-- inicio tar -->
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Seguro</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <div>
                                                    <a href="#" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <span class="text">Buscar</span>
                                    </a>
                                                    </div>
                                                    </div>  
                                                    </div>
                                                </div>
                                        <div class="col"></div>
                                            </div>
                                        <div class="col-auto">
                                            <i class="fas fa-ambulance fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div> 
<!-- end tar -->
<!-- inicio tar -->
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">GPS</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <div>
                                                    <a href="#" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <span class="text">Buscar</span>
                                    </a>
                                                    </div>
                                                    </div>  
                                                    </div>
                                                </div>
                                        <div class="col"></div>
                                            </div>
                                        <div class="col-auto">
                                            <i class="	fas fa-satellite-dish fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div> 
<!-- end tar -->
<!-- inicio tar -->
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Verificación</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <div>
                                                    <a href="#" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <span class="text">Buscar</span>
                                    </a>
                                                    </div>
                                                    </div>  
                                                    </div>
                                                </div>
                                        <div class="col"></div>
                                            </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-check fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div> 
<!-- end tar -->
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
                                    <tbody>
                                        <tr>
                                            <td>Juan Perez</td>
                                            <td>C</td>
                                            <td>12/12/2020</td>
                                            <td>Pendiente</td>
                                            <td>  <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Pedro Martinez</td>
                                            <td>C</td>
                                            <td>Permanente</td>
                                            <td>Actualizada</td>
                                            <td>  <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Martin Camacho</td>
                                            <td>B</td>
                                            <td>08/01/2021</td>
                                            <td>Vencida</td>
                                            <td>  <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>
</tbody> 
</table> 
</div>
                                </div>
                            </div>
                        </div>
                         <!-- END Donut Chart -->
</div><!-- End row -->
</div>


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