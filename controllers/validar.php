<?php

session_start();

require('../config/constants.php');
require('../config/Conexion.php');

/* Crear objeto de esta clase */
$db = new Conexion();
$db->conn();

/* Crear objeto de tipo usuario */
require('../models/usuario.class.php');
$usuario = new usuario();



$objUsuario = $usuario->validar($_POST['nombre'], $_POST['pwd']);

if ($objUsuario) {

    /* echo "Login OK";  */
    require('../models/sesion.class.php');
    $sesion = new sesion();
    $sesion->iniciar();

    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/index.php" </script>';


    exit;



}
else {
    /* echo "Login fail!!";  */

    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/login.php?error=1" </script>';
    exit;
}
;

?>