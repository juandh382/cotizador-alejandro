<?php
require('../../Modelo/Conexion.php');
$db = new Conexion();
$db->conn();
require('../../Modelo/usuario.class.php');
$usuario = new usuario();   
$datos = $usuario ->obtenerUsuarioPorId($_GET['idUsuario']);
echo json_encode($datos);

