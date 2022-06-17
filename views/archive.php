<?php

require_once '../config/constants.php';

if (isset($_GET['id']) && $_GET['id'] !== '') {

    require_once '../controllers/ArchivesController.php';

    $archivesController = new ArchivesController();

    $result = $archivesController->getAllById($_GET['id']);

    if ($result) {
        header('content-type: ' . $result['tipo']);
        readfile('upload/' . $result['ruta']);
    }
    else {

        echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/index.php" </script>';
    }

}
else {
    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/index.php" </script>';
}
