<?php

class UserController
{
  public static function createUserModel()
  {
    require_once '../config/Conexion.php';
    require_once '../models/User.php';

    $connection = new Conexion();
    $connection->conn();
    return new User();
  }

  public function showLoginForm(): void
  {
    require_once 'views/login.php';
  }
  public function logOut(): void
  {
    $sesion = new sesion();
    $sesion->cerrar();
    echo '<script>window.location.href = "' . base_url . '/User/showLoginForm" </script>';
  }

  public function index(): void
  {
    require_once 'views/usuarios.php';
  }
}


if (isset($_POST['get_last_user_saved'])) {
  $result = [
    'response' => UserController::createUserModel()->getLastUserSaved()
  ];

  echo json_encode($result);

  exit;
}

if (isset($_POST['get_all_by_id']) || isset($_GET['get_all_by_id'])) {

  $id = isset($_POST['id']) ? $_POST['id'] : $_GET['idUsuario'];

  $result = [
    'response' => UserController::createUserModel()->obtenerUsuarioPorId($id)
  ];

  echo json_encode($result);

  exit;
}


/* eliminar */
if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
  $user = new User();
  $user->eliminar($_GET['idUsuario']);
  echo '<script>window.location.href = "' . base_url . '/User/index" </script>';
  exit;

}

/**
 * Agregar
 */

if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

  $result = [
    'response' => UserController::createUserModel()->agregar($_POST['nombre'], $_POST['pwd'], $_POST['perfil'])
  ];

  echo json_encode($result);
  exit;

}

/**
 * editar
 */

if (isset($_POST['accion']) && $_POST['accion'] == 'modificar') {

  $result = [
    'response' => UserController::createUserModel()->modificar($_POST['idUsuario'], $_POST['nombre'], $_POST['pwd'], $_POST['perfil'])
  ];

  echo json_encode($result);

  exit;


}



?>

