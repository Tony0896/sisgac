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
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
?>
    <!-- Page Wrapper -->
    <div id="wrapper">
<?php
$hoy = date("Y-m-d");
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
                    <h1 class="h3 mb-0 text-gray-900">Depósitos <?php //echo $hoy;?></h1>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
            <button class="btn btn-danger" id="cat" name="cat"  data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Categoria</button>
        </div>
<!-- inicio de todo -->
<div class="row">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-150 py-2">
            <div class="card-body">
            <form action="guarda.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="RFC" name="RFC" placeholder="RFC">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="noFac" name="noFac" placeholder="No. Factura">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="concepto" name="concepto" placeholder="Concepto">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="number" class="form-control form-control-user" id="importe" name="importe" placeholder="Importe">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user" name="fecha" id="fecha" placeholder="fecha" value="<?php echo $hoy;?>">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="semana" name="semana" placeholder="Semana" readonly>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <select select id="categoria" name="categoria" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true">
                        <?php
                        $sql="SELECT * FROM cat_provedores";
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        $datos= mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_object($datos)) {
                    ?> 
                        <option value="<?php echo $row->id_cat;?>"> <?php echo $row->categoria;?> </option>
                    <?php  } mysqli_close($conn);
                    ?>  </select> 
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="motivo" name="motivo" placeholder="Motivo">
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-1 mb-3 mb-sm-0"></div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <select select id="status" name="status" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true">
                            <option value="Programado">Programado</option>
                            <option value="Pagado">Pagado</option>
                        </select> 
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input class="btn btn-danger btn-icon-split" accept=".pdf" type="file" name="archivopdf" value="Subir PDF">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input class="btn btn-success btn-icon-split" accept=".xml" type="file" name="archivoxml" value="Subir XML">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="noTransferencia" name="noTransferencia" placeholder="No. Trasnferencia">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="noCuenta" name="noCuenta" placeholder="No. Cuenta">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user" name="fechaP" id="fechaP" placeholder="fechaP" value="<?php echo $hoy;?>">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="semanaP" name="semanaP" placeholder="Semana" readonly>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-5 mb-3 mb-sm-0" id="res">
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <button type="btnGuardar" class="btn btn-info" id="termina" name="termina">Guardar</button>
                    </div>
                    <div id="response" class="col-sm-5 mb-3 mb-sm-0">
                    </div>
                </div>
            </form>
                </div>
            </div>                                      
        </div>
    </div> 
</div>
<!-- fin de todo -->  

<!--Modal-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Agregar categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
    </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
            <label for="recipient-name" class="col-form-label">Categoría:</label>
            <input type="text" class="form-control" id="cate">
        </div>
            </form>
        </div>
            <div class="modal-footer">
            <button type="btnGuardar" class="btn btn-success" id="Guardar">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!--FIn Modal-->

<script type="text/javascript">

    $( document ).ready(function() {
    cargaPag();
    });

    $("#Guardar").click(function() {
    cat();
    });

    function cargaPag(){
        //alert($('#fecha').val()+" "+$('#fechaP').val());
        $.ajax({
			type:"POST",
			url:"ajax/semanas.php",
            data:{semana:$("#fecha").val(),
            semanaP:$("#fechaP").val()}, 
			success:function(data)  
                        {  
                            var resultado1 = JSON.parse(data);
                            $("#semana").val(resultado1.a);
                            $("#semanaP").val(resultado1.b);
                        }  
		});
	}

    function cat(){
        if ($('#cate').val()==""){
            Swal.fire({
                icon: 'error',
                title: 'Debes llenar los datos',
                })
        }else {
            //alert("no vacio");
            $.ajax({
			type:"POST",
			url:"ajax/categoria.php",
            data:{categoria:$("#cate").val()
            }, 
            success:function(data)  
                {  
                    $('#response').html(data); 
                    $('#exampleModal').modal('hide')
                }  
		});
        }
	}

    
    $("#fecha").change(function() {
        cargaPag();
    });
    $("#fechaP").change(function() {
        cargaPag();
    });

    $(document).on('change','input[name="archivopdf"]',function(){
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 5000000){
		//alert('El archivo no debe superar los 5MB');
        Swal.fire({icon: 'error', title: 'El archivo pesa mas de 5MB',});
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
			case 'pdf': break;
			default:
				//alert('El archivo no tiene la extensión adecuada de PDF');
                Swal.fire({icon: 'error', title: 'El archivo no tiene la extensión adecuada de PDF',});
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
});


$(document).on('change','input[name="archivoxml"]',function(){
    //alert(this.files[0].size);
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 5000000){
		//alert('El archivo no debe superar los 5MB');
        Swal.fire({icon: 'error', title: 'El archivo pesa mas de 5MB',});
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
			case 'xml': break;
			default:
				//alert('El archivo no tiene la extensión adecuada de XML');
                Swal.fire({icon: 'error', title: 'El archivo no tiene la extensión adecuada de XML',});
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
    
});
</script>
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