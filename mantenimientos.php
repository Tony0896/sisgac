<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mantenimientos</title>
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
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
 $sql="SELECT * FROM MtoUnidad where eco=840;";
        $conn = mysqli_connect($servername, $username, $password, $database);
        $datos= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_object($datos)){
                $prox= $row->proximo;
                //echo $costo;
 } mysqli_close($conn);
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
        <h1 class="h3 mb-0 text-gray-900">Mantenimientos</h1>
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
<div class="col-xl-2 col-lg-5"></div>
<div class="col-xl-7 col-lg-5">
                         <div class="card shadow mb-4">
                                <div class="card-header py-3 border-bottom-info">
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            </div>


<div class="col-xl-3 col-md-6 mb-4"></div>
<div class="col-xl-1 col-md-6 mb-4"></div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Selecciona una Unidad</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <select id="unida" class="selectpicker" data-show-subtext="true" data-live-search="true" onchange="enviar_valores(this.value);">
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
                    </div>
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
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Costo de Unidad</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="costos"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- inicio card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Proximo Mantenimiento</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="prox">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin card -->
<div id="par" >

</div>

<!-- inicio row -->
 <!-- Donut Chart -->
 <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 border-bottom-primary">
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <!-- table-->
                                    <thead>
                                        <tr>
                                            <th>FECHA</th>
                                            <th>CONCEPTO</th>
                                            <th>KM</th>
                                            <th>PROX. SERVICIO</th>
                                            <th>COSTO</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $conn = mysqli_connect($servername, $username, $password, $database);
                                        $sql1="SELECT * FROM MtoUnidad where eco=840";
                                        $datos1=mysqli_query($conn,$sql1);
                                        while($row = mysqli_fetch_object($datos1)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row->fecha; ?></td>
                                            <td><?php echo $row->Concepto; ?></td>
                                            <td><?php echo $row->km; ?></td>
                                            <td><?php echo $row->proximo;?></td>
                                            <td><?php echo $row->costo;
                                            }  mysqli_close($conn); 
                                            ?></td>
                                        
                                        </tr>
</tbody> 
</table> 
</div>  </div>                 
                         <!-- END Donut Chart -->
</div><!-- End row -->
    </div>

    <script type="text/javascript">
	$(document).ready(function(){
		$('#unida').val(801);
		recargar();

		$('#unida').change(function(){
			recargar();
		});
	})
</script>

<script type="text/javascript">
	function recargar(){
		$.ajax({
			type:"POST",
			url:"recarga.php",
			data:"Eco=" + $('#unida').val(),
			success:function(r){
				$('#prox').html(r);
			}
		});
      recargarT();
    }
    function recargarT(){
		$.ajax({
			type:"POST",
			url:"recargaT.php",
			data:"Eco=" + $('#unida').val(),
			success:function(r){
				$('#dataTable').html(r);
			}
		});
        recargarS();
	}
    function recargarS(){
		$.ajax({
			type:"POST",
			url:"recargaS.php",
			data:"Eco=" + $('#unida').val(),
			success:function(r){
				$('#costos').html(r);
			}
		});
	}
    </script>
   <!-- END table -->                                       
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