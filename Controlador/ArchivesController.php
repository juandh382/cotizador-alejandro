<?php

require('../Modelo/Conexion.php');
$db = new Conexion();
$db->conn();


class ArchivesController
{
    public function getAllById($id)
    {
        require_once '../Modelo/Archive.class.php';

        $archive = new Archive();

        return $archive->getAllById($id);
    }

    public function getAllByName($name)
    {
        require_once '../Modelo/Archive.class.php';

        $archive = new Archive();

        return $archive->getAllByName($name);
    }
    public function getLastArchiveSaved()
    {
        require_once '../Modelo/Archive.class.php';

        $archive = new Archive();

        return $archive->getLastArchiveSaved();
    }

}

if (isset($_POST['get_all_by_file_name'])) {

    $archivesController = new ArchivesController();
    $response = [

        'response' => $archivesController->getAllByName($_POST['get_all_by_file_name'])
    ];

    echo json_encode($response);
}
if (isset($_POST['get_last_archive_saved'])) {

    $archivesController = new ArchivesController();
    $response = [

        'response' => $archivesController->getLastArchiveSaved()
    ];

    echo json_encode($response);
}

