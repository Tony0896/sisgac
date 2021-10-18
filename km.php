<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kilometrajes</title>
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
input[type=button], input[type=submit], input[type=reset] {
    color: #fff;
    background-color: #36b9cc;
    border-color: #36b9cc;
    padding: 10px 25px;
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
#par{
    display: flex;
    justify-content: center;
}
#calcula{
    align-items: center;
    justify-content: center;
}
#t01, table, th, td{
    align-items: center;
    justify-content: center;
    border:1px solid black;
    border-collapse: collapse;
    padding: 8px;
    border-spacing: 5px;
}
#t01{
    width: 60%;
}
th,td{
    text-align: center;
}
#ecokm{
    align-items: center;
    justify-content: center;
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
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
                    <h1 class="h3 mb-0 text-gray-900">Kilometrajes <?php $hoy = date("j/n/Y");?></h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container">
    <!-- inicio de todo -->
     <div class="row">  
     <div class="col-sm-12">
<div class="card border-left-success shadow h-100 sm-12">
    <div class="card-body">
        <div class="form-group row">  
       <!-- <div class="col-sm-1 mb-3 mb-sm-0"></div> -->
        <div class="col-sm-2 mb-3 mb-sm-0">
        <select id ="unida" class="selectpicker" name="unida" data-show-subtext="true" data-live-search="true">
            <option value="0">Unidades</option>
                    <?php
                    $sql="SELECT ECO FROM Unidad  where ECO LIKE '8%'";
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    $datos= mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_object($datos)){
                    ?><option value="<?php echo $row->ECO;?>"> <?php echo $row->ECO;?> </option>
                    <?php  } mysqli_close($conn);?>  </select> 
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <input type="number" class="form-control form-control-user" id="kmini"
                    placeholder="KM Inicio"> 
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                    <input type="number" class="form-control form-control-user" id="kmfin"
                    placeholder="KM Fin"> </div>
<div class="col-sm-3 mb-3 mb-sm-0" id="">
<input type="date" class="form-control form-control-user" id="fecha" placeholder="fecha">
            </div>
<div class="col-sm-3 mb-3 mb-sm-0" id="calculos" >

</div>            
</div>
<div class="form-group row">  

            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="observaciones"
                    placeholder="Observaciones"> 
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="motivo"
                    placeholder="Motivo"> </div>
</div>
</div>

<script type="text/javascript">
    
   
    </script>

<div class="col-sm-3 mb-3 mb-sm-0" id="calculos1" >
</div>
</div>
</div>

<div class="col-xl-12 col-md-6 mb-4"></div>
    <!-- Espacio -->
<div class="col-xl-2 col-md-6 mb-4"></div>
<div class="col-xl-5 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="col mr-2">
                <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    <input type="button" id="calcula" class="btn btn-info btn-icon-split" value="CALCULAR">
                    </div>
                        <div class="align-items-center" id="button">
                            <div class="col-auto">
                                <input type="button" class="btn btn-info btn-icon-split" id="km" value="TERMINAR KM">
                            </div>  
                    <div class="col"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="col mr-2">
                <div class="row no-gutters align-items-center">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        <input type="button" class="btn btn-danger btn-icon-split" value="CONSULTAS" id="Consulta">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#calcula').click(calcula);
    function calcula(){
        //alert("a"+$('#lista1').val());
    if ($('#unida').val() == '800' || $('#unida').val() == '0'){
        //alert("Selecciona una unidad");
        Swal.fire({icon: 'error', title: 'Selecciona una unidad',});
        }else {
            if ($('#kmini').val() != '' && $('#kmfin').val() != '' && $('#fecha').val() != ''){
            $('#button :input').attr('disabled', true);
            $.ajax({
                    type:"POST",
                    url:"calcula.php",
                    dataType:"json",
                    data:{
                        Unida:$('#unida').val(),
                        Kmini:$('#kmini').val(), 
                        Kmfin:$('#kmfin').val(),
                        Fecha:$('#fecha').val(),
                        Observaciones:$('#observaciones').val(),
                        Motivo:$('#motivo').val()},
                        success:function(data)  
                        {  
                            $('#calculos').html(data); 
                        }  
                });
            } else {
                //alert("Debes llenar los KM y Fecha");
                Swal.fire({icon: 'error', title: 'Debes llenar los KM y Fecha',});
            } 
        }
    }

    $('#km').click(kmllena);
    function kmllena(){
        //alert("a"+$('#recorrido').val());
      
    if ($('#recorrido').val() == null){
        //alert("No haz ingresado datos");
        Swal.fire({icon: 'error', title: 'No haz ingresado datos',});
        }else {
            $('#button :input').attr('disabled', true);
            $.ajax({
                    type:"POST",
                    url:"llenakm.php",
                    dataType:"json",
                    data:{
                        Unida:$('#unida').val(),
                        Kmini:$('#kmini').val(), 
                        Kmfin:$('#kmfin').val(),
                        Fecha:$('#fecha').val(),
                        Observaciones:$('#observaciones').val(),
                        Motivo:$('#motivo').val(),
                        Recorrido:$('#recorrido').val()},
                        success:function(data)  
                        {  
                            $('#calculos1').html(data); 
                        }  
                });
    }
        }
        $('#unida').change(function(){
			ecokm();
		});
        function ecokm(){
            //alert("a"+$('#unida').val());
            $.ajax({
                    type:"POST",
                    url:"ecokm.php",
                    data:{
                        Unida:$('#unida').val()},
                        success:function(data)  
                        {  
                            $('#ecokm').html(data); 
                        }  
                });
        }

        $('#Consulta').click(Consulta);
    function Consulta(){
        window.location.href="con_odo.php";
    }
    </script>
        </div>
    </div>
</div>  
<div id="par" >
<div class="col-xl-3 col-md-6 mb-4"></div>
<div class="col-sm-10 mb-3 mb-sm-0" id="ecokm" >

</div>
    </div>
    <!-- Divider -->
    <br>
<hr class="sidebar-divider my-0">
<br>

<!-- END table -->                            


   <!-- fin de todo -->                                   
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

    <!-- Page procesos JS y AJAX     -->
    <script src="js/js.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>