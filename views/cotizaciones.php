<?php

$usuario = new User();

$data = $usuario->obtenerArchivos();

$users = $usuario->obtenerUsuarios();

?>

<!-- container section start -->
<section id="container" class="">

    <?php require_once 'layout/header.php' ?>

    <!--sidebar start-->
    <?php require_once 'layout/sidebar.php'; ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row" id="breadcrumb-container">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?=base_url?>">Home</a></li>
                        <li><i class="fa fa-laptop"></i><a href="<?=base_url?>/Quote/showQuotes">Consultar
                                Cotizaciones</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <?php require_once 'includes/lawyersTable.php'; ?>
                </div>
            </div>
            </div>
            <div class="row mt-5" id="form-container">
                <div class="col-md-5">

                    <form action="" method="POST" enctype="multipart/form-data" id="quote-form">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Usuario</label>
                                <select class="form-control" id="nombre" name="nombre" required>
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
                                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
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
</section>

<!-- javascripts -->

<script>
$(document).ready(function() {
    $('#tablaAbogados').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    })

});
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url?>/views/assets/js/custom/endpoints.js"></script>
<script src="<?=base_url?>/views/assets/js/custom/quoteForm.js"></script>