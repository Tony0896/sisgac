<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consultas</title>
       <!-- ICONO-->
       <link rel="icon" href="assets/ico.ico">
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
    <script src="js/tableToExcel.js"></script>
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
    padding: 10px 15px;
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
#dataTable{
    display: none;
}
</style>
</head>
<?php
//if($_GET['pagina']>$paginas or $_GET['pagina']<=0){
  //  header('Location:index.php?pagina=1');
//}
//echo $iniciar;
?>
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
}
?>
<?php
        $servername = "207.210.228.84";
        $database = "grupoair_db1";
        $username = "grupoair_userdb1";
        $password = "grupoair_orlando";
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
        <h1 class="h3 mb-0 text-gray-900">Consultas</h1>
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

<div class="col-xl-12 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="col mr-2">
                <div class="row no-gutters align-items-center">

                    <div class="align-items-center">
                        <div class="col mr-2">
                        <?php $timezone  = -6; $dia= gmdate('Y-m-d', time() + 3600*($timezone+date("I"))); ?>
                        <input type="date" id="inicio" name="requisicion" value="<?php echo $dia; ?>">
                        <?php //echo $dia; ?>
                        &nbsp;&nbsp;&nbsp;
                        <input type="date" id="fin" name="requisicion" value="<?php echo $dia; ?>">
                        &nbsp;&nbsp;&nbsp;
                        <select select id="lista1" name="lista1" class="selectpicker" data-show-subtext="true" data-live-search="true">
                            <?php
                                $sql="SELECT * FROM Zona";
                                $conn = mysqli_connect($servername, $username, $password, $database);
                                $datos= mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_object($datos)){
                            ?>
                                <option value="<?php echo $row->id_zona;?>"> <?php echo $row->zona;?> </option>
                            <?php  } mysqli_close($conn);?> 
                            <option value="98">Todo</option>
                        </select> 
                        &nbsp;&nbsp;&nbsp;
                        <select select id="opcion" name="opcion" class="selectpicker" data-show-subtext="true" data-live-search="true">
                        <option value="1">Depósitos</option>
                        <option value="2">Facturas</option>
                        <option value="3">Todo</option> </select> 
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" id="btn2" value="Consultar" class="btn btn-success" name="Consultar">
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" class="btn btn-success" id="btn1" onclick="tableToExcel('table', 'Reporte')" value="Exportar">
                </div>  

                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>  
