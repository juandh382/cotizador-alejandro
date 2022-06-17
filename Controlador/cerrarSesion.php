<?php
require('../Modelo/sesion.class.php');
$sesion = new sesion();
$sesion->cerrar();
// header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php');  
echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php" </script>';


exit;
