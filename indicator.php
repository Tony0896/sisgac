<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Indicador</title>
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
        body{
            /* background-color: #24292e; */
        }
        #meter5 {
        width:100%;
        height:25px;
    }
    #meter5::-webkit-meter-bar {
            /* Gryay */
        background: #eaecf4;
    }
    #meter5::-webkit-meter-optimum-value {
         /* VErde */
        /*background: #28a745;*/
        background:#14C14A
    }

    #meter5::-webkit-meter-suboptimum-value {
         /* yeloow */
        background: #ffc107;
    }
    </style>
</head>
<body>
    
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <h1 class="h3 mb-0 text-gray-900">Indicador <?php $timezone  = -6; $dia= gmdate('Y-m-d', time() + 3600*($timezone+date("I")));?></h1>
    </nav>
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="row">
    
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold text-primary">Asistencia</h6>
                    </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                            <meter id="meter5" min="0" max="21" low="1" high="18" optimum="21" value="19" ></meter>
                            </div>
                                <div class="col-4">18 de 21</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold text-primary">Paquetes</h6>
                    </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-9">
                            <meter id="meter5" min="0" max="2000" low="1" high="1000" optimum="2000" value="999" ></meter>
                            </div>
                                <div class="col-3">900 de 2000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h6 class="m-0 font-weight-bold text-primary">Visitas</h6>
                    </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                            <meter id="meter5" min="0" max="300" low="1" high="150" optimum="300" value="100" ></meter>
                            </div>
                                <div class="col-4">100 de 300</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <!-- Page Heading -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="table-responsive-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                            <th scope="row">DILAN</th>
                            <td>PREVENCION-1</td>
                            </tr>
                            <tr>
                            <th scope="row">ALEJANDRO</th>
                            <td>GDLR-3</td>
                            </tr>
                            <tr>
                            <th scope="row">ENRIQUE</th>
                            <td>MERIDA-1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">RUTA</th>
                        <th scope="col">RECOLECCION</th>
                        <th scope="col">ENTREGA</th>
                        <th scope="col">TRASPASO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">TRES CANCUN</th>
                        <td>20</td>
                        <td>10</td>
                        <td>5</td>
                        </tr>
                        <tr>
                        <th scope="row">VILLAHERMOSA</th>
                        <td>50</td>
                        <td>49</td>
                        <td>0</td>
                        </tr>
                        <tr>
                        <th scope="row">HERMOSILLO</th>
                        <td>1</td>
                        <td>1</td>
                        <td>10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-5">UNO</div>
                            <div class="col-4">
                            <meter id="meter5" min="0" max="21" low="1" high="18" optimum="21" value="18" ></meter>
                </div>
                        <div class="col-3">10 de 10</div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-5">DOS</div>
                            <div class="col-4">
                            <meter id="meter5" min="0" max="21" low="1" high="18" optimum="21" value="18" ></meter>
                </div>
                        <div class="col-3">10 de 10</div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-5">TRES</div>
                            <div class="col-4">
                            <meter id="meter5" min="0" max="21" low="1" high="18" optimum="21" value="18" ></meter>
                </div>
                        <div class="col-3">10 de 10</div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-5">CUATRO</div>
                            <div class="col-4">
                                <meter id="meter5" min="0" max="21" low="1" high="18" optimum="21" value="18" ></meter>
                            </div>
                        <div class="col-3">10 de 10</div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-5">HERMOSILLO</div>
                            <div class="col-4">
                            <meter id="meter5" min="0" max="21" low="1" high="17" optimum="21" value="16" ></meter>
                            </div>
                        <div class="col-3">12 de 12</div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-5">VILLAHERMOSA</div>
                            <div class="col-4">
                                <meter id="meter5" min="0" max="21" low="1" high="18" optimum="21" value="18" ></meter>
                            </div>
                        <div class="col-3">12 de 12</div>
                    </div>
                </div>
                
            </div>
        </div>
</div>

</div>

</div>

<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> Grupo Air Cond 2021 ®</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- Core plugin JavaScript-->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/js.js"></script>

</body>
</html>