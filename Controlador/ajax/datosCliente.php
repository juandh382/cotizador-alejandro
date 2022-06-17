<?php
require('../../Modelo/Conexion.php');
$db = new Conexion();
$db->conn();
require('../../Modelo/cliente.class.php');
$cliente = new cliente();   
$datos = $cliente ->obtenerClientePorId($_GET['idCliente']);
echo json_encode($datos);

