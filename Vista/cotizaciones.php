<?php

session_start();

require('../Modelo/sesion.class.php');
$sesion = new sesion();
if (!$sesion->validar()) {
    // header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php?error=2');
    echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/index.php?error=2" </script>';
    exit;
}

else {


    require('../Modelo/Conexion.php');
    $db = new Conexion();
    $db->conn();

    require('../Modelo/usuario.class.php');
    $usuario = new usuario();
    $data = $usuario->obtenerArchivos();

    $users = $usuario->obtenerUsuarios();

    $user = $_SESSION['usuario'];

    $perfil = $usuario->getUserProfile($user);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/Waterfalls-Scenery-Wallpaper-1.jpg">

    <title>Sistema Cotizaciones</title>


    <!-- Bootstrap W3Schools -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- DT -->
    <!-- ✅ Load CSS file for DataTables  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
        integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- ✅ load jQuery ✅ -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <!-- ✅ load DataTables ✅ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    $(document).ready(function() {
        var table = $('#tablaAbogados').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
        media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/xcharts.min.css" rel=" stylesheet">

</head>

<body>
    <!-- container section start -->
    <section id="container" class="">


        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                        class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">SISTEMA <span class="lite">COTIZACIONES</span></a>
            <div class="col-md-2" style="left: 10px;margin-top: 8px;">
                <h4>Bienvenido <?php echo $user; ?></h4>
            </div>
            <button type="button" class="btn btn-primary" style="margin-left: 980px;margin-top: 12px;"><a
                    href="../Controlador/cerrarSesion.php?<?php echo SID; ?>" style="color: white;">Cerrar
                    Sesión</a></button>
            <!--logo end-->
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a class="" href="index.php">
                            <i class="icon_house_alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="fa fa-users"></i>
                            <span>Cotizaciones</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="cotizaciones.php">Consultar Cotizaciones</a></li>

                        </ul>
                    </li>
                    <?php if ($perfil == 'Administrador'): ?>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="fa fa-users"></i>
                                <span>Usuarios</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="usuarios.php">CRUD Usuarios</a></li>
                                <!--  <li><a class="" href="consultarusuarios.php">Consultar Usuarios</a></li>  -->
                            </ul>
                        </li> 
                    <?php endif; ?>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row" id="breadcrumb-container">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Dashboard</li>
                        </ol>
                    </div>
                </div>

                <?php


include '../Vista/config.php';

if (isset($_POST['submit'])) {

    if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {

        // creamos las variables para subir a la db
        $ruta = "upload/";
        $nombrefinal = trim($_FILES['fichero']['name']); //Eliminamos los espacios en blanco
        // $nombrefinal= preg_replace (" ", "", $nombrefinal);//Sustituye una expresión regular
        $upload = $ruta . $nombrefinal;

        if (move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion 

            echo "<b>Upload exitoso!. Datos:</b><br>";
            echo "Nombre: <i><a href=\"" . $ruta . $nombrefinal . "\">" . $_FILES['fichero']['name'] . "</a></i><br>";
            echo "Tipo MIME: <i>" . $_FILES['fichero']['type'] . "</i><br>";
            echo "Peso: <i>" . $_FILES['fichero']['size'] . " bytes</i><br>";
            echo "<br><hr><br>";

            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $description = $_POST['descripcion'];

            $var_consulta = "select * from archivos";
            $var_resultado = $obj_conexion->query($var_consulta);

            $query = "INSERT INTO archivos (name,fecha,description,ruta,tipo,size) VALUES ('$nombre','$fecha','$description','" . $nombrefinal . "','" . $_FILES['fichero']['type'] . "','" . $_FILES['fichero']['size'] . "')";

            mysqli_query($obj_conexion, $query) or die(mysqli_error());
            echo "El archivo '" . $nombrefinal . "' se ha subido con éxito <br>";
        }


    }
}


?>

                <table id="tablaAbogados" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="padding-left: 5px;">Id</th>
                            <th style="padding-left: 5px;">Usuario</th>
                            <th style="padding-left: 5px;">Fecha</th>
                            <th style="padding-left: 5px;">Descripcion</th>
                            <th style="padding-left: 5px;">Archivo</th>
                            <th style="padding-left: 5px;">Tipo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
foreach ($data as $value) {
    echo "<tr>";
    echo "<td style='padding-left: 5px;'>" . $value['id'] . "</td>";
    echo "<td style='padding-left: 5px;'>" . $value['name'] . "</td>";
    echo "<td style='padding-left: 5px;'>" . $value['fecha'] . "</td>";
    echo "<td style='padding-left: 5px;'>" . $value['description'] . "</td>";
    echo "<td style='padding-left: 5px;'><a href='archive.php?id=" . $value['id'] . "' target='_blank'>" . $value['ruta'] . "</a></td>";
    echo "<td style='padding-left: 5px;'>" . $value['tipo'] . "</td>";
    echo "</tr>";
   // echo "";
}
?>
                    </tbody>
                </table>

                </div>
                <div class="row mt-5" id="form-container">
                    <div class="col-md-10">

                        <form action="" method="POST" enctype="multipart/form-data" id="quote-form">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nombre">Usuario</label>
                                    <select class="form-control" id="nombre"
                                        name="nombre" required>
                                        <?php foreach ($users as $user): ?>
                                            
                                            <option><?=$user['nombre']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fichero">Seleccion archivo:</label>
                                    <input class="form-control" id="fichero" name="fichero" type="file" size="150"
                                        maxlength="150" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">

                                    <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <div class="text-right">
            </div>
        </section>
        <!--main content end-->
    </section>
    <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery-ui-1.10.4.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js"></script>
    <!-- jQuery full calendar -->
    <script src="js/fullcalendar.min.js">
    </script> <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/endpoints.js"></script>
    <script src="js/quoteForm.js"></script>


    <script>
    //knob
    $(function() {
        $(".knob").knob({
            'draw': function() {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
    </script>

</body>

</html>