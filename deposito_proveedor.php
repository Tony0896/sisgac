<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Depósitos</title>
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
                    <?php $hoy = date("j/n/Y"); $semana=date('W'); ?>
                    <h1 class="h3 mb-0 text-gray-900">Depósitos a Proveedores | Semana:</h1> &nbsp&nbsp&nbsp 
                    <h1 class="h3 mb-0 text-gray-900" id="semana"> <?php echo $semana?> </h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container">
    <!-- inicio de todo -->
<div class="row">                                     
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-bottom-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Acumulado de pago</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="acumulado" >
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-bottom-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pagado</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="pagado">
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-bottom-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-1">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"> Por Pagar</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="pagar">
                                        $2000
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>    


<div class="row"> 
<div class="col-xl-12 col-md-6 mb-4"> 
<div class="card shadow mb-12">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="Table" width="100%" cellspacing="0">
            </table> 
        </div>
    </div>
</div>
    <!-- END table -->                                       
                </div>   
    </div>
</div>

<!--Modal-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
    </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Estatus: </label>
            <br>
            <select select id="status" name="status" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true">
            <option value=""></option>
            <option value="Programado">Programado</option>
            <option value="Pagado">Pagado</option></select> 
            <br>
            <label for="recipient-name" class="col-form-label">Motivo:</label>
            <input type="text" class="form-control" id="motivo">
            <label for="recipient-name" class="col-form-label">Transferencia:</label>
            <input class="form-control" id="transferencia">
            <label for="recipient-name" class="col-form-label">Cuenta:</label>
            <input class="form-control" id="cuenta">
            <label for="recipient-name" class="col-form-label">Fecha de pago:</label>
            <input type="date" class="form-control" id="fechaP">
        </div>
            </form>
        </div>
            <div class="modal-footer">
            <span id="colaborador1"></span>
            <span id="descri"></span>
            <div id="resultado1"></div>
            <button type="btnGuardar" class="btn btn-success" id="Guarda" onclick="Edit(this.id)">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!--FIn Modal-->

<script type="text/javascript">

$( document ).ready(function() {
cargaPag();
});

        function recargarT(){
		$.ajax({
			type:"POST",
			url:"recargaTa.php",
            data:{semana:$("#semana").text(),}, 
			success:function(r){
				$('#Table').html(r);
			}
		});
	}
    function presupuesto(){
		$.ajax({
			type:"POST",
			url:"ajax/presupuesto.php",
            data:{semana:$("#semana").text()}, 
			success:function(data)  
                        {  
                            var resultado1 = JSON.parse(data);
                            $("#acumulado").text(resultado1.importe1);
                        }  
		});
	}
    function presupuesto1(){
		$.ajax({
			type:"POST",
			url:"ajax/presupuesto1.php",
            data:{semana:$("#semana").text()}, 
			success:function(data)  
                        {  
                            var resultado2 = JSON.parse(data);
                            $("#pagado").text(resultado2.importe2);
                        }  
		});
	}
    function presupuesto2(){
		$.ajax({
			type:"POST",
			url:"ajax/presupuesto2.php",
            data:{semana:$("#semana").text()}, 
			success:function(data)  
                        {  
                            var resultado3 = JSON.parse(data);
                            $("#pagar").text(resultado3.importe3);
                        }  
		});
	}

    function showEdit(clicked_id){
        //alert("id "+clicked_id); 
        $.ajax({
                type:"POST",
                url:"detalles1.php",
                data:{clave:clicked_id}, 
                        success:function(data)  
                        {  
                            var resultado = JSON.parse(data);
                            $("#colaborador1").text(resultado.id_pago);
                            $("#status").val(resultado.status),
                            $('#motivo').val(resultado.motivo),
                            $('#cuenta').val(resultado.n_cuenta_realizado),
                            $('#transferencia').val(resultado.n_transferencia),
                            $('#fechaP').val(resultado.fecha_pago)
                        }  
        });
    }

    function Edit(){
    //alert("id "+$('#colaborador1').text()+$('#status').val()+$('#motivo').val()+$('#transferencia').val()+$('#fechaP').val()); 
    $.ajax({
                type:"POST",
                url:"updates1.php",
                data:{
                    id:$("#colaborador1").text(),
                    status:$("#status").val(),
                    motivo:$('#motivo').val(),
                    cuenta:$('#cuenta').val(),
                    transferencia:$('#transferencia').val(),
                    fechaP:$('#fechaP').val()
                    },
                    success:function(data)  
                        {  
                            $('#resultado1').html(data); 
                        }  
        });
    }

    function cargaPag(){
        recargarT();
        presupuesto();
        presupuesto1();
        presupuesto2();
    }

    function Consultaas(){
        window.location.href="con_prov.php";
    }
</script>

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