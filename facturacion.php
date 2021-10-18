<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Facturación</title>

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

$rutas="CDMX";

$btnPencil="btnPencil";

$btnTrash="btnTrash";

        $servername = "207.210.228.84";

        $database = "grupoair_db1";

        $username = "grupoair_userdb1";

        $password = "grupoair_orlando";

        $sql="SELECT * FROM Unidad WHERE ECO = '810';";

        $conn = mysqli_connect($servername, $username, $password, $database);

        $datos= mysqli_query($conn, $sql);

            while($row = mysqli_fetch_object($datos)){

            $id_zona= $row->id_zona;

            $Placa=$row->PLACAS;

            $Operador = $row->Operador;

            $Proveedor=$row->Proveedor;

        ?>

                  <!-- Page Wrapper   <a class="dropdown-item" href="#"> <?php //echo $row->zona;?> </a>     Page Wrapper -->

<?php  }  mysqli_close($conn); 

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

                    <h1 class="h3 mb-0 text-gray-900">Facturación <?php $hoy = date("j/n/Y");?></h1>

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

<div class="col-xl-1 col-md-6 mb-4">  </div>



                    <!-- Tasks Card Example -->

                        <div class="col-xl-4 col-md-6 mb-4">

                            <div class="card border-left-success shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selecciona una entidad a consultar</div>

                                            <div class="row no-gutters align-items-center">

                                                <div class="col-auto">

                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                                    <select select id="lista1" name="lista1" class="selectpicker" data-show-subtext="true" data-live-search="true">

                                                    <option value="0">Selecciona una opcion</option>

                                                        <?php
                                                                $sql="SELECT * FROM Zona";

                                                                $conn = mysqli_connect($servername, $username, $password, $database);

                                                                $datos= mysqli_query($conn, $sql);

                                                                while($row = mysqli_fetch_object($datos)){

                                                                ?>

                                                                <option value="<?php echo $row->id_zona;?>"> <?php echo $row->zona;?> </option>

                                                                <?php  } mysqli_close($conn);?>  </select> 

                                                    </div>  

                                                    </div>

                                                </div>

                                        <div class="col">



                                        </div>

                                            </div>

                                        <div class="col-auto">

                                            <i class="fas fa-map-marker-alt fa-2x text-gray-600"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                    <!-- end -->

                        <!-- Tasks Card Example -->

                        <div class="col-xl-6 col-md-6 mb-4">

                            <div class="card border-left-danger shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Colaborador</div>

                                            <div class="row no-gutters align-items-center">

                                                <div class="col-auto">

                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                                    <div id="select2lista"></div>

                                                    </div>  

                                                    </div>

                                                </div>

                                        <div class="col"></div>

                                            </div>

                                        <div class="col-auto">

                                            <i class="fas fa-user-friends fa-2x text-gray-600"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>                            

                        </div> 



                    </div>



<script type="text/javascript">

	$(document).ready(function(){

		$('#lista1').val(1);

		recargarLista();



		$('#lista1').change(function(){

			recargarLista();

		});

	})

</script>



<script type="text/javascript">

	function recargarLista(){

		$.ajax({

			type:"POST",

			url:"datos1.php",

			data:"Entidad=" + $('#lista1').val(),

			success:function(r){

				$('#select2lista').html(r);

			}

		});

	}

</script>



<!-- end -->

<!-- table -->

<div class="card shadow mb-6">

    <div class="card-body">

        <div class="form-group row">

        <div class="col-sm-1 mb-3 mb-sm-0">

            </div>

            <div class="col-sm-3 mb-3 mb-sm-0">

                <input type="number" class="form-control form-control-user" id="monto"

                    placeholder="Monto">

            </div>

        <div class="col-sm-2">

    <select select id="lista3" name="lista3" class="selectpicker" data-show-subtext="true" data-live-search="true" disabled>

            <option value="factura">Facturación</option>

            <option value="deposito">Depósito</option>

    </select> 

    </div><div class="col-sm-2">

     <select select id="lista4" name="lista4" class="selectpicker" data-show-subtext="true" data-live-search="true" disabled>

     <option value="NA">Tipo</option>

            <option value="con factura">Con factura</option>

            <option value="sin factura">Sin factura</option>

    </select> 

    

</div>

<div class="col-sm-3 mb-3 mb-sm-0">

<input type="date" class="form-control form-control-user" id="fecha" placeholder="fecha">

            </div>

</div>

    <div class="form-group">

        <input class="form-control form-control-user" id="descripcion" placeholder="Descripción">

    </div>

</div>

</div></div></div>





<div class="row">



<!-- Espacio al frente-->

<div class="col-xl-2   col-md-6 mb-4"></div>



    <div class="col-xl-4 col-md-6 mb-4">

        <div class="card border-left-info shadow h-100 py-2">

            <div class="card-body">

            <div class="col mr-2">

            <div class="row no-gutters align-items-center">

                <div class="align-items-center" id="button">

                <div class="col mr-2">

                    <input type="button" id="btn1" value="TERMINAR FACTURA" >

                </div>  

                    <div class="col"></div>

                </div>

        </div>

    </div>

    </div></div>

        <script type="text/javascript">

        var item = $('#lista2').val();

$('#btn1').click(lleno);

function lleno(){

    //alert("a"+$('#lista1').val());

    if ($('#monto').val() != '' && $('#fecha').val() != '' && $('#descripcion').val() != ''){

        $('#button :input').attr('disabled', true);

        $.ajax({

                type:"POST",

                url:"llena.php",

                dataType:"json",

                data:{

                    Entidad:$('#lista1').val(),

                    Colaborador:$('#lista2 option:selected').text(),

                    Monto:$('#monto').val(), 

                    Tipo:$('#lista3').val(),

                    Fecha:$('#fecha').val(),

                    Des:$('#descripcion').val(),

                    Tipo1:('NA')

                }

            }).done(

                function(data){

                    $('#resultado').append(data);

                }

            );

} else {
    //alert("Todos los campos deben ser llenados");
    Swal.fire({icon: 'error', title: 'Todos los campos deben ser llenados',});
    }

}

</script>

</div>  

<div class="col-xl-4 col-md-6 mb-4">

    <div class="card border-left-success shadow h-100 py-2">

        <div class="card-body">

            <div class="col mr-2">

                <div class="row no-gutters align-items-center">

                    <div class="align-items-center" id="button">

                        <div class="col mr-2">

                <input type="button" id="btn2" value="CONSULTAS">

                </div>  

                    <div class="col"></div>

                </div>

            </div>

        </div>

    </div>

</div> </div> </div>  



    <!-- Divider -->

<hr class="sidebar-divider my-0">

<br> <div id="resultado">

    </div>

<script>

    $('#btn2').click(envia);

function envia(){

    //alert("a");

    window.location.href = 'consultas.php';

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



    <!-- Page procesos JS y AJAX     -->

    <script src="js/js.js"></script>



    <!-- Page level custom scripts -->

    <script src="js/demo/chart-area-demo.js"></script>

    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>