<?php
require('../../Modelo/Conexion.php');
$db = new Conexion();
$db->conn();
require('../../Modelo/abogado.class.php');
$abogado = new abogado();   
$datos = $abogado ->obtenerAbogadoPorId($_GET['idAbogado']);
echo json_encode($datos);

