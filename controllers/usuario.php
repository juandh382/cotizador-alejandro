<?php

require('../config/constants.php');
require('../models/Conexion.php');
$db = new Conexion();
$db->conn();
require('../models/usuario.class.php');
$usuario = new usuario();




if (isset($_POST['get_last_user_saved'])) {
  $result = [
    'response' => $usuario->getLastUserSaved()
  ];

  echo json_encode($result);

  exit;
}

if (isset($_POST['get_all_by_id'])) {

  $result = [
    'response' => $usuario->obtenerUsuarioPorId($_POST['id'])
  ];

  echo json_encode($result);

  exit;
}


/* eliminar */
if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {

  if ($usuario->eliminar($_GET['idUsuario'])) {
    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/usuarios.php?eliminar=true" </script>';
    exit;
  }
  else {
    echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/usuarios.php?eliminar=false" </script>';
    exit;
  }

}

/**
 * Agregar
 */

if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

  $result = [
    'response' => $usuario->agregar($_POST['nombre'], $_POST['pwd'], $_POST['perfil'])
  ];

  echo json_encode($result);
  exit;

}

/**
 * editar
 */

if (isset($_POST['accion']) && $_POST['accion'] == 'modificar') {

  $result = [
    'response' => $usuario->modificar($_POST['idUsuario'], $_POST['nombre'], $_POST['pwd'], $_POST['perfil'])
  ];

  echo json_encode($result);

  exit;


}



?>

