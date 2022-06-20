<?php

session_start();

require_once 'autoload.php';


/* ========================= */
/*      DB CONNECTION      */
/* ========================= */
require('config/Conexion.php');
$db = new Conexion();
$db->conn();

require('config/parameters.php');
require_once 'helpers/Utils.php';
require('models/sesion.class.php');
require('models/User.php');

$sesion = new sesion();
!$sesion->validar() ?Utils::goLogin() : null;

$_SESSION['user'] = new User();


require_once 'views/layout/head.php';

function show_error()
{
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $controller_name = $_GET['controller'] . 'Controller';

}
elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {

    $controller_name = controller_default;


}
else {

    show_error();
    exit();

}

if (class_exists($controller_name)) {
    $controller = new $controller_name();

    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {

        $action = $_GET['action'];
        $controller->$action();

    }
    elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {

        $default_action = default_action;
        $controller->$default_action();

    }
    else {
        show_error();
    }
}
else {
    show_error();
}

require_once 'views/layout/footer.php';