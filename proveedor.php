<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GAC Proveedores</title>
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
BUTTON {
    color: #fff;
    background-color: #36b9cc;
    border-color: #36b9cc;
    padding: 10px 25px;
    border-radius:12px 12px 12px 12px;
}
input[type=button1], input[type=submit], input[type=reset] {
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
#correo, #categoria{
    display: none;
}
.padre {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <h1 class="h3 mb-0 text-gray-900">GAC Proveedores <?php $hoy = date("Y-m-d");?></h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="container">
    <!-- inicio row -->

<div class="row">
<div class="col-xl-12 col-md-6 mb-4">
    <div class="card border-left-info shadow h-150 py-2">
        <div class="card-body">
    <!-- inicio form -->
        <form action="sube.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="RFC" name="RFC"
                            placeholder="RFC">
                    </div>
                <div class="col-sm-4">
                <input class="btn btn-success btn-icon-split" type="button" id="Buscar" value="BUSCAR">
            </div><div class="col-sm-2">
        </div>
</div>
<div class="form-group row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nombre" id="nombre"
                            placeholder="Nombre" readonly>
                    </div>
                <div class="col-sm-5 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="Razon" name="Razon"
                            placeholder="Razón social" readonly>
            </div>
        </div><br>
        <div class="form-group row">
            <h5>DATOS DE FACTURA:</h5>
            <br>
            <br>
            <div class="col-sm-12"></div>
            <div class="col-sm-1"></div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="factura" name="factura"
                            placeholder="No. Factura">
                    </div>
                <div class="col-sm-4 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="concepto" name="concepto"
                            placeholder="Concepto">
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                <input type="number" class="form-control form-control-user" id="importe" name="importe"
                            placeholder="Importe">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3"></div>
            <label>Fecha de ingreso:</label>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" name="fecha" id="fecha" placeholder="fecha" value="<?php echo $hoy;?>" readonly>
                    </div>
        </div>
        <div class="padre">
        <div class="col-sm-6">
                <label for="recipient-name" class="col-form-label"> PDF: 
                        <input class="btn btn-success btn-icon-split" accept=".pdf" type="file" name="archivopdf" value="Subir PDF"></label>
        </div>
        </div>
        <div class="padre">
        <div class="col-sm-6">
                <label for="recipient-name" class="col-form-label"> XML: 
                        <input class="btn btn-success btn-icon-split" accept=".xml" type="file" name="archivoxml" value="Subir XML"></label>
        </div>
        </div>
    <hr><br>
    <div class="form-group row">
        <div class="col-sm-4"></div>
            <div class="col-sm-3 mb-4 mb-sm-0">
            <button name="termina" id="termina">TERMINAR Y ENVIAR</button>
                    </div>
</div>

<div class="form-group row">
    <div class="col-sm-3 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user" name="correo" id="correo" placeholder="correo" readonly>
    </div>
    <div class="col-sm-3 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user" name="categoria" id="categoria" placeholder="categoria" readonly>
    </div>
</div>
</div>
    <div id="busca"></div</div> 
</div>
</div>
</form>
<!-- END table -->                                       
                    </div>
                </div> 
<!-- scripts --> 
<script type="text/javascript">
    $('#Buscar').click(Busca);

    function Busca(){
        $("#nombre").val("");
        $("#Razon").val("");
        if ($('#RFC').val()==''){
            //alert("Debes colocar tu RFC");
            Swal.fire({icon: 'error', title: 'Debes colocar tu RFC',})
        }else{
            $.ajax({
                    type:"POST",
                    url:"ajax/Buscar.php",
                    data:{
                        RFC:$('#RFC').val()},
                        success:function(data)  
                        {  
                            var resultado = JSON.parse(data);
                            $("#nombre").val(resultado.nombre);
                            $('#Razon').val(resultado.r_social);
                            $('#correo').val(resultado.correo);
                            $('#categoria').val(resultado.id_categoria);
                        }  
                });
        }
    }

    $(document).on('change','input[name="archivopdf"]',function(){
        $("#termina").prop("disabled", false);
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 5000000){
		//alert('El archivo no debe superar los 5MB');
        Swal.fire({icon: 'error', title: 'El archivo no debe superar los 5MB',});
        $("#termina").prop("disabled", true);
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
                $("#termina").prop("disabled", true);
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
});


$(document).on('change','input[name="archivoxml"]',function(){
    $("#termina").prop("disabled", false);
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 5000000){
		//alert('El archivo no debe superar los 5MB');
        Swal.fire({icon: 'error', title: 'El archivo no debe superar los 5MB',});
        $("#termina").prop("disabled", true);
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
                $("#termina").prop("disabled", true);
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
});

$("#archivoxml").on('change', function() {
    if ($('#archivoxml').val()!='' && $('#archivopdf').val()!='') { 
        $("#termina").prop("disabled", false);
    }
});
$("#archivopdf").on('change', function() {
    if ($('#archivopdf').val()!='' && $('#archivoxml').val()!='') { 
        $("#termina").prop("disabled", false);
    }
});

$( document ).ready(function() {
    $("#termina").prop("disabled", true);
    $("#RFC").val('');
    $('#Razon').val('');
    $('#correo').val('');
    $('#categoria').val('');
    $('#factura').val('');
    $('#concepto').val('');
    $('#importe').val('');
    $('#archivopdf').val('');
    $('#archivoxml').val('');
});
</script>

<!-- END scriptsS --> 
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