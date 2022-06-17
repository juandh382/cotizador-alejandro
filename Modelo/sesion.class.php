<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sesion
 *
 * @author cetecom
 */


class sesion
{
    //put your code here

    function iniciar()
    {

        $_SESSION['valida'] = true;
        $_SESSION['usuario'] = $_POST['nombre'];
    }

    function validar()
    {

        if (isset($_SESSION['valida']) && $_SESSION['valida']) {
            return true;
        }
        else {
            return false;
        }
    }

    function cerrar()
    {

        $_SESSION[] = array();
        session_destroy();
    }
}
