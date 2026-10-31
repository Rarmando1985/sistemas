<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}
 ?>

<?php require( 'init.php' ); ?>
<?php require( 'templates/header.php' ); ?>
<?php
//Recepcion de variables
    $subproducto=$_POST['Subproducto'];
    $sagencia=$_POST['sagencia'];
    $ncliente=$_POST['nom_cliente'];
    $dpi=$_POST['dpi_num'];
    $fechnac=$_POST['fecha_nac'];
    $direccion=$_POST['direccion'];
    $municipio=$_POST['Municipio'];
    $departamento=$_POST['Departamento'];
    $genero=$_POST['genero'];
    $estadocivil=$_POST['estadocivil'];
    $nacionalidad=$_POST['nacionalidad'];
    $profesion=$_POST['profesion'];
    $trabajo=$_POST['trabajo'];
    $finicio=$_POST['finicio'];
    $puesto=$_POST['puesto'];
    $ingresos=$_POST['ingresos'];
    $monto=$_POST['monto'];
    $plazo=$_POST['plazo'];
    $tasa=$_POST['tasa'];
    $total=$_POST['total'];
    $prospeccion=$_POST['prospeccion'];
    $dpi1=$_POST['dpi_testigo1'];
    $dpi2=$_POST['dpi_num1'];
    $dpi3=$_POST['dpi_testigo2'];
    $ntestigo1=$_POST['nom_testigo1'];
  $ntestigo=$_POST['nom_testigo'];
  $garantiaf=$_POST['garantia'];

    $ncliente1=$_POST['nom_cliente1'];
    $fechnac1=$_POST['fecha_nac1'];
    $direccion1=$_POST['direccion1'];
    $municipio1=$_POST['Municipio1'];
    $departamento1=$_POST['Departamento1'];
    $genero1=$_POST['genero1'];
    $estadocivil1=$_POST['estadocivil1'];
    $nacionalidad1=$_POST['nacionalidad1'];
    $profesion1=$_POST['profesion1'];
    $trabajo1=$_POST['trabajo1'];
    $finicio1=$_POST['finicio1'];
    $puesto1=$_POST['puesto1'];
    $ingresosf=$_POST['ingresos1'];
    $comentarios1=$_POST['comentarios'];
        $fechapago=$_POST['fechapago'];
            $destino=$_POST['destino'];
            $promotor=$_POST['promotor'];
     $con=$app_db;
     $garantia='Fiduciaria';
    ?>
<?php


// consulta de agencia y colocacion de combo box
    $con=$app_db;
    $sql1="SELECT * FROM agencia where cod_agencia=$sagencia";
    $query1=mysqli_query($con,$sql1);
    while($rows=mysqli_fetch_array($query1)){
    $varagencia=$rows[2];
    $idsector=$rows[3];
    }
?>

<?php


if(isset($_POST['c1'])){
$utestigo=1;
}else {
$utestigo=0;  // code...
}

if(isset($_POST['c3'])){
//  echo $garantia;
$utestigo1=1;
}else {
$utestigo1=0;  // code...
}



if(isset($_POST['c2'])){
$ugarantia=1;

if ($garantiaf=='fiador') {
$tg=1;
}

  if ($garantiaf=='codeudor') {
$tg=2;
  }



}else {
$ugarantia=0;  // code...
$tg=0;

}



// consulta de sector y supervisor
    $con=$app_db;
    $sql1="SELECT * FROM sector where id_sector=$idsector";
    $query1=mysqli_query($con,$sql1);
    while($rows1=mysqli_fetch_array($query1)){
      $idsector=$rows1[0];
      $idsupervisor=$rows1[2];
    $nomsec=$rows1[1];
    $nomsup=$rows1[3];
    }


$sql2="SELECT * FROM usuarios where id_sector=$idsector";
    $query2=mysqli_query($con,$sql2);
    while($rows2=mysqli_fetch_array($query2)){
      $correo=$rows2[6];
      $isec=$rows2[7];
    }

$u=$_SESSION['username'];
$correoingreso= $_SESSION['correoingreso'];

?>

<?php


// funcion para calcular edad
function calculaedad($fechanacimiento ){
  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}

    $edad=calculaedad($fechnac);



    ?>




<?php


// funcion para calcular edad
function calculaedad1($fechanacimiento ){
  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}
    $lab=calculaedad1($finicio);



    ?>

<?php


