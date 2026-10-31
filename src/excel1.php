<?php

//require 'vendor/autoload.php';
require 'PhpSpreadsheet/vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// Cargar el archivo Excel existente
$archivo = "datos.xlsx";
$spreadsheet = IOFactory::load($archivo);

// Seleccionar la hoja en la que deseas agregar datos (por ejemplo, hoja indexada 0)
$hoja = $spreadsheet->getSheet(0);

// Agregar algunos datos a la hoja
$hoja->setCellValue('A1', 'Nombre');
$hoja->setCellValue('B1', 'Edad');
$hoja->setCellValue('A2', 'Juan');
$hoja->setCellValue('B2', 25);
$hoja->setCellValue('A3', 'María');
$hoja->setCellValue('B3', 30);

// Guardar los cambios de nuevo en el archivo
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($archivo);

echo "Datos agregados exitosamente al archivo '$archivo'";
?>