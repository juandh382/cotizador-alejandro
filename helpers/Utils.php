<?php



class Utils
{
    public static function uploadFile($files)
    {

        global $gbd;


        $ruta = "upload/";
        $nombrefinal = trim($files['fichero']['name']);
        $upload = $ruta . $nombrefinal;

        if (move_uploaded_file($files['fichero']['tmp_name'], $upload)) {

            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $description = $_POST['descripcion'];

            $sql = "INSERT INTO archivos (name,fecha,description,ruta,tipo,size) VALUES ('$nombre','$fecha','$description','" . $nombrefinal . "','" . $files['fichero']['type'] . "','" . $files['fichero']['size'] . "')";

            $res = $gbd->query($sql);

        }
    }
}