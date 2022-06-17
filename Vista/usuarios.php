<?php
session_start();
require('../Modelo/sesion.class.php');
$sesion = new sesion();
if (!$sesion->validar()) {
    // header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php?error=2');
    echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php?error=2" </script>';
    exit;
}
else {
    require('../Modelo/Conexion.php');
    $db = new Conexion();
    $db->conn();
    require('../Modelo/usuario.class.php');
    $usuario = new usuario();
    $data = $usuario->obtenerUsuarios();
    $flagAlerta = false;
    
    if (isset($_GET['eliminar']) && $_GET['eliminar'] == 'true') {
        $flagAlerta = true;
        $msg = "<strong>EXITO!</strong> Usuario se ha eliminado";
        $tipoAlerta = "success";
    }
    elseif (isset($_GET['eliminar']) && $_GET['eliminar'] == 'false') {
        $flagAlerta = true;
        $msg = "<strong>ERROR!</strong> No se ha podido eliminar el usuario";
        $tipoAlerta = "danger";
    }
    
    $user = $_SESSION['usuario'];
    $perfil = $usuario->getUserProfile($user);


    // esto hay que dejarlo funcionadno con la funcion que esta arriba 
    if ($perfil != 'Administrador') {
        // header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/index.php');
        echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/index.php" </script>';
    }
    // var_dump($data);
    // var_dump($perfil[0]['perfil']);



?>
    <link rel="shortcut icon" href="img/Waterfalls-Scenery-Wallpaper-1.jpg">
<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                class="icon_menu"></i></div>

    </div>
    

    <!--logo start-->
    <a href="index.php" class="logo">SISTEMA <span class="lite">COTIZACIONES</span></a>
    <div class="col-md-2" style="left: 10px;margin-top: 8px;">
        <h4>Bienvenido <?php echo $user; ?> &nbsp;<?php //echo $perfil; ?></h4>
    </div>
    <button type="button" class="btn btn-primary" style="margin-left: 980px;margin-top: 12px;"><a
            href="../Controlador/cerrarSesion.php?<?php echo SID; ?>" style="color: white;">Cerrar Sesi&oacute;n</a></button>
    <!--logo end-->
</header>
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
                    <!--  <li><a class="" href="consultarusuarios.php">Consultar Usuarios</a></li>  -->
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
<?php include('encab.inc'); ?>
<!--main content start-->
 
<section id="main-content">
    <section class="wrapper">
        <?php
    if ($flagAlerta) { ?>
        <div class="row" style="height: 60px;">
            <div class="alert alert-<?php echo $tipoAlerta; ?> alert-dismissable" style="width: 451.06667px;
        margin-left: 50px;
        border-left-width: 0px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $msg; ?>
            </div>
        </div>
        <?php
    }?>
        <!--overview start-->
        <div class="row" style="height: 0px;width: 200px;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <table id="tablaUsuarios" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="padding-left: 5px;">Id</th>
                            <th style="padding-left: 5px;">Nombre</th>
                            <th style="padding-left: 5px;">Contraseña</th>
                            <th style="padding-left: 5px;">Perfil</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    foreach ($data as $value) {
        echo "<tr>";
        echo "<td style='padding-left: 5px;'>" . $value['idUsuario'] . "</td>";
        echo "<td style='padding-left: 5px;'>" . $value['nombre'] . "</td>";
        echo "<td style='padding-left: 5px;'>" . $value['pwd'] . "</td>";
        echo "<td style='padding-left: 5px;'>" . $value['perfil'] . "</td>";
        echo "<td style='padding-left: 5px;'><a href='#' class='modificar' id='" . $value['idUsuario'] . "'><img src='img/edit.ico' width='40'></a></td>";
        echo "<td style='padding-left: 5px;'><a href='../Controlador/usuario.php?accion=eliminar&idUsuario=" . $value['idUsuario'] . "'><img src='img/delete.png' width='40'></a></td>";
        echo "</tr>";
    }
?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="height: 0px;width: 800px;">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="margin-left: 34px;margin-top: 10px;width: 930px;">
                <form class="form-inline" action="../Controlador/usuario.php" method="POST" id="user-form">
                    <input type="hidden" name="accion" id="accion" value="agregar">
                    <input type="hidden" name="idUsuario" id="idUsuario" value="">
                    <div class="form-group">
                        <label for="nombre">Nickname:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required="">
                    </div><br><br>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="text" class="form-control" id="pwd" name="pwd">
                    </div><br><br>
                    <div class="form-group">
                        <label for="perfil">Perfil:</label>
                        <select class="form-control" id="perfil" name="perfil" required="">
                            
                            <option>Administrador</option>
                            <option>Usuario</option>
                            
                        </select>
                    </div><br><br>
                    <button type="submit" id="btn-submit" class="btn btn-success" style="margin-top: 0px;">Agregar</button>
                    
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<!-- javascripts -->

<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="assets/jquery-knob/js/jquery.knob.js"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js"></script>
<!-- jQuery full calendar -->
<<script src="js/fullcalendar.min.js">
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
    <script src="js/crudusuarios2.js"></script>
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

    <?php
    include('footer.inc');
}
?>