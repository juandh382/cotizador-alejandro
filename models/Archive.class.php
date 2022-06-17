<?php

class Archive
{

    public function getAllById($id)
    {
        global $gbd;

        $sql = 'SELECT id, name, fecha, description, ruta, tipo from archivos WHERE id = "' . $id . '"';

        $result = $gbd->query($sql);

        if ($result) {
            $result = $result->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }
    public function getAllByName($name)
    {
        global $gbd;

        $sql = 'SELECT * from archivos WHERE ruta = "' . $name . '"';

        $result = $gbd->query($sql);

        if ($result) {
            $result = $result->fetch(PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function getLastArchiveSaved()
    {
        global $gbd;
        $sql = 'SELECT id, name, fecha, description, ruta, tipo from archivos ORDER BY id DESC LIMIT 1';

        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            return false;
        }
    }

    public function saveArchive($user_name, $date, $description, $finalName, $type, $size)
    {
        global $gbd;

        $sql = "INSERT INTO archivos (name,fecha,description,ruta,tipo,size) VALUES ('$user_name','$date','$description','" . $finalName . "','" . $type . "','" . $size . "')";

        
    }
}