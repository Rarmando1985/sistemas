<?php
session_start();
if (!isset($_SESSION['rol'])) {
header('location: login.php');	// code...
}
?>
<?php require( 'init.php' ); ?>
<?php
    $con=$app_db;
    $username=$_SESSION['username'];
    $analista=$_POST['analista'];
    $expediente=$_GET['expediente'];
    $comentarios=$_POST['comentariosasignacion'];
$au="Analisis";
date_default_timezone_set('America/Guatemala');

$fac=date('Y-m-d H:i:s');

$sql="UPDATE solicitudes SET  estado='$au',analista='$analista', fechaanalisis='$fac' WHERE solicitud=$expediente";
$query=mysqli_query($con,$sql);

$id_comentario=0;
$s=ltrim($expediente);



$username=$_SESSION['username'];

 $sql="INSERT INTO comentarios VALUES('$id_comentario','$s','$username','$au','$comentarios' ,'$fac')";
 $query= mysqli_query($con,$sql);

 if($query){
//      Header("Location: Fiduciario.php");
 Header("Location: canalisis.php");
 }
?>



<?php

// consulta de agencia y colocacion de combo box
    $sql3="SELECT * FROM usuarios where username='$analista'";
echo $sql3;
    $query3=mysqli_query($con,$sql3);
   while($rows3=mysqli_fetch_array($query3)){
    $correo=$rows3[6];
    echo $correo;
    echo "analista: ".$analista;
 }

    $con=$app_db;
    $sql4="SELECT * FROM solicitudes where solicitud=$expediente";
    $query4=mysqli_query($con,$sql4);
    while($rows4=mysqli_fetch_array($query4)){
    $correo1=$rows4[71];
    echo $correo1;
 }
?>

//////////////////////
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
   $mail->addCC($correo1, 'Receptor');
      // $mail->addBCC('rarmando1985@gmail.com', 'Receptor');
   // $mail->addAttachment('docs/dashboard.png', 'Dashboa rd.png');

    $mail->isHTML(true);
    $mail->Subject = 'Ingregresos nuevo expediente ';
    $mail->Body = '<br/>Se asigno expediente para analisis  </b> <b>A: '.$analista;
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
   echo 'Mensaje ' . $mail->ErrorInfo;
}
