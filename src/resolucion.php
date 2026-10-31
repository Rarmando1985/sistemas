<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}else {
  // code...
}
?>
<?php require( 'init.php' ); ?>
 <?php require( 'templates/header.php' ); ?>
<?php

$expediente =$_GET["expediente"];
$conn=$app_db;

// Consulta a la base de datos
$sql = "SELECT * FROM solicitudes WHERE solicitud = '$expediente'";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
$result1 = $conn->query($sql);

if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $nombre = $row1["ncliente"];
        $monto = $formateado = number_format($row1['montosolicitado'], 2, '.', ',');
        $monto1 = $row1['montosolicitado'];
        $destino = 'Gastos Personales';
        $plazo = $row1["plazomeses"];
        $prospeccion = $row1["prospeccion"];
        $tasa = $row1["tasa"];
        $acta = $row1["acta"];
        $punto = $row1["punto"];
        $fechacomite = $row1["fechacomite"];
        $fechapago = $row1["fechapago"];
        $subproducto=$row1["subproducto"];
    }

}

/////
function fechaHoraALetras($fechaHora)
{
    $fecha_hora = DateTime::createFromFormat('Y-m-d H:i:s', $fechaHora);

    if (!$fecha_hora) {
        return 'Formato de fecha y hora inválido. Debe ser "Y-m-d H:i:s".';
    }

    $dia = (int)$fecha_hora->format('d');
    $mes = (int)$fecha_hora->format('m');
    $anio = (int)$fecha_hora->format('Y');

    // Nombres de los meses en letras
    $meses = array(
        1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
        5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
        9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
    );

    if ($dia < 1 || $dia > 31 || $mes < 1 || $mes > 12 || $anio < 0) {
        return 'Fecha inválida.';
    }

    $fecha_en_letras = "{$dia} de {$meses[$mes]} del {$anio}";

    return $fecha_en_letras;
}
//


?>
<form action="contrato.php" method="GET">

  Son correctos los datos en resolucion del expeiente?
  <td><input type="text" class="form-control mb-3" name="expediente" value="<?php echo $expediente; ?>" placeholder="Tipo de Operacion"  readonly></td>

   <button name="submit" value="contrato"> Generar Contrato</button>

</form>

<a href="rcomite.php?expediente=<?php echo $expediente;?>"> <button type="button">VOLVER</button></a>
<?php


////////////////////////////////////////////////
if ($subproducto=="Al Trabajador") {

    $tcontrato='rt1';

}else {
  $tcontrato='rf1';

}



///////////////////////////////////////////////////////////






///////////////////////////////////////////////////////////
function numeroALetras($numero)
{
    $unidades = array('', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve');
    $decenas = array('', '', 'veinti', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa');
    $centenas = array('', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos');

    if ($numero == 0) {
        return 'cero';
    }

    if ($numero < 0 || $numero > 500000) {
        return 'Número fuera de rango';
    }

    $parte_entera = floor($numero);
    $parte_decimal = round(($numero - $parte_entera) * 100);

    $letras = '';

    if ($parte_entera >= 1000) {
        $miles = floor($parte_entera / 1000);
        $letras .= ($miles == 1) ? 'mil' : numeroALetras($miles) . ' mil';
        $parte_entera %= 1000;
    }

    if ($parte_entera >= 100) {
        $centena = floor($parte_entera / 100);
        $letras .= ' ' . $centenas[$centena];
        $parte_entera %= 100;
    }

    if ($parte_entera >= 20) {
        $decena = floor($parte_entera / 10);
        $letras .= ' ' . $decenas[$decena];
        $parte_entera %= 10;
    }

    if ($parte_entera > 0) {
        $letras .= ' ' . $unidades[$parte_entera];
    }

    if ($parte_decimal > 0) {
        $letras .= ' con ' . numeroALetras($parte_decimal);
    }

    return trim($letras);
}
////////////////////////

require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('Archivos/formatos/resolucion/'.$tcontrato.'.docx');

// --- Asignamos valores a la plantilla
$templateWord->setValue('nombre_cliente',$nombre);
$templateWord->setValue('monto',$monto);
$templateWord->setValue('destino',$destino);
$templateWord->setValue('plazo',$plazo);
$templateWord->setValue('prospeccion',$prospeccion);
$templateWord->setValue('tasa',$tasa);
$templateWord->setValue('acta',$acta);
$templateWord->setValue('punto',$punto);
$templateWord->setValue('fechacomite',fechaHoraALetras($fechacomite));
$templateWord->setValue('montoletras',numeroALetras($monto1));
$templateWord->setValue('plazol',numeroALetras($plazo));
$templateWord->setValue('fechapago',$fechapago);
// --- Guardamos el documento
$templateWord->saveAs('Archivos/expedientes/'.$expediente.'/'.'resolucion'.$expediente.'.docx');
$directorio='Archivos/expedientes/'.$expediente.'/'.'resolucion'.$expediente.'.docx';

//header("Content-Disposition: attachment; filename='.$expedientes.'.docx; charset=iso-8859-1");
//echo file_get_contents($expediente.'.docx');
if (file_exists($directorio)) {
    echo '<embed src="' . $directorio. '" type="application/pdf" width="100%" height="600px" />';
} else {
    echo "El archivo no existe o no es accesible.";
    echo $directorio;
echo $archivo;
}
?>
