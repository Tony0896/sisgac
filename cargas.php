<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cargas de combustible</title>
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
#invisible{
    display: none;
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
                    <h1 class="h3 mb-0 text-gray-900">Cargas de combustible 
                        <?php
                        $Object = new DateTime();  
                        $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
                        $hoy = $Object->format("Y-m-d");  
                        //echo $hoy;
                        ?>
                    </h1>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">
                    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="container">
<!-- inicio de todo -->
<div class="row">
    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-success shadow h-150 py-2">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-1 mb-3 mb-sm-0">
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
                    <div class="col-sm-2 mb-3 mb-sm-0" id="selectzona" data-toggle="tooltip" data-placement="top" title="ZONA">
                        <input type="text" class="form-control" id="zona" name="zona" placeholder="Zona" readonly>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="fecha" value="<?php echo $hoy;?>" data-toggle="tooltip" data-placement="top" title="FECHA">
                    </div>
                    <div class="col-sm-2 mb-2 mb-sm-0">
                        <input type="number" class="form-control" id="litros" name="litros" placeholder="Litros" data-toggle="tooltip" data-placement="top" title="LITROS">
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control" id="importe" name="importe" placeholder="Importe" data-toggle="tooltip" data-placement="top" title="IMPORTE">
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <button class="btn btn-primary btn-circle" id="calcula" name="calcula"><i class="fas fa-calculator" data-toggle="tooltip" data-placement="top" title="CALCULAR"></i></button>
                    </div>
                   
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="number" class="form-control" id="kmc" name="kmc" placeholder="Kilometraje de carga" data-toggle="tooltip" data-placement="top" title="KM CARGA">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="number" class="form-control" id="preciovslts" name="preciovslts" placeholder="Precio vs Litros" data-toggle="tooltip" data-placement="top" title="COSTO X LITRO" readonly>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="number" class="form-control" id="kma" name="kma" placeholder="Kilometraje Anterior" data-toggle="tooltip" data-placement="top" title="KM ANTERIOR" readonly>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="number" class="form-control" id="kmr" name="kmr" placeholder="Kilometros recorridos" data-toggle="tooltip" data-placement="top" title="KM RECORRIDOS" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control" id="rendimiento" name="rendimiento" placeholder="Rendimiento" data-toggle="tooltip" data-placement="top" title="RENDIMIENTO" readonly>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <select select id="pago" name="pago" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true" data-toggle="tooltip" data-placement="top" title="PAGO">
                                <?php
                                $sql="SELECT * FROM Tipo_pago";
                                $conn = mysqli_connect($servername, $username, $password, $database);
                                $datos= mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_object($datos)) {
                            ?> 
                                <option value="<?php echo $row->id_pago;?>"> <?php echo $row->pago;?> </option>
                            <?php  } mysqli_close($conn);
                            ?>  </select> 
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" data-toggle="tooltip" data-placement="top" title="OBSERVACIONES">
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox" name="checkbox">
                            <label class="form-check-label" for="defaultCheck1">
                                Carga
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <select select id="Szona" name="Szona" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true">
                                <?php
                                $sql="SELECT * FROM Zona";
                                $conn = mysqli_connect($servername, $username, $password, $database);
                                $datos= mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_object($datos)) {
                            ?> 
                                <option value="<?php echo $row->id_zona;?>"> <?php echo $row->zona;?> </option>
                            <?php  } mysqli_close($conn);
                            ?>  </select> 
                    </div>
                </div>
                <div class="form-group row">

                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0" id="res"></div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <button type="btnGuardar" class="btn btn-info" id="termina" name="termina">Guardar</button>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <button type="btnGuardar" class="btn btn-warning" id="con" name="con">Consultas</button>
                    </div>
                    <div id="response" class="col-sm-2 mb-3 mb-sm-0"></div>
                </div>
                
                </div>
            </div>
        </div>
            <div class="col-xl-12 col-lg-5">
                <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 border-bottom-danger">                         
            </div>
                    <div class="card-body">
                    <!-- TABLA VISIBLE-->
                        <div class="table-responsive" id="table"></div>
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
                <h5>Editar <label for="recipient-name" class="col-form-label" id ="Meco"></label></h5> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
    </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Fecha:</label>
                    <input type="date" class="form-control" id="Mfecha">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Litros:</label>
                    <input type="number" class="form-control" id="Mlts">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Precio Litros:</label>
                    <input type="number" class="form-control" id="MPlts">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Importe:</label>
                    <input type="number" class="form-control" id="Mimporte">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">KM Carga:</label>
                    <input type="number" class="form-control" id="Mkmc">
                </div>
                <div class="form-group" id="invisible">
                    <label for="recipient-name" class="col-form-label">KM Anterior:</label>
                    <input type="number" class="form-control" id="Mkma">
                </div>
                <div class="form-group" id="invisible">
                    <label for="recipient-name" class="col-form-label">KM Recorrido:</label>
                    <input type="number" class="form-control" id="Mkmr">
                </div>
                <div class="form-group" id="invisible">
                    <label for="recipient-name" class="col-form-label">Rendimiento:</label>
                    <input type="number" class="form-control" id="Mrendimiento">
                </div>
                <div class="form-group">
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="Mcheckbox" name="Mcheckbox">
                            <label class="form-check-label" for="defaultCheck1">
                                Cambiar pago
                            </label>
                    </div>
                    <select select id="Mpago" name="Mpago" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true" data-toggle="tooltip" data-placement="top" title="PAGO">
                            <?php
                                $sql="SELECT * FROM Tipo_pago where pago <> ''";
                                $conn = mysqli_connect($servername, $username, $password, $database);
                                $datos= mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_object($datos)) {
                            ?> 
                                <option value="<?php echo $row->id_pago;?>"> <?php echo $row->pago;?> </option>
                            <?php  } mysqli_close($conn);
                            ?>  </select> 
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Observaciones:</label>
                    <input type="text" class="form-control" id="Mobservaciones">
                </div>
            </form>
        </div>
            <div class="modal-footer">
            <span id="Midgas"></span>
            <button class="btn btn-danger" id="Meliminar">Eliminar</button>
            <button class="btn btn-success" id="Mguardar">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!--FIn Modal-->

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
<!-- Sripts -->
<script type = "text/JavaScript">
    $(document).ready(function() {
        zona();
        kms();
        hoy();
        $('select[name="Szona"]').hide();
        $('select[name="Mpago"]').hide();
    //Listos();
    });

    $('#calcula').click(function(){
        Calcula();
    });

    $('#unidad').change(function(){
        zona();
        kms();
    });

    $('#termina').click(function(){
        termina();
        //gg();
    });

    $('#fecha').change(function () {
        hoy();
    });

    $('#Mguardar').click(function () {
        Updates();
    })

    $('#Meliminar').click(function () {
        Elimina();
    })

    $('#con').click(function () {
        window.location='/sisgac/con_cargas.php';
    });

    $('input[name="checkbox"]').on('click', function(){
        if ( $(this).prop('checked') ) {
        $('select[name="Szona"]').fadeIn();
        } 
        else {
        $('select[name="Szona"]').hide();
        }
    });

    $('input[name="Mcheckbox"]').on('click', function(){
        if ( $(this).prop('checked') ) {
        $('select[name="Mpago"]').fadeIn();
        } 
        else {
        $('select[name="Mpago"]').hide();
        }
    });

    function Listos(){
        Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        );
    }

    function zona(){
        $.ajax({
            type:"POST",
            url:"ajax/zona.php",
            data:"Eco=" + $('#unidad').val(),
			success:function(r){
				//$('#res').html(r);
                //$("#zona option[value='"+ r +"']").attr("selected",true);
                $("#zona").val(r);
			}
        });
    }

    function kms(){
        $.ajax({
            type:"POST",
            url:"ajax/kms.php",
            data:"Eco=" + $('#unidad').val(),
			success:function(r){
                var re = JSON.parse(r);
                $('#kma').val(re.km_carga);
			}
        });
    }

    function Calcula(){
        var litros = $('#litros').val();
        var importe = $('#importe').val();
        var kmc= $('#kmc').val();
        var kma= $('#kma').val();
        if (litros ==0 || importe == 0 || kmc==0) {
            Swal.fire({
            title: '',
            text: "Llena los campos",
            icon: 'warning'
            })
        }else {
            var kmvslts= importe/litros;
            var kmr=kmc-kma;
            var rendimiento= kmr/litros;
            $('#preciovslts').val(kmvslts.toFixed(2));
            $('#kmr').val(kmr.toFixed(2));
            $('#rendimiento').val(rendimiento.toFixed(2));
        }
    }

    function termina() {
        if($('#rendimiento').val()==''){
            Swal.fire({
                title: '',
                text: "Llena los campos",
                icon: 'warning'
                });
        }else {
            if ($('#pago').val() == 1){
                //alert("vacio")
                Swal.fire({
                title: '',
                text: "Selecciona el pago",
                icon: 'warning'
                });
            }else{
                //alert("no vacio")
                if ( $('#checkbox').prop('checked') ) {
                //alert("check");
                $.ajax({
                    type:"POST",
                    url:"ajax/termina.php",
                        data:{
                            eco:$("#unidad").val(),
                            fecha:$("#fecha").val(),
                            litros:$("#litros").val(),
                            p_litro:$("#preciovslts").val(),
                            p_carga:$("#importe").val(),
                            km_carga:$("#kmc").val(),
                            km_anterior:$("#kma").val(),
                            km_reco:$("#kmr").val(),
                            rendimiento:$("#rendimiento").val(),
                            region:$("#Szona option:selected").text(),
                            forma_pago:$("#pago option:selected").text(),
                            observacion:$("#observaciones").val()
                            }, 
                            success:function(data)  
                            {  
                            $('#response').html(data); 
                            }
                    });
                } 
                else {
                //alert("no check");
                    $.ajax({
                    type:"POST",
                    url:"ajax/termina.php",
                        data:{
                            eco:$("#unidad").val(),
                            fecha:$("#fecha").val(),
                            litros:$("#litros").val(),
                            p_litro:$("#preciovslts").val(),
                            p_carga:$("#importe").val(),
                            km_carga:$("#kmc").val(),
                            km_anterior:$("#kma").val(),
                            km_reco:$("#kmr").val(),
                            rendimiento:$("#rendimiento").val(),
                            region:$("#zona").val(),
                            forma_pago:$("#pago option:selected").text(),
                            observacion:$("#observaciones").val()
                            }, 
                            success:function(data)  
                            {  
                            $('#response').html(data); 
                            }
                    });
                }
            }
        }
    }

    function hoy() {
        $.ajax({
            type:"POST",
            url:"ajax/cargas.php",
            data:{
                fecha:$("#fecha").val()
                }, 
            success:function(data)  
        {
            $('#table').html(data);
        }
        });
    }

    function showEdit(clicked_id){
       //alert("id "+clicked_id); 
        $.ajax({
                type:"POST",
                url:"ajax/detalles.php",
                data:{clave:clicked_id}, 
                        success:function(data)  
                        {  
                            var resultado = JSON.parse(data);
                            //$('#response').html(data);
                            $("#Meco").text(resultado.unidad);
                            $("#Mfecha").val(resultado.fecha);
                            $("#Mlts").val(resultado.litros);
                            $("#MPlts").val(resultado.p_litro);
                            $("#Mimporte").val(resultado.p_carga);
                            $("#Mkmc").val(resultado.km_carga);
                            $("#Mkma").val(resultado.km_anterior);
                            $("#Mkmr").val(resultado.km_reco);
                            $("#Mrendimiento").val(resultado.rendimiento);
                            $("#Mobservaciones").val(resultado.observacion);
                            $("#Midgas").text(resultado.id_gas);
                        }  
        });
    }

    function Updates() {
        var Mlitros = $("#Mlts").val();
        var Mimporte = $("#Mimporte").val();
        var Mkmc= $("#Mkmc").val();
        var Mkma=$("#Mkma").val();
        var Mkmvslts= Mimporte/Mlitros;
        var Mkmr= Mkmc-Mkma;
        var Mrendimiento = Mkmr/Mlitros;
        $("#MPlts").val(Mkmvslts.toFixed(2));
        $("#Mkmr").val(Mkmr.toFixed(2));
        $("#Mrendimiento").val(Mrendimiento.toFixed(2));
        //alert("Mcarga");
        if ( $('#Mcheckbox').prop('checked') ) {
            //alert("check"+  $('#Mpago option:selected').text());
            $.ajax({
                type:"POST",
                url:"ajax/actualiza.php",
                data:{check:"1",
                    Fecha:$("#Mfecha").val(),
                    Lts:$("#Mlts").val(),
                    Plts:$("#MPlts").val(),
                    Importe:$("#Mimporte").val(),
                    Kmc:$("#Mkmc").val(),
                    Kma: $("#Mkma").val(),
                    Kmr:$("#Mkmr").val(),
                    Rendimiento:$("#Mrendimiento").val(),
                    Observa:$("#Mobservaciones").val(),
                    Idgas:$("#Midgas").text(),
                    Pago:$('#Mpago option:selected').text()
                }, 
                        success:function(data)  
                        {  
                            $('#response').html(data);
                        }  
                });
        }else{
            //alert("no check");
            $.ajax({
                type:"POST",
                url:"ajax/actualiza.php",
                data:{check:"0",
                    Fecha:$("#Mfecha").val(),
                    Lts:$("#Mlts").val(),
                    Plts:$("#MPlts").val(),
                    Importe:$("#Mimporte").val(),
                    Kmc:$("#Mkmc").val(),
                    Kma: $("#Mkma").val(),
                    Kmr:$("#Mkmr").val(),
                    Rendimiento:$("#Mrendimiento").val(),
                    Observa:$("#Mobservaciones").val(),
                    Idgas:$("#Midgas").text()
                }, 
                        success:function(data)  
                        {  
                            $('#response').html(data);
                        }  
                });
        }
    }

    function Elimina(){
        //alert($('#Midgas').text());
        $.ajax({
                type:"POST",
                url:"ajax/drop.php",
                data:{clave:$('#Midgas').text()}, 
                        success:function(data)  
                        {
                            $('#response').html(data);
                        }  
        });
    }

</script>

<!-- end scripts -->
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