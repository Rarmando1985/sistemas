<?php
// Establecer la conexión a la base de datos (cambiar los valores según tu configuración)
require('init.php'); // Si este archivo contiene la configuración de la conexión a la base de datos

$con = $app_db;
if (!$con) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT id_solicitud, solicitud, fechahora, garntia, id_sector, sector FROM solicitudes";
$resultado = mysqli_query($con, $sql);

// Nombre del archivo CSV que se generará
$nombre_archivo = 'datos_solicitudes.csv';

// Abrir el archivo CSV en modo escritura
$archivo_csv = fopen($nombre_archivo, 'w');

// Obtener los nombres de los campos (encabezados)
$encabezados = array('id_solicitud', 'solicitud', 'fechahora', 'garntia', 'id_sector', 'sector');

// Escribir los encabezados en el archivo CSV
foreach ($encabezados as $indice => $encabezado) {
    fwrite($archivo_csv, $encabezado);
    if ($indice < count($encabezados) - 1) {
        fwrite($archivo_csv, ",");
    }
}

fwrite($archivo_csv, PHP_EOL);

// Escribir los valores en el archivo CSV
while ($fila = mysqli_fetch_assoc($resultado)) {
    foreach ($encabezados as $indice => $campo) {
        fwrite($archivo_csv, $fila[$campo]);
        if ($indice < count($encabezados) - 1) {
            fwrite($archivo_csv, ",");
        }
    }
    fwrite($archivo_csv, PHP_EOL);
}

// Cerrar el archivo CSV
fclose($archivo_csv);

// Descargar el archivo CSV al navegador
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="' . $nombre_archivo . '"');
header('Cache-Control: max-age=0');
readfile($nombre_archivo);

// Eliminar el archivo CSV del servidor (opcional, puedes omitir esta línea si lo deseas)
unlink($nombre_archivo);

// Cerrar la conexión a la base de datos
mysqli_close($con);
exit;
?>