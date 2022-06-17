<?php
require('../../Modelo/Conexion.php');
$db = new Conexion();
$db->conn();
require('../../Modelo/atencion.class.php');
$atencion = new atencion();   
$datos = $atencion ->obtenerAtencionPorId($_GET['idAtencion']);
echo json_encode($datos);

