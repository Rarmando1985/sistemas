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

$expediente = $_GET["expediente"];
$conn=$app_db;
// Consulta a la base de datos
$sql = "SELECT * FROM solicitudes WHERE solicitud = '$expediente'";  // Cambia "nombre_de_la_tabla" por el nombre de tu tabla y "expediente" por el nombre de tu columna de búsqueda
$result1 = $conn->query($sql);

if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $nombre = $row1["ncliente"];
        $dpicliente =$row1["dpicliente"];
        $dpiletras =$row1["dpiletras"];
        $edad = $row1["edad"];
        $profesion = $row1["profesion"];
        $direccion = $row1["direccion"];
        $municipio = $row1["municipio"];
        $departamento = $row1["departamento"];
        $estadocivil = $row1["ecivil"];
        $nacionalidad = $row1["nacionalidad"];
        $monto1 = $row1['montosolicitado'];
        $monto = $formateado = number_format($row1['montosolicitado'], 2, '.', ',');
        $plazo = $row1["plazomeses"];
        $tasa = $row1["tasa"];
        $acta = $row1["acta"];
        $fechacomite = $row1["fechacomite"];
        $punto = $row1["punto"];
        $destino = $row1["destino"];
        $fechapago = $row1["fechapago"];
        $genero = $row1["genero"];
        $subproducto = $row1["subproducto"];
        $usatestigo = $row1["usatestigo"];
        $ugarantia = $row1["ugarantia"];
        $codgarantia = $row1["codgarantia"];
        $usatestigo1 = $row1["usatestigo1"];

    }

}

?>
<form action="res.php" method="GET">
  Contrato generado con exito de expedien:
  <td><input type="text" class="form-control mb-3" name="expediente" value="<?php echo $expediente; ?>" placeholder="Tipo de Operacion"  readonly></td>

<input type="submit" name="Continuar" value="Continuar">
</form>

<?php


///////////////////////////////////////////////
if (ltrim($subproducto)=="Al Trabajador") {

if ($usatestigo==0 && $ugarantia==0 && $codgarantia==0 && $usatestigo1==0  ) {
// Contato al Trabajador sin fiador
  if ($monto1<=80000) {
    $tcontrato='t1';
  }elseif ($monto1<=200000) {
    $tcontrato='t2';
  }elseif ($monto1>200000) {
    $tcontrato='t3';
  }
}

// contrato al trabajador con testigo
if ($usatestigo==1 && $ugarantia==0 && $codgarantia==0 && $usatestigo1==0  ) {

  if ($monto1<=80000) {
    $tcontrato='t1';
  }elseif ($monto1<=200000) {
    $tcontrato='t2';
  }elseif ($monto1>200000) {
    $tcontrato='t3';
  }
}




}else {


if ($usatestigo==0 && $ugarantia==0 && $codgarantia==0 && $usatestigo1==0  ) {


if ($monto1<=80000) {
  $tcontrato='f1';

}elseif ($monto1<=200000) {
  $tcontrato='f2';
}elseif ($monto1>200000) {
  $tcontrato='f3';
}
}
}


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
if ($genero="Masculino") {
  $l="LLENO Y LISO DEUODOR";
}else {
  $l="LLENA Y LISA DEUODORA";


}


require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;

$templateWord = new TemplateProcessor('Archivos/formatos/contrato/'.$tcontrato.'.docx');

// --- Asignamos valores a la plantilla
$templateWord->setValue('nombre_empres',$nombre);
$templateWord->setValue('dpicliente',$dpicliente);
$templateWord->setValue('dpiletras',$dpiletras);
$templateWord->setValue('edad',$edad);
$templateWord->setValue('direccion',$direccion);
$templateWord->setValue('municipio',$municipio);
$templateWord->setValue('departamento',$departamento);
$templateWord->setValue('estadocivil',$estadocivil);
$templateWord->setValue('nacionalidad',$nacionalidad);
$templateWord->setValue('monto',$monto);
$templateWord->setValue('plazo',$plazo);
$templateWord->setValue('profesion',$profesion);
$templateWord->setValue('tasa',$tasa);
$templateWord->setValue('acta',$acta);
//$templateWord->setValue('fechacomite',$fechacomite);
$templateWord->setValue('punto',$punto);
$templateWord->setValue('destino',$destino);
$templateWord->setValue('fechapago',$fechapago);
$templateWord->setValue('fechapagoletras',numeroALetras($fechapago));
$templateWord->setValue('actaletra',numeroALetras($acta));
$templateWord->setValue('tasaletras',numeroALetras($tasa));
$templateWord->setValue('montoletras',numeroALetras($monto1));
$templateWord->setValue('plazoletras',numeroALetras($plazo));
$templateWord->setValue('fechacomite',fechaHoraALetras($fechacomite));
$templateWord->setValue('ldeudor',$l);


// --- Guardamos el documento
$templateWord->saveAs('Archivos/expedientes/'.$expediente.'/'.'contrato'.$expediente.'.docx');

$directorio='Archivos/expedientes/'.$expediente.'/'.'contrato'.$expediente.'.docx';

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
