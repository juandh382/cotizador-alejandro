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
$hojaActiva->setCellValue('D' . 1, 'fechaTermino');
$hojaActiva->setCellValue('E' . 1, 'insumos');
$hojaActiva->setCellValue('F' . 1, 'comentarios');
$hojaActiva->setCellValue('G' . 1, 'cantidad');
$hojaActiva->setCellValue('H' . 1, 'valorUnitario');
$hojaActiva->setCellValue('I' . 1, 'valorVenta');
$hojaActiva->setCellValue('J' . 1, 'porcentaje');
$hojaActiva->setCellValue('K' . 1, 'despacho');
$hojaActiva->setCellValue('L' . 1, 'total');


$index = 2;

foreach ($cotizaciones as $registro) {
    $hojaActiva->setCellValue('A' . $index, $registro['empresa']);
    $hojaActiva->setCellValue('B' . $index, $registro['idCotizacion']);
    $hojaActiva->setCellValue('C' . $index, $registro['fechaInicio']);
    $hojaActiva->setCellValue('D' . $index, $registro['fechaTermino']);
    $hojaActiva->setCellValue('E' . $index, $registro['insumos']);
    $hojaActiva->setCellValue('F' . $index, $registro['comentarios']);
    $hojaActiva->setCellValue('G' . $index, $registro['cantidad']);
    $hojaActiva->setCellValue('H' . $index, $registro['valorUnitario']);
    $hojaActiva->setCellValue('I' . $index, $registro['valorVenta']);
    $hojaActiva->setCellValue('J' . $index, $registro['porcentaje']);
    $hojaActiva->setCellValue('K' . $index, $registro['despacho']);
    $hojaActiva->setCellValue('L' . $index, $registro['total']);

    $index++;
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="quotes.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadSheet, 'Xlsx');
$writer->save('php://output');

/* $writer = new Xlsx($spreadSheet);
$writer->save('Mi excel.xlsx'); */


