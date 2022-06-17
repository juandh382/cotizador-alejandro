<?php
require_once '../config/constants.php';
require('../Modelo/sesion.class.php');
$sesion = new sesion();
$sesion->cerrar();
echo '<script>window.location = "' . DOMAIN . '/cotizaciones/Vista/login.php" </script>';


exit;