// funcion para calcular edad
function calculaedad3($fechanacimiento ){
list($ano,$mes,$dia) = explode("-",$fechanacimiento);
$ano_diferencia  = date("Y") - $ano;
$mes_diferencia = date("m") - $mes;
$dia_diferencia   = date("d") - $dia;
if ($dia_diferencia < 0 || $mes_diferencia < 0)
$ano_diferencia--;
return $ano_diferencia;
}
$edad1=calculaedad3($fechnac1);


?>

<?php


// funcion para calcular edad
function calculaedad4($fechanacimiento ){
list($ano,$mes,$dia) = explode("-",$fechanacimiento);
$ano_diferencia  = date("Y") - $ano;
$mes_diferencia = date("m") - $mes;
$dia_diferencia   = date("d") - $dia;
if ($dia_diferencia < 0 || $mes_diferencia < 0)
$ano_diferencia--;
return $ano_diferencia;
}

$lab1=calculaedad4($finicio1);


?>


<?php

function numberToText($number)
{
    $ones = array(
        0 => '',
        1 => 'un',
        2 => 'dos',
        3 => 'tres',
        4 => 'cuatro',
        5 => 'cinco',
        6 => 'seis',
        7 => 'siete',
        8 => 'ocho',
        9 => 'nueve',
        10 => 'diez',
        11 => 'once',
        12 => 'doce',
        13 => 'trece',
        14 => 'catorce',
        15 => 'quince',
        16 => 'dieciséis',
        17 => 'diecisiete',
        18 => 'dieciocho',
        19 => 'diecinueve',
        20 => 'veinte',
        30 => 'treinta',
        40 => 'cuarenta',
        50 => 'cincuenta',
        60 => 'sesenta',
        70 => 'setenta',
        80 => 'ochenta',
        90 => 'noventa',
        100 => 'ciento',
        200 => 'doscientos',
        300 => 'trescientos',
        400 => 'cuatrocientos',
        500 => 'quinientos',
        600 => 'seiscientos',
        700 => 'setecientos',
        800 => 'ochocientos',
        900 => 'novecientos'
    );

    $units = array(
        '',
        'mil',
        'millónes',
        'mil millones',
        'billón',
        'mil billones',
        'billón de billones',
        'mil billones de billones',
        'trillón',
        'mil trillones',
        'billón de trillones',
        'mil billones de trillones',
        'trillón de billones',
        'mil trillones de billones',
        'billón de billones de billones',
        'mil billones de billones de billones',
        'cuatrillón'
    );

    if ($number == 0) {
        return 'cero';
    }

    $chunks = array();
    $count = 0;
    while ($number > 0) {
        $chunk = $number % 1000;
        $chunks[] = $chunk;
        $number = (int) ($number / 1000);
        $count++;
    }

    $result = '';
    for ($i = $count - 1; $i >= 0; $i--) {
        if ($chunks[$i] > 0) {
            if ($chunks[$i] == 1 && $i == 1) {
                $result .= 'mil ';
            } else {
                $result .= convertChunk($chunks[$i]) . ' ' . $units[$i] . ' ';
            }
        }
    }

    return trim($result);
}

function convertChunk($number)
{
    $ones = array(
        0 => '',
        1 => 'un',
        2 => 'dos',
        3 => 'tres',
        4 => 'cuatro',
        5 => 'cinco',
        6 => 'seis',
        7 => 'siete',
        8 => 'ocho',
        9 => 'nueve',
        10 => 'diez',
        11 => 'once',
        12 => 'doce',
        13 => 'trece',
        14 => 'catorce',
        15 => 'quince',
        16 => 'dieciséis',
        17 => 'diecisiete',
        18 => 'dieciocho',
        19 => 'diecinueve',
        20 => 'veinte',
        30 => 'treinta',
        40 => 'cuarenta',
        50 => 'cincuenta',
        60 => 'sesenta',
        70 => 'setenta',
        80 => 'ochenta',
        90 => 'noventa',
        100 => 'ciento',
        200 => 'doscientos',
        300 => 'trescientos',
        400 => 'cuatrocientos',
        500 => 'quinientos',
        600 => 'seiscientos',
        700 => 'setecientos',
        800 => 'ochocientos',
        900 => 'novecientos'
    );

    $result = '';

    if ($number >= 100) {
        $result .= $ones[(int)($number / 100) * 100];
        $number %= 100;
    }

    if ($number >= 20) {
        $result .= ' ' . $ones[(int)($number / 10) * 10];
        $number %= 10;
    }

    if ($number > 0) {
        $result .= ' ' . $ones[$number];
    }

    return trim($result);
}

