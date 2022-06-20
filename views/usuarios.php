<?php

$usuario = new User();

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


!Utils::isAdmin($usuario->getUserProfile($_SESSION['usuario'])) ?Utils::goDashBoard() : false;

?>

<section id="container">
    <?php require_once 'views/layout/header.php'; ?>
    <?php require_once 'views/layout/sidebar.php'; ?>
    <section id="main-content">

        <section class="wrapper">

            <!--overview start-->
            <div class="row" style="height: 0px;width: 200px;">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Users Table -->
                    <?php require_once 'includes/usersTable.php'; ?>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" style="height: 0px;width: 800px;">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="margin-left: 34px;margin-top: 10px;width: 930px;">
                    <form class="form-inline" action="../controllers/UserController.php" method="POST" id="user-form">
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
                        <button type="submit" id="btn-submit" class="btn btn-success"
                            style="margin-top: 0px;">Agregar</button>

                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </section>
    </section>

</section>
<!--main content end-->
</section>

<!-- javascripts -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url?>/views/assets/js/custom/endpoints.js"></script>
<script src="<?=base_url?>/views/assets/js/custom/usersCrud.js"></script>