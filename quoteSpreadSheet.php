<?php 
require 'vendor/autoload.php';
require_once 'config/Conexion.php';
require_once 'models/cotizacion.class.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;




$spreadSheet = new SpreadSheet();
$spreadSheet->getProperties()->setCreator("Marko Robles")->setTitle('Cotizaciones');

$spreadSheet->setActiveSheetIndex(0);
$hojaActiva = $spreadSheet->getActiveSheet();


$connection = new Conexion();
$connection->conn();


$cotizacion = new cotizacion();
$cotizaciones = $cotizacion->obtenerCotizaciones();




$hojaActiva->setCellValue('A' . 1, 'empresa');
$hojaActiva->setCellValue('B' . 1, 'idCotizacion');
$hojaActiva->setCellValue('C' . 1, 'fechaInicio');
$hojaActiva->setCellValue('C' . 1, 'insumos');
$hojaActiva->setCellValue('D' . 1, 'comentarios');
$hojaActiva->setCellValue('E' . 1, 'cantidad');
$hojaActiva->setCellValue('F' . 1, 'valorUnitario');
$hojaActiva->setCellValue('G' . 1, 'valorVenta');
$hojaActiva->setCellValue('H' . 1, 'porcentaje');
$hojaActiva->setCellValue('I' . 1, 'despacho');
$hojaActiva->setCellValue('J' . 1, 'total');


$index = 2;

foreach ($cotizaciones as $registro) {

    $hojaActiva->setCellValue('A' . $index, $registro['empresa']);
    $hojaActiva->setCellValue('B' . $index, $registro['idCotizacion']);
    $hojaActiva->setCellValue('C' . $index, $registro['fechaInicio']);
    $hojaActiva->setCellValue('C' . $index, $registro['insumos']);
    $hojaActiva->setCellValue('D' . $index, $registro['comentarios']);
    $hojaActiva->setCellValue('E' . $index, $registro['cantidad']);
    $hojaActiva->setCellValue('F' . $index, $registro['valorUnitario']);
    $hojaActiva->setCellValue('G' . $index, $registro['valorVenta']);
    $hojaActiva->setCellValue('H' . $index, $registro['porcentaje']);
    $hojaActiva->setCellValue('I' . $index, $registro['despacho']);
    $hojaActiva->setCellValue('J' . $index, $registro['total']);
    $index++;
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="quotes.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadSheet, 'Xlsx');
$writer->save('php://output');

/* $writer = new Xlsx($spreadSheet);
$writer->save('Mi excel.xlsx'); */


