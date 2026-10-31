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
    $vo=$_POST['submit'];
    $expediente=$_GET['expediente'];
      $comentarios=$_POST['comentarios'];

if ($vo=='Si') {
  $au="Enviado";

}else {
  $au="Denegado";
}

$sql="UPDATE solicitudes SET  estado='$au' WHERE solicitud=$expediente";
$query=mysqli_query($con,$sql);

  if($query){

  }

 $id_comentario=0;
$s=ltrim($expediente);

date_default_timezone_set('America/Guatemala');

$fac=date('Y-m-d H:i:s');

$u=$_SESSION['username'];

 $sql="INSERT INTO comentarios VALUES('$id_comentario','$s','$u','$au','$comentarios' ,'$fac')";
 $query= mysqli_query($con,$sql);

 if($query){
Header("Location: rsupervisor.php");
 }else {
 }

?>

<?php
// consulta de agencia y colocacion de combo box
    $con=$app_db;
    $sql3="SELECT * FROM solicitudes where solicitud=$expediente";
    $query3=mysqli_query($con,$sql3);
    while($rows3=mysqli_fetch_array($query3)){
    $correo=$rows3[71];
    echo $correo;
    }

    $sql4="SELECT * FROM usuarios where rol_id=2";
    $query4=mysqli_query($con,$sql4);
    while($rows4=mysqli_fetch_array($query4)){
    $correo1=$rows4[6];
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
    $mail->Body = '<br/>Se Ingresado expediente para analisis  </b> <b>Agencia:  </b><b>Monto:   </b>.  <html>     <body>     <a href=http://proyecto.ronychoche.cloud/autsup.php?expediente='.$expediente.' >Acceda aquí.</a>     </body>     </html>    ';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
   echo 'Mensaje ' . $mail->ErrorInfo;
}
