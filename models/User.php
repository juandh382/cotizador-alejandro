<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author cetecom
 */
class User
{

    function validar($nombre, $pwd)
    {

        global $gbd;

        $sql = "SELECT pwd FROM usuario WHERE nombre='" . $nombre . "' ";
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            if (password_verify($pwd, $row['pwd'])) {
              
                return $row;
            }
            else {
                echo 'La contraseña es invalida. ';
                return false;
            }
        }
        else {
            return false;
        }
   
    }

    function obtenerUsuarios()
    {
        global $gbd;
        $sql = "SELECT * FROM usuario";
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            return false;
        }
    }

    function obtenerArchivos()
    {
        global $gbd;
        $sql = "SELECT id, name, fecha, description, ruta, tipo from archivos";
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            return false;
        }
    }

    function getUserProfile($usr)
    {
        
        global $gbd;
        $sql = "SELECT * FROM usuario  WHERE nombre = '" . $usr . "' ";
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetchAll(PDO::FETCH_ASSOC);
            // $perfil = $row['perfil'];
            return $row[0]['perfil'];
        }
        else {
            return false;
        }
    }
    function agregar($nombre, $pwd, $perfil)
    {
        global $gbd;
        // if(!$this->existeNombre($nombre)){
        $pwd_encriptada = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (nombre, pwd, perfil) "
            . "VALUES (:nombre, :pwd, :perfil)";

        $res = $gbd->prepare($sql);
        // var_dump(prepare($sql));

        if ($res->execute(array(':nombre' => $nombre,
        ':pwd' => $pwd_encriptada,
        ':perfil' => $perfil))
        ) {
            return true;
        }
        else {
            return false;
        }
    /*  }else{
     return false;
     } */
    }

    function existeNombre($nombre)
    {
        global $gbd;
        $sql = "SELECT * FROM usuario WHERE nombre='" . $nombre . "' ";
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            if ($row['idUsuario'] > 0) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }


    function eliminar($idUsuario)
    {
        global $gbd;
        $sql = "DELETE FROM usuario WHERE idUsuario = :idUsuario";
        $res = $gbd->prepare($sql);
        if ($res->execute(array(':idUsuario' => $idUsuario))) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getLastUserSaved() {
        global $gbd;
        $sql = 'SELECT * FROM usuario ORDER BY idUsuario DESC LIMIT 1';

        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            return false;
        }
    }

    function obtenerUsuarioPorId($idUsuario)
    {
        global $gbd;
        $sql = "SELECT * FROM usuario WHERE idUsuario=" . $idUsuario;
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            return false;
        }
    }

    function modificar($idUsuario, $nombre, $pwd, $perfil)
    {
        global $gbd;
        $data = array();

        $sql = "UPDATE usuario SET nombre = :nombre, perfil = :perfil ";

        if (!empty($pwd)) {
            $sql .= ", pwd = :pwd ";
        }

        $sql .= " WHERE idUsuario = :idUsuario";

        $data = [
            ':idUsuario' => $idUsuario,
            ':nombre' => $nombre,
            ':perfil' => $perfil
        ];

        if (!empty($pwd))
            $data[':pwd'] = password_hash($pwd, PASSWORD_DEFAULT);


        $res = $gbd->prepare($sql);

        return $res->execute($data);

        // return $data;
    }



}