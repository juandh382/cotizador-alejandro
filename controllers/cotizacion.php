<?php
require('../config/constants.php');
require('../Modelo/Conexion.php');
$db = new Conexion();
$db->conn();
require('../Modelo/cotizacion.class.php');
$cotizacion = new cotizacion();


/* eliminar */
if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
  // print_r($_GET);
  if ($cotizacion->eliminar($_GET['idCotizacion'])) {
    header('Location: ' . DOMAIN . '/cotizaciones/views/crudcotizaciones.php?eliminar=true');
    exit;
  }
  else {
    header('Location: ' . DOMAIN . '/cotizaciones/views/crudcotizaciones.php?eliminar=false');
    exit;
  } /* agregar */
}
elseif (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

  if ($cotizacion->agregar($_POST['empresa'], $_POST['idCotizacion2'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['insumos'], $_POST['comentarios'], $_POST['cantidad'], $_POST['valorUnitario'], $_POST['porcentaje'], $_POST['despacho'])) {
    header('Location: ' . DOMAIN . '/cotizaciones/views/crudcotizaciones.php?agregar=true');
    exit;
  }
  else {
    header('Location: ' . DOMAIN . '/cotizaciones/views/crudcotizaciones.php?agregar=false');
    exit;
  } /* editar */
}
elseif (isset($_POST['accion']) && $_POST['accion'] == 'modificar') {

  $result = [
    'response' => $cotizacion->modificar($_POST['idCotizacion'], $_POST['empresa'], $_POST['idCotizacion2'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['insumos'], $_POST['comentarios'], $_POST['cantidad'], $_POST['valorUnitario'], $_POST['porcentaje'], $_POST['despacho'])
  ];

  echo json_encode($result);

  exit;


}



?>