// Obtiene los números ingresados por el usuario

    $dpi3=$_POST['dpi_testigo2'];


$numero1 = isset($_POST['dpi_num']) ? $_POST['dpi_num'] : '';
$numero2 = isset($_POST['dpi_testigo1']) ? $_POST['dpi_testigo1'] : '';
$numero3 = isset($_POST['dpi_num1']) ? $_POST['dpi_num1'] : '';
$numero4 = isset($_POST['dpi_testigo2']) ? $_POST['dpi_testigo2'] : '';


$num1 = "numero1";
$num2 = "numero2";
$num3 = "numero3";
$num4 = "numero4";

$resultado1 = ($num1[-1] === '1') ? 'o' : '';
$resultado2 = ($num2[-1] === '1') ? 'o' : '';
$resultado3 = ($num3[-1] === '1') ? 'o' : '';
$resultado4 = ($num4[-1] === '1') ? 'o' : '';

$numero1_letras = numberToText($numero1).$resultado1;
$numero2_letras = numberToText($numero2).$resultado2;
$numero3_letras = numberToText($numero3).$resultado3;
$numero4_letras = numberToText($numero4).$resultado4;

    date_default_timezone_set('America/Guatemala');

    $fechaActual = date("d-m-Y");
    $horaActual = date("H:i:s");
    $nsolicitud= date("Y").date("m").date("d").date("H").date("i").date("s");
    $afactual=date('d-m-Y H:i:s');



$micarpeta = 'Archivos/expedientes/'.$nsolicitud;
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}