<!-- Donut Chart -->
<div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 border-bottom-primary">                         
                                </div>
                                <div class="card-body">
                                    <!-- TABLA VISIBLE-->
                                <div class="table-responsive" id="table">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    
                                    <!-- table-->
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ENTIDAD</th>
                                            <th>NOMBRE</th>
                                            <th>MONTO</th>
                                            <th>DESCRIPCION</th>
                                            <th>FECHA</th>
                                            <th>TIPO</th>
                                            <th>FACTURA</th>
                                            <th>EDITAR</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql="SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo FROM Zona, depositos WHERE Zona.id_zona=entidad AND fecha = $dia order by fecha ASC";
                                    $conn = mysqli_connect($servername, $username, $password, $database);
                                    $datos= mysqli_query($conn, $sql);
                                    $sql="SELECT id_oper, Zona.zona, nombre, monto, descripcion, fecha, tipo FROM Zona, depositos WHERE Zona.id_zona=entidad AND fecha = $dia order by fecha ASC";
                                        $datos1=mysqli_query($conn,$sql);  
                                        while($row = mysqli_fetch_object($datos1)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row->id_oper; ?></td>
                                            <td><?php echo $row->zona; ?></td>
                                            <td><?php echo $row->nombre; ?></td>
                                            <td><?php echo $row->monto; ?></td>
                                            <td><?php echo $row->descripcion;?></td>
                                            <td><?php echo $row->fecha; ?></td>
                                            <td><?php echo $row->tipo; ?></td>
                                            <td><?php echo $row->factura;
                                            echo '<td>  
                                            <button type="button" class="btn btn-danger btn-circle" 
                                            data-toggle="modal" 
                                            data-target="#exampleModal" 
                                            data-whatever="@getbootstrap" id="'.$row->id_oper.'" 
                                            onclick="showEdit(this.id)">
                                            <i class="fas fa-pencil-alt text-white-600"></i>
                                            </button>
                                            </td>';  }  
                                            //echo $paginas;
                                        mysqli_close($conn);
                                            ?></td>
                        </tr>
                </tbody> 
            </table> 
<!-- TABLA VISIBLE-->

<script type="text/javascript"> 
    $('#btn2').click(consulta);
    function consulta(){
       // alert($('#inicio').val()+$('#fin').val()); 
        $.ajax({
                type:"POST",
                url:"consultas1.php",
                data:{inicio:$('#inicio').val(),
                    fin:$('#fin').val(),
                    opcion:$('#opcion').val(),
                    entidad:$('#lista1').val()}, 
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
                url:"detalles.php",
                data:{clave:clicked_id}, 
                        success:function(data)  
                        {  
                            var resultado = JSON.parse(data);
                            $("#colaborador1").text(resultado.id_oper);
                            $("#lista11").val(resultado.entidad);
                            $("#lista2").val(resultado.nombre);
                            //$('#lista2 option[value="' + resultado.nombre + '"]').prop('selected', true);
                            //$("#lista2").find('option[value="' + resultado.nombre + '"]').attr("selected", true);
                            $("#monto").val(resultado.monto);
                            $("#fecha").val(resultado.fecha);
                            $("#descripcion").val(resultado.descripcion);
                            $("#lista3").val(resultado.tipo);
                            $("#lista4").val(resultado.factura);
                            //$("#colaborador1").text(resultado.nombre);
                        }  
        });
    }
    </script>
<div id="res"></div>
        </div>
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
            <label for="recipient-name" class="col-form-label"> Zona: </label>
            <select select id="lista11" name="lista11" class="selectpicker" data-show-subtext="true" data-live-search="true">
                            <?php
                                $sql="SELECT * FROM Zona";
                                $conn = mysqli_connect($servername, $username, $password, $database);
                                $datos= mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_object($datos)) {
                            ?> 
                                <option value="<?php echo $row->id_zona;?>"> <?php echo $row->zona;?> </option>
                            <?php  } mysqli_close($conn);
                            
                            ?>
                            </select> 
                            <br>
            <label for="recipient-name" class="col-form-label"> Colaborador: </label>
            <div id= "listacol">
            <select select id="lista2" name="lista3" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true">
            <?php
                        $sql="SELECT * FROM Colaborador WHERE status = 'A'";
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        $datos= mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_object($datos)) {
                    ?> 
                        <option value="<?php echo $row->nombre;?>"> <?php echo $row->nombre;?> </option>
                    <?php  } mysqli_close($conn);
                    
                    ?>
        </select> 
                            <br>
            </div>
            <label for="recipient-name" class="col-form-label">Monto:</label>
            <input type="number" class="form-control" id="monto">
            <label for="recipient-name" class="col-form-label">Descripción:</label>
            <input class="form-control" id="descripcion">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="date" class="form-control" id="fecha">
            <label for="recipient-name" class="col-form-label">Tipo:</label>
            <br>
            <select select id="lista3" name="lista3" class="selectpicker" class="form-control" data-show-subtext="true" data-live-search="true">
            <option value="deposito">Depósito</option>
            <option value="factura">Facturación</option></select> 
            <br>
            <label for="recipient-name" class="col-form-label">Factura:</label>
            <br>
            <select select id="lista4" name="lista4" class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option value="0">Tipo</option>
            <option value="con factura">Con factura</option>
            <option value="sin factura">Sin factura</option></select> 
          </div>

        </form>
      </div>
      <div class="modal-footer">
      <span id="colaborador1"></span>
      <span id="descri"></span>
      <div id="resultado1"></div>
        <button type="btnGuardar" class="btn btn-success" id="Guarda" onclick="Edit(this.id)">Guardar</button>
        <button type="btnEliminar" class="btn btn-danger" id="Elimina" onclick="Elimina(this.id)">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!--FIn Modal-->
                        <!-- END Donut Chart -->
</div><!-- End row -->
<script> 
    function Edit(clicked_id){
       //alert("id "+clicked_id+$('#monto').val()+$('#colaborador1').text()+$('#lista3').val()+$('#fecha').val()+$('#descripcion').val()+$('#lista4').val()); 
        $.ajax({
            type:"POST",
                url:"updates.php",
                data:{
                    entidad:$("#lista11").val(),
                    nombre:$("#lista2").val(),
                    monto:$('#monto').val(),
                    clave:$('#colaborador1').text(),
                    tipo:$('#lista3').val(),
                    fecha:$('#fecha').val(),
                    Des:$('#descripcion').val(),
                    fac:$('#lista4').val()
                },
                success:function(data)  
                        {  
                            $('#resultado1').html(data); 
                        }  
                   // consulta();
                });
                
    }
    function Elimina(clicked_id){
      // alert("id "+clicked_id); 
        $.ajax({
            type:"POST",
                url:"drop.php",
                data:{
                    clave:$('#colaborador1').text()
                },
                success:function(data)  
                        {  
                            $('#resultado1').html(data); 
                        }  
                });
    }
    
    $('#lista11').change(function(){
			listcol();
		});
        function listcol(){
            //alert("a"+$('#unida').val());
            $.ajax({
                    type:"POST",
                    url:"datis.php",
                    data:{
                        Entidad:$('#lista11').val()},
                        success:function(data)  
                        {  
                            $('#listacol').html(data); 
                        }  
                });
        }
    </script>

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

    <!-- Page level custom scripts -->
     <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
</body>
</html>


</div></div>
