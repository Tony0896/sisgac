<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consultas</title>
       <!-- ICONO-->
       <link rel="icon" href="assets/ico.ico">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
    <script src="js/tableToExcel.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style> 
    input[type=button], input[type=submit], input[type=reset] {
    color: #fff;
    background-color: #36b9cc;
    border-color: #36b9cc;
    padding: 10px 15px;
    border-radius:12px 12px 12px 12px;
}
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
#dataTable{
    display: none;
}
</style>
</head>
<?php
//if($_GET['pagina']>$paginas or $_GET['pagina']<=0){
  //  header('Location:index.php?pagina=1');
//}
//echo $iniciar;
?>
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
}
?>
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
       ?>
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
        <h1 class="h3 mb-0 text-gray-900">Consultas</h1>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="container">
<!-- inicio row -->
<div class="row">
<!-- Espacio al frente-->
<div class="col-xl-1 col-md-6 mb-4"></div>
<div class="col-xl-9 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="col mr-2">
                <div class="row no-gutters align-items-center">
                    <div class="align-items-center">
                        <div class="col mr-2">
                        <?php $timezone  = -6; $dia= gmdate('Y-m-d', time() + 3600*($timezone+date("I"))); ?>
                        <input type="date" id="inicio" name="requisicion" value="<?php echo $dia; ?>">
                        <?php //echo $dia; ?>
                        &nbsp;&nbsp;&nbsp;
                        <input type="date" id="fin" name="requisicion" value="<?php echo $dia; ?>">
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" id="btn2" value="Consultar" class="btn btn-success" name="Consultar">
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" class="btn btn-success" id="btn1" onclick="tableToExcel('table', 'Reporte')" value="Exportar">
                </div>  
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>  
<!-- Donut Chart -->
<div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 border-bottom-primary">                         
                                </div>
                                <div class="card-body">
                                    <!-- TABLA VISIBLE-->
                                <div class="table-responsive" id="table">

<!-- TABLA VISIBLE-->

<script type="text/javascript"> 
    $('#btn2').click(consulta);
    function consulta(){
       // alert($('#inicio').val()+$('#fin').val()); 
        $.ajax({
                type:"POST",
                url:"ajax/consulta_prov.php",
                data:{inicio:$('#inicio').val(),
                    fin:$('#fin').val()}, 
                        success:function(data)  
                        {  
                            $('#table').html(data); 
                        }  
        });
    }
    
    </script>
<div id="res"></div>
        </div>
    </div>    
</div>
</div>
                        <!-- END Donut Chart -->
</div><!-- End row -->

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