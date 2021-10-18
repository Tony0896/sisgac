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
    font-size: 0.85rem;
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
                    <h1 class="h3 mb-0 text-gray-900">Unidades <?php $hoy = date("j/n/Y");?></h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container">
    <!-- inicio de todo -->
<div class="row">

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">UNIDADES</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <select select id="unidad" name="unidad" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true" data-toggle="tooltip" data-placement="top" title="ECO">
                                    <?php
                                    $sql="SELECT * FROM Unidad where ECO like '8%' and ECO <> '800' Order by ECO asc";
                                    $conn = mysqli_connect($servername, $username, $password, $database);
                                    $datos= mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_object($datos)) {
                                    ?> 
                                    <option value="<?php echo $row->ECO;?>"> <?php echo $row->ECO;?> </option>
                                    <?php  } mysqli_close($conn);
                                    ?>  </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">AÑO</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="anio"> 
<!-- Impresion de datos -->           
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PLACAS</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="placas"> 
<!-- Impresion de datos -->            
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SERIE</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="serie">
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ENTIDAD</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="entidad"> 
<!-- Impresion de datos -->           
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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ENGOMADO</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="engomado"> 
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ÚLTIMA VERIFICACIÓN</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="uv"> 
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">PRÓXIMA VERIFICACIÓN</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="pv"> 
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">APLICA</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="aplica"> 
<!-- Impresion de datos -->         
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

<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">HOLOGRAMA</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="holo">
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">KM ACTUAL</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="kma">
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                                    <div class="col">
                                        <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="fkma">
<!-- Impresion de datos -->            
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">KM CARGA</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="kmc">
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                                    <div class="col">
                                        <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="fkmc">
<!-- Impresion de datos -->             
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">RENDIMIENTO PROMEDIO</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="rendimiento"> 
<!-- Impresion de datos -->         
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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PROVEEDOR</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="proveedor"> 
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

<div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">VENCIMIENTO PROVEEDOR</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="vproveedor"> 
<!-- Impresion de datos -->         
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
                        <div class="font-weight-bold text-success text-uppercase mb-1">VER PÓLIZA</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="vpoliza"> 
<!-- Impresion de datos -->      
                                    </div>
                                </div>
                                    <div class="col"></div>
                            </div>
                        </div>
                    <div class="col-auto">
                        <button class="btn btn-success btn-circle" id="poliza" name="poliza" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
                            <i class="fas fa-eye"></i>
                        </button>
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
                        <div class="font-weight-bold text-success text-uppercase mb-1">TARJETA DE CIRCULACIÓN</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800" id="vtarjeta"> 
<!-- Impresion de datos -->         
                                    </div>
                                </div>
                                    <div class="col"></div>
                            </div>
                        </div>
                    <div class="col-auto">
                        <button class="btn btn-success btn-circle" id="tarjeta" name="tarjeta" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="res"></div>  
    <div id="e"></div>                         
</div>

        </div> 
   <!-- fin de todo -->

      <!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>ACCIONES <label for="recipient-name" class="col-form-label" id ="Meco"></label></h5> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
    </div>
        <div class="modal-body">
            <button class="btn btn-primary" id="Mcarga"><label for="inputfile"><i class="fas fa-upload fa-2x"></i></label></button> &nbsp&nbsp&nbsp SUBIR
            &nbsp&nbsp&nbsp <button class="btn btn-info" id="Mguarda"><i class="fas fa-save fa-2x"></i></button> &nbsp&nbsp&nbsp 
            <input class="btn btn-danger" accept=".jpg" type="file" name="poli" id="inputfile" style="display:none; visibility:none;">
            <br>
            <hr>
            <button class="btn btn-success" id="Mdescarga"><label><i class="fas fa-download fa-2x"></label></i></button> &nbsp&nbsp&nbsp DESCARGAR
        </div>
            <div class="modal-footer">
            <span id="Midgas"></span>

            </div>
        </div>
    </div>
</div>

<!--FIn Modal-->

   <!-- js -->
   <script type = "text/JavaScript">
    $(document).ready(function() {
        Carga();
    //Listos();
    });

    $('#unidad').change(function(){
        Carga();
    });

    function Carga(){
        //alert($('#unidad').val());
        $.ajax({
            type:"POST",
            url:"ajax/datos.php",
            data:"ECO=" + $('#unidad').val(),
            success:function(data)  {  
            var resultado1 = JSON.parse(data);
            //$("#res").html(data);
            $("#anio").html(resultado1.anio);
            $("#placas").html(resultado1.placas);
            $("#serie").html(resultado1.serie);
            $("#entidad").html(resultado1.zona);
            $("#engomado").html(resultado1.engomado);
            $("#uv").html(resultado1.ul_verifi);
            $("#pv").html(resultado1.periodo);
            $("#aplica").html(resultado1.observaciones);
            $("#holo").html(resultado1.holograma);
            $("#kma").html(resultado1.kma);
            $("#fkma").html(resultado1.fr);
            $("#kmc").html(resultado1.kmc);
            $("#fkmc").html(resultado1.fcarga);
            $("#rendimiento").html(resultado1.rendimientot);
            $("#proveedor").html(resultado1.Proveedor2);
            $("#vproveedor").html(resultado1.cad_gps);
            //$("#e").html(resultado1.observaciones);
            }  
        });
    }

    $('#Mdescarga').click(function(){
        //alert($('#unidad').val());
        window.open('https://sistemas.grupoaircond.mx/sisgac/polizas/'+$('#unidad').val()+'.jpg', '_blank');
    });

    $(document).on('change','input[name="poli"]',function(){
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 5000000){
		//alert('El archivo no debe superar los 5MB');
        Swal.fire({icon: 'error', title: 'El archivo no debe superar los 5MB',});;
		this.value = '';
		this.files[0].name = '';
	}else{
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();
		
		// Convertimos en minúscula porque 
		// la extensión del archivo puede estar en mayúscula
		ext = ext.toLowerCase();
    
		// console.log(ext);
		switch (ext) {
			case 'jpg': break;
			default:
				//alert('El archivo no tiene la extensión adecuada de PDF');
                Swal.fire({icon: 'error', title: 'El archivo no tiene la extensión adecuada de jpg',});
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
});

    $('#Mguarda').click(function(){
        Input();
    });


function Input(){
        if( $('#inputfile').val()==0){
            //alert('vacio');
            Swal.fire({icon: 'error', title: 'No se ha seleccionado nada',});
        }else{
            //alert('lleno');
        var formData = new FormData();
        var files = $('#inputfile')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'url.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    Swal.fire('', 'Guardado correctamente!', 'success');
                } else {
					Swal.fire({icon: 'Error.', title: 'No se ha podido guardar.',});
				}
            }
        });
    }
}

    </script>
    <!-- js -->

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
