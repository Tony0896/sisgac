<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Unidades</title>
       <!-- ICONO-->
       <link rel="icon" href="assets/ico.ico">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script language="JavaScript">
        setInterval(window.status="",10);
        </script>
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
    color: #fff;d
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

.hijo {
  width: 100px;
  height: 80px;
  /* centrar vertical y horizontalmente */
  position: absolute;
  top: 53%;
  left: 45%;
  margin: -25px 0 0 -25px; /* aplicar a top y al margen izquierdo un valor negativo para completar el centrado del elemento hijo */
}
</style>
</head>
<?php
$estaciona='" href="estacionamientos.php';
$estaciona1='disable"';
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
}
?>
<body id="page-top">

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
        <h1 class="h3 mb-0 text-gray-900">Unidades</h1>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="container">
<!-- inicio row -->
<div class="row">
                <!-- Donut Chart -->
                <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 border-bottom-primary">
                                    <h6 class="m-0 font-weight-bold text-primary">Unidades</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" justify-content="center">
                                    <div class="chart-pie pt-4">
                                    <div class="hijo">Unidades activas al 98%</div>
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    Relación de unidades
                                </div>
                            </div>
                        </div>
                         <!-- END Donut Chart -->

                         <!-- Bar Chart -->
                         <div class="col-xl-8 col-lg-5">
                         <div class="card shadow mb-4">
                                <div class="card-header py-3 border-bottom-info">
                                    <h6 class="m-0 font-weight-bold text-info">Mantemientos</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Costos por mantenimiento Unidad 801
                                </div>
                            </div>
                        </div>
                            <!-- END Chart -->
 <!-- Donut Chart -->
 <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 border-bottom-warning">
                                    <h6 class="m-0 font-weight-bold text-warning">Incidencias</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <!-- table-->
                                    <thead>
                                        <tr>
                                            <th>INCIDENCIA</th>
                                            <th>FECHA</th>
                                            <th>UNIDAD</th>
                                            <th>INCIDENTE</th>
                                            <th>ESTATUS</th>
                                            <th>EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>25</td>
                                            <td>12/12/2020</td>
                                            <td>801</td>
                                            <td>Percance Vial</td>
                                            <td>Pendiente</td>
                                            <td>  <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>26</td>
                                            <td>17/12/2020</td>
                                            <td>802</td>
                                            <td>Talacha</td>
                                            <td>Realizada</td>
                                            <td>  <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td>18/12/2020</td>
                                            <td>803</td>
                                            <td>Percance Vial</td>
                                            <td>Pendiente</td>
                                            <td>  <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i></a></td>
                                        </tr> <tr>
                                            <td>28</td>
                                            <td>03/01/2021</td>
                                            <td>804</td>
                                            <td>Cambio de foco izquerdo</td>
                                            <td>Realizado</td>
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