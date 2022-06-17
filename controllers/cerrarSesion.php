<?php
require_once '../config/constants.php';
require('../models/sesion.class.php');
$sesion = new sesion();
$sesion->cerrar();
echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/login.php" </script>';


exit;
