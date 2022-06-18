
<?php require_once 'layout/head.php'; ?>

<?php

require('../models/cotizacion.class.php');
$cotizacion = new cotizacion();
$data = $cotizacion->obtenerCotizaciones();

$users = $usuario->obtenerUsuarios();

?>

    <!-- container section start -->
    <section id="container" class="">


        <?php require_once 'layout/header.php'; ?>

        <!--sidebar start-->
       <?php require_once 'layout/sidebar.php'; ?>

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
           
                <?php require_once 'includes/quotesTable.php'; ?>
                </div>
                <div class="row mt-5" id="form-container">
                <div class="col-md-10" style="margin-left: 34px;margin-top: 10px;width: 930px;">
                <form class="form-inline" action="../Controlador/cotizacion.php" method="POST" id="user-form">
                    <input type="hidden" name="accion" id="accion" value="agregar">
                    <input type="hidden" name="idCotizacion" id="idCotizacion" value="">
                    <div class="form-group">
                        <label for="nombre">Empresa:</label>
                        <input type="text" class="form-control" id="empresa" name="empresa" required="">
                    </div><br><br>
                    <div class="form-group">
                        <label for="pwd">ID Cotizacion:</label>
                        <input type="text" class="form-control" id="idCotizacion2" name="idCotizacion2">
                    </div><br><br>
                    <div class="form-group">
                                    <label for="fecha">Fecha inicio</label>
                                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                                </div><br><br>
                    <div class="form-group">
                                    <label for="fecha">Fecha termino</label>
                                    <input type="date" class="form-control" id="fechaTermino" name="fechaTermino" required>
                                </div><br><br>
                     <div class="form-group">
                        <label for="pwd">Insumos:</label>
                        <input type="text" class="form-control" id="insumos" name="insumos">
                    </div><br><br>
                     <div class="form-group col-md-12" style="padding-left: 0px;">
                                    <label for="descripcion">Comentarios</label>
                                    <textarea name="comentarios" id="comentarios" class="form-control"
                                        required></textarea>
                                </div><br><br>
                    <!-- <div class="form-group">
                                    <label for="fecha">Fecha en que se oferto</label>
                                    <input type="date" class="form-control" id="fechaOferto" name="fechaOferto" required>
                                </div><br><br>      -->              
                      <div class="form-group">
                        <label for="pwd">Cantidad:</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad">
                    </div><br><br>
                    <div class="form-group">
                        <label for="pwd">Valor unitario:</label>
                        <input type="text" class="form-control" id="valorUnitario" name="valorUnitario">
                    </div><br><br>
                     <div class="form-group">
                        <label for="pwd">Porcentaje:</label>
                        <input type="text" class="form-control" id="porcentaje" name="porcentaje">
                    </div><br><br>
                     <div class="form-group">
                        <label for="pwd">Despacho:</label>
                        <input type="text" class="form-control" id="despacho" name="despacho">
                    </div><br><br>
                    <button type="submit" id="btn-submit" class="btn btn-success" style="margin-top: 0px;">Agregar</button>
                </form>
            </div>
            </section>
            <div class="text-right">
            </div>
        </section>
        <!--main content end-->
    </section>
    <!-- container section start -->

    <!-- javascripts -->
    <script src="assets/js/quotesCRUD.js"></script>
<?php require_once 'layout/footer.php'; ?>