<?php



class Utils
{
    public static function uploadFile(array $files): void
    {

        global $gbd;


        $ruta = "upload/";
        $nombrefinal = trim($files['fichero']['name']);
        $upload = $ruta . $nombrefinal;

        if (!is_dir('upload')) {
            mkdir('upload', 0777);
        }

        if (move_uploaded_file($files['fichero']['tmp_name'], $upload)) {

            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $description = $_POST['descripcion'];

            $sql = "INSERT INTO archivos (name,fecha,description,ruta,tipo,size) VALUES ('$nombre','$fecha','$description','" . $nombrefinal . "','" . $files['fichero']['type'] . "','" . $files['fichero']['size'] . "')";

            $res = $gbd->query($sql);

        }
    }
}