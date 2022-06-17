<?php

/* Conectar a una base de datos de MySQL invocando al controlador */
class Conexion
{

    function conn()
    {

        global $gbd;


        /**
         * Produccion
         */

        $dsn = 'mysql:dbname=cst64046_tutoriales;host=127.0.0.1';
        $usuario = 'cst64046_aleja';
        $contraseña = 'Orquidea123';

        /**
         * Desarrollo
         */
        // $host = "127.0.0.1"; 
        // $dbuser = "root"; 
        // $dbpwd = "";
        // $db = "tutoriales";

        try {
            $gbd = new PDO($dsn, $usuario, $contraseña);
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }
}