if (isset($_POST['upload'])) {

    $archivo = $_FILES['archivo']['name'];

    //si el campo archivo no viene vacio
    if ($archivo != "") {
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];

        if (!((strpos($tipo, "gif") || strpos($tipo, "pdf") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo 'Error al subir el fichero.';
        }
        else {
            $directorio = 'Archivos/expedientes/'.$nsolicitud.'/';
            //si el archivo no existe
            if (!file_exists($directorio.$archivo)) {
               //Mover el archivo al directorio creado o ya existente
               if (move_uploaded_file($temp, $directorio.$archivo)) {
                    //cambiamos los permisos del fichero
                    chmod($directorio.$archivo, 0777);
                    //echo 'Se ha subido correctamente el fichero '.$archivo;
               }
            }
        }
    }
    else {
        echo 'Error al subir el fichero.';
    }
}
 ?>

 <?php

  $id_comentario=0;
$s=$nsolicitud;

date_default_timezone_set('America/Guatemala');

$fac=date('Y-m-d H:i:s');

$u=$_SESSION['username'];
  $estado1="Ingresado";
  $comentarios="Ingresado";
  $sql="INSERT INTO comentarios VALUES('$id_comentario','$s','$u','$estado1','$comentarios' ,'$fac')";
  $query= mysqli_query($con,$sql);

  if($query){
//      Header("Location: Fiduciario.php");

  }else {
  }


  $sql="INSERT INTO solicitudes (solicitud,fechahora,garntia,id_sector,sector,id_supervisor,supervisor,id_agencia,agencia,subproducto,ncliente,dpicliente,dpiletras,fnac,edad,direccion,municipio,departamento,genero,ecivil,nacionalidad,profesion,ltrabajo,fingreso,tiempolaboral,puesto,ingresos,montosolicitado,plazomeses,tasa,cuota,prospeccion,Comentarios,estado,testigo,dpitestigo,dpitestigoletras,usatestigo,ugarantia,codgarantia,tgarantia,nomgarantia,fnacgarantia,edadgarantia,direcciongarantia,municipio1,departamento1,generogarantia, ecivilgarantia, nacionalidadgarantia,profesiongarantia,trabajogarantia,finiciogarantia,tlabgarantia,puestogarantia,ingresosgarantia1,dpigarantia,dpiletrasgarantia,usatestigo1,testigo1,dpitestigo1,dpitestigoletras1,fechapago,destino,promotor,correosupervisor,usuarioingreso,correoingreso) VALUES ('$nsolicitud','$fac','$garantia','$idsector','$nomsec','$idsupervisor','$nomsup','$sagencia','$varagencia','$subproducto','$ncliente','$dpi','$numero1_letras','$fechnac','$edad','$direccion','$municipio','$departamento','$genero','$estadocivil','$nacionalidad','$profesion','$trabajo','$finicio','$lab','$puesto','$ingresos','$monto','$plazo','$tasa','$total','$prospeccion','$comentarios1','$comentarios','$ntestigo','$dpi1','$numero2_letras','$utestigo','$ugarantia','$tg','$garantiaf','$ncliente1','$fechnac1','$edad1','$direccion1','$municipio1','$departamento1', '$genero1', '$estadocivil1', '$nacionalidad1','$profesion1','$trabajo1','$finicio1','$lab1','$puesto1','$ingresosf','$dpi2','$numero3_letras','$utestigo1','$ntestigo1','$dpi3','$numero4_letras','$fechapago','$destino','$promotor','$correo','$u','$correoingreso')";
  $query= mysqli_query($con,$sql);


  if($query){
  //    Header("Location: agencias.php");

  }else {
  }

  ?>
<h1>Solicitud ingresada con exito</h1>


<h2>
<?php
    echo "Su Numeo expediente es: ".$nsolicitud;
    ?>
<br>
</h2>


<?php
    echo "Solicitud ingresada por:  ".$_SESSION['username'];
    ?>
    <br>

    <?php
        echo "Agencia:  ".$varagencia;
        ?>

<br>
</h2>


<?php
echo "Fecha de ingreso : $fechaActual y la hora es $horaActual" ;
 ?>
<p>
 <h4>Datos de la solicitud:</h4>
 <?php
 echo "Nombre de cliente :". $ncliente;
?>
<br>

 <?php
 echo "Dpi de cliente :".$dpi;;
?>
<br>

 <?php
 echo "Fecha de nacimiento : $fechnac y edad:  $edad años";
?>
<br>

<?php
    echo "Direccion : ".$direccion;
    ?>
<br>
<?php
    echo "Genero : ".$genero;
    ?>
<br>

<?php
    echo "Estado Civil : ".$estadocivil;
    ?>
<br>

<?php
    echo "Nacionalidad : ".$nacionalidad;
    ?>
<br>
<?php
    echo "Profesion : ".$profesion;
    ?>
<br>
<?php
    echo "Lugar de trabajo actual : ". $trabajo;
    ?>
<br>

<?php
    echo "Puesto : ".$puesto;
    ?>
<br>
<?php
    echo "Ingresos mensuales : Q.".$ingresos;
    ?>

<br>

<?php
echo "Fecha de ingreso ".$finicio." Tiempo laboral ".$lab." años";
    ?>

<br>

<?php
    echo "Monto solicitado: Q.".$monto;
    ?>
<br>
<?php
    echo "Plazo ".$plazo." meses";
    ?>
<br>
<?php
    echo "Prospeccion: ".$prospeccion." %";
    ?>
<br>
<?php
    echo "Tasa de interes solicitada: ".$tasa." %";
    ?>
<br>
<?php
    echo "Cuota del credito solicitado: Q. ". round($total,2);
  ?>
<br>
<?php
    echo "Comentarios : ".$comentarios1;
    ?>
<br>
<h3>Garantia</h3>
<br>
<?php
echo $ncliente1;
?>
<br>

Testigo A ruego Deudor
<br>
<?php

    echo $ntestigo;
    ?>
<br>

Testigo a ruego Garantia
<br>
<?php
    echo $ntestigo1;
    ?>
<br>





///////////////////////////////////////////
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = $Host;
    $mail->SMTPAuth = true;
    $mail->Username = $Username;
    $mail->Password = $Password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $Port;

    $mail->setFrom('ronychoche@ronychoche.cloud', 'Rony Choche');
    $mail->addAddress($correo, 'Receptor');
   $mail->addCC('rarmando1985@gmail.com', 'Receptor');
      // $mail->addBCC('rarmando1985@gmail.com', 'Receptor');
   // $mail->addAttachment('docs/dashboard.png', 'Dashboa rd.png');

    $mail->isHTML(true);
    $mail->Subject = 'Ingregresos nuevo expediente ';
    $mail->Body = '<br/>Se informa que se envio un caso para <b>Visto Bueno</b> <b>Visto bueono  </b> <b>A nombre de :'.$ncliente.'  </b> <b>Expedient = '.$nsolicitud.'  </b> <b>Agencia: '. $sagencia.'  </b><b>Monto: '.$monto.'  </b>.  <html>     <body>     <a href=http://proyecto.ronychoche.cloud/autsup.php?expediente='.$nsolicitud.' >Acceda aquí.</a>     </body>     </html>    ';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
   echo 'Mensaje ' . $mail->ErrorInfo;
}
