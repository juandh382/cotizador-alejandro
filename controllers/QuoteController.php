<?php

class QuoteController
{
  public function showQuotes(): void
  {
    require_once 'views/cotizaciones.php';
  }

  public function showQuotesCRUD(): void
  {
    require('models/cotizacion.class.php');
    $cotizacion = new cotizacion();
    $data = $cotizacion->obtenerCotizaciones();

    $user = new User();
    $users = $user->obtenerUsuarios();
    require_once 'views/crudcotizaciones.php';
  }

  public static function createQuoteModel()
  {
    require('../config/Conexion.php');
    require('../models/cotizacion.class.php');
    $connection = new Conexion();
    $connection->conn();
    $quote = new cotizacion();
    return $quote;
  }
}

if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
  require('models/cotizacion.class.php');
  $quote = new cotizacion();

  $quote->eliminar($_GET['idCotizacion']);

  echo '<script>window.location.href = "' . base_url . '/Quote/showQuotesCRUD" </script>';

  exit;
}

if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

  echo json_encode([
    'result' => QuoteController::createQuoteModel()->agregar($_POST)
  ]);
}

if (isset($_POST['accion']) && $_POST['accion'] == 'modificar') {

  echo json_encode([
    'result' => QuoteController::createQuoteModel()->modificar($_POST['idCotizacion'], $_POST['empresa'], $_POST['idCotizacion2'], $_POST['fechaInicio'], $_POST['fechaTermino'], $_POST['insumos'], $_POST['comentarios'], $_POST['cantidad'], $_POST['valorUnitario'], $_POST['porcentaje'], $_POST['despacho'], $_POST['valorVenta'], $_POST['total'], $_POST['valorGanancia'])
  ]);

  exit;
}

if (isset($_POST['getLastRegisterSaved'])) {

  echo json_encode([
    'result' => QuoteController::createQuoteModel()->getLastRegisterSaved()
  ]);

  exit;
}

if (isset($_GET['getQuoteById']) && isset($_GET['idCotizacion'])) {

  $id = (int)$_GET['idCotizacion'];

  echo json_encode([
    'result' => QuoteController::createQuoteModel()->obtenerCotizacionPorId($id)
  ]);

  exit;
}



?>

