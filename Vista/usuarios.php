<?php
session_start();

require('../config/constants.php');
require('../Modelo/sesion.class.php');

$sesion = new sesion();

if (!$sesion->validar()) {
    // header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php?error=2');
    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/Vista/login.php?error=2" </script>';
    exit;
}


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
    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/Vista/index.php" </script>';
}

?>

<?php require_once 'layout/head.php'; ?>


<script>
    $(document).ready(function(){
        $('#tablaUsuarios').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        }),
        $(".modificar").click(handlerClickEditButton);   

            
        function handlerClickEditButton(e) {
            e.preventDefault();
            window.scroll(0, window.outerHeight);
            $.ajax({
                type: "GET",
                url: "../Controlador/ajax/datosUsuario.php?idUsuario=" + this.id,
                success: function (data) {
                //alert(data);
                var result = $.parseJSON(data);
                $("#idUsuario").val(result.idUsuario);
                $("#nombre").val(result.nombre);
                $("#perfil").val(result.perfil);
                $("#accion").val("modificar");
                },
            });
        }       
    });
</script>
  

<section id="container">
    <?php require_once 'layout/header.php'; ?>
    <?php require_once 'layout/sidebar.php'; ?>
    <section id="main-content">

        <section class="wrapper">
    
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
        echo "<td style='padding-left: 5px;'><a href='#' class='modificar' id='" . $value['idUsuario'] . "'><img src='assets/img/edit.ico' width='40'></a></td>";
        echo "<td style='padding-left: 5px;'><a href='../Controlador/usuario.php?accion=eliminar&idUsuario=" . $value['idUsuario'] . "'><img src='assets/img/delete.png' width='40'></a></td>";
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
<!-- container section start -->

<!-- javascripts -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/crudusuarios2.js"></script>


<?php require_once 'layout/footer.php'; ?>