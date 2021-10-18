<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GAC</title>
   <!-- ICONO-->
    <link rel="icon" href="assets/ico.ico">
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
.padre {
  height: 550px;
  /*IMPORTANTE*/
  display: flex;
  justify-content: center;
  align-items: center;
}

.hijo {
  background: red;
  width: 120px;
}
.right{
    float: right;
}
.sinborde {
  border: 0;
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php
//end variables
$usuario= $user->getNombre();
    $usuario1=$user->getUsername();
//Vaariables para acticar menu PERMISOS

$numero=1;
$numeroEM=1;
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
//echo $ieco
include_once ('vistas/sidebar.php');
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
                    <h1 class="h3 mb-0 text-gray-900">Administrador De Procesos</h1>
                </nav>
                <div class="right"> <?php //include_once ('vistas/reloj.php'); ?></div>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container">
    <!-- inicio row -->
    <div class="padre">
 <img src="static/img/logo.png"  width= "400px" height= "400px" class="img-fluid" alt="Responsive image">
</div>

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