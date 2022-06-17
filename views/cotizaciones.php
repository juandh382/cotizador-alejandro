<?php

session_start();

require('../config/constants.php');
require('../models/sesion.class.php');

$sesion = new sesion();

if (!$sesion->validar()) {
    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/index.php?error=2" </script>';
    exit;
}




require('../models/Conexion.php');
$db = new Conexion();
$db->conn();

require('../models/usuario.class.php');
$usuario = new usuario();
$data = $usuario->obtenerArchivos();

$users = $usuario->obtenerUsuarios();

$user = $_SESSION['usuario'];

$perfil = $usuario->getUserProfile($user);


?>

<?php require_once 'layout/head.php'; ?>

<script>
    $(document).ready(function(){
        $('#tablaAbogados').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        })
             
    });
</script>
  



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
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Dashboard</li>
                        </ol>
                    </div>
                </div>

                <?php


                include '../views/config.php';

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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/endpoints.js"></script>
    <script src="assets/js/quoteForm.js"></script>


<?php require_once 'layout/footer.php'; ?>