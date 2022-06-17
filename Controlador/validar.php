<?php

session_start();

require('../config/constants.php');
require('../Modelo/Conexion.php');

/* Crear objeto de esta clase */
$db = new Conexion();
$db->conn();

/* Crear objeto de tipo usuario */
require('../Modelo/usuario.class.php');
$usuario = new usuario();



$objUsuario = $usuario->validar($_POST['nombre'], $_POST['pwd']);

if ($objUsuario) {

    /* echo "Login OK";  */
    require('../Modelo/sesion.class.php');
    $sesion = new sesion();
    $sesion->iniciar();

    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/Vista/index.php" </script>';


    exit;



}
else {
    /* echo "Login fail!!";  */

    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/Vista/login.php?error=1" </script>';
    exit;
}
;

?>