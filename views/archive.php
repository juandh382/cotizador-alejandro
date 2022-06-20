<?php

require_once '../config/parameters.php';
require_once '../config/Conexion.php';

$connection = new Conexion();
$connection->conn();

if (isset($_GET['id']) && $_GET['id'] !== '') {

    require_once '../controllers/ArchivesController.php';

    $archivesController = new ArchivesController();

    $result = $archivesController->getAllById($_GET['id']);

    if ($result) {
        header('content-type: ' . $result['tipo']);
        readfile('upload/' . $result['ruta']);
    }
    else {

        echo '<script>window.location.href = "' . base_url . '?controller=Error&action=index" </script>';
    }

}
else {
    echo '<script>window.location.href = "' . base_url . '?controller=Error&action=index" </script>';
}
