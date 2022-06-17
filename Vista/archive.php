<?php

if (isset($_GET['id']) && $_GET['id'] !== '') {

    require_once '../Controlador/ArchivesController.php';

    $archivesController = new ArchivesController();

    $result = $archivesController->getAllById($_GET['id']);

    if ($result) {
        header('content-type: ' . $result['tipo']);
        readfile('upload/' . $result['ruta']);
    } else {

        // header('location: index.php');
        echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/index.php" </script>';
    }

}
else {
    // header('location: index.php');
    echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/index.php" </script>';
}
