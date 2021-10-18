<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Estacionamientos</title>
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
#usuarioau{
    display: none;
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
                    <h1 class="h3 mb-0 text-gray-900">Estacionamientos</h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container">
    <!-- inicio row -->
                            <div class="row">  

                    <!-- Tasks Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primay text-uppercase mb-1">Selecciona una entidad a consultar</div>
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
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- end -->
                        <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ruta a consultar</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <div id="select2lista"></div>
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
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Monto diario</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <div id="monto"> </div>
                                                    </div>  
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>                            
                        </div> 

                        <div class="col-xl-2 col-md-6 mb-4">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">  
                                                    <button type="button" class="btn btn-success btn-icon-split" 
                                            data-toggle="modal" 
                                            data-target="#exampleModal" 
                                            data-whatever="@getbootstrap" id="agregarestaciona">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-plus-circle text-white-600"></i>
                                            </span>
                                        <span class="text">AGREGAR</span>
                                            </button>
                                    <div class="my-4"></div>
                                    <a class="btn btn-info btn-icon-split" id="btn1c">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <span class="text">CONSULTAR</span>
                                    </a>
                                                    </div>  
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

        $('#lista11').change(function(){
			recargarLista1();
		});

        $('#btn1c').click(function(){
			recargarTabla();
            monto();
		});
	})

	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"Entidad=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}

    function recargarLista1(){
		$.ajax({
			type:"POST",
			url:"modalruta.php",
			data:"Entidad=" + $('#lista11').val(),
			success:function(r){
				$('#select2lista1').html(r);
			}
		});
	}

    function recargarTabla(){
		$.ajax({
			type:"POST",
			url:"tablaEstaciona.php",
			data:{
            Entidad: $('#lista1').val(),
            Ruta: $('#lista2').val()},
			success:function(r){
				$('#Table').html(r);
			}
		});
	}

    function monto(){
		$.ajax({
			type:"POST",
			url:"monto.php",
			data:{
            Entidad: $('#lista1').val(),
            Ruta: $('#lista2').val()},
			success:function(r){
				$('#monto').html(r);
			}
		});
	}

    function Guarda(){
        //alert($('#lista11').val()+$('#lista21').val()+$('#SAP').val()+$('#plaza').val()+$('#tolerancia').val()+$('#lista4').val());
        if ($('#SAP').val() != '' && $('#plaza').val() != '' && $('#tolerancia').val() != ''){
        $('#button :input').attr('disabled', true);
        $.ajax({
                type:"POST",
                url:"llenaEstaciona.php",
                dataType:"json",
                data:{
                    Entidad:$('#lista11').val(),
                    Ruta:$('#lista21').val(),
                    SAP:$('#SAP').val(), 
                    Plaza:$('#plaza').val(),
                    Tolerancia:$('#tolerancia').val(),
                    Costo:$('#costo').val(),
                    Dias:$('#lista4 option:selected').val(),
                    Usuario:$('#usuarioau').text()
                }
            }).done(
                function(data){
                    $('#resultado1').append(data);
                });
        } else {
            //alert("Todos los campos deben ser llenados");
            Swal.fire({icon: 'error', title: 'Todos los campos deben ser llenados',});
            } 
    }
    </script>


<!-- end -->

<!--Modal-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5>Agregar estacionamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> Entidad: </label>
            <select select id="lista11" name="lista11" class="selectpicker" data-show-subtext="true" data-live-search="true">
                <option value="0">Selecciona una entidad</option>
                    <?php
                    $sql="SELECT * FROM Zona";
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    $datos= mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_object($datos)){
                    ?>
                    <option value="<?php echo $row->id_zona;?>"> <?php echo $row->zona;?> </option>
                    <?php  } mysqli_close($conn);?>  </select> <br>
            <label for="recipient-name" class="col-form-label">Ruta: <div id="select2lista1"></div></label><br>
            <label for="recipient-name" class="col-form-label">SAP:</label>
            <input type="text" class="form-control" id="SAP">
            <label for="recipient-name" class="col-form-label">Plaza:</label>
            <input type="text" class="form-control" id="plaza">
            <label for="recipient-name" class="col-form-label">Tolerancia:</label>
            <input type="text" class="form-control" id="tolerancia">
            <label for="recipient-name" class="col-form-label">Monto:</label>
            <input type="number" class="form-control" id="costo">
            <label for="recipient-name" class="col-form-label">Días autorizados:</label>
            <br>
            <select select id="lista4" name="lista4" class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option value="DIARIO">DIARIO</option>
            <option value="MARTES Y JUEVES">MARTES Y JUEVES</option>
            <option value="MARTES Y VIERNES">MARTES Y VIERNES</option>
            <option value="LUNES, MIERCOLES Y VIERNES">LUNES, MIERCOLES Y VIERNES</option>
            <option value="COMPROBADO">COMPROBADO</option>
            <option value="LIBRE">LIBRE</option></select> 
            <br>
            <span id="usuarioau"><?php echo $usuario ?></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      <span id="colaborador1"></span>
      <span id="descri"></span>
      <div id="resultado1"></div>
        <button type="btnGuardar" class="btn btn-success" id="Guarda" onclick="Guarda()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--FIn Modal-->

<!-- table -->
<div class="card shadow mb-4">
    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="Table" width="100%" cellspacing="0">
                                    <!-- table-->
                                </table> 
                        </div>
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

    <!-- Page procesos JS y AJAX     -->
    <script src="js/js.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>