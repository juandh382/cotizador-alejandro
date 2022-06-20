<?php

session_start();

require('../config/parameters.php');
require('../config/Conexion.php');

/* Crear objeto de esta clase */
$db = new Conexion();
$db->conn();

/* Crear objeto de tipo usuario */
require('../models/User.php');
$usuario = new User();



$objUsuario = $usuario->validar($_POST['nombre'], $_POST['pwd']);

if ($objUsuario) {

    /* echo "Login OK";  */
    require('../models/sesion.class.php');
    $sesion = new sesion();
    $sesion->iniciar();

    echo '<script>window.location.href = "' . base_url . '" </script>';


    exit;



}
else {
    /* echo "Login fail!!";  */

    echo '<script>window.location.href = "' . base_url . '/User/showLoginForm&error=1" </script>';
    exit;
}
;

?>