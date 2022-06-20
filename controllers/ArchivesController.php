<?php

class ArchivesController
{
    public function getAllById($id)
    {
        require_once '../models/Archive.class.php';

        $archive = new Archive();

        return $archive->getAllById($id);
    }

    public function getAllByName($name)
    {
        require_once '../models/Archive.class.php';

        $archive = new Archive();

        return $archive->getAllByName($name);
    }
    public function getLastArchiveSaved()
    {

        require_once '../config/Conexion.php';
        require_once '../models/Archive.class.php';
        $connection = new Conexion();
        $connection->conn();
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

    echo json_encode([

        'response' => $archivesController->getLastArchiveSaved()
    ]);
}

