<?php



class Utils
{
    public static function uploadFile(array $files): void
    {
        global $gbd;


        $ruta = "../views/upload/";
        $nombrefinal = trim($files['fichero']['name']);
        $upload = $ruta . $nombrefinal;

        if (!is_dir('../views/upload/')) {
            mkdir('../views/upload/', 0777);
        }

        if (move_uploaded_file($files['fichero']['tmp_name'], $upload)) {

            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $description = $_POST['descripcion'];

            $sql = "INSERT INTO archivos (name,fecha,description,ruta,tipo,size) VALUES ('$nombre','$fecha','$description','" . $nombrefinal . "','" . $files['fichero']['type'] . "','" . $files['fichero']['size'] . "')";

            $res = $gbd->query($sql);

        }
    }

    public static function goDashBoard(): void
    {
        echo '<script>window.location.href = "' . base_url . '" </script>';
    }

    public static function isAdmin($perfil): bool
    {
        return $perfil == 'Administrador';
    }

    public static function goLogin(): void
    {
        require_once 'views/login.php';
        exit;
    }
}

if (isset($_POST['submit'])) {

    if (isset($_FILES['fichero'])) {
        require_once '../config/Conexion.php';
        $connection = new Conexion();
        $connection->conn();
        Utils::uploadFile($_FILES);
    }
}