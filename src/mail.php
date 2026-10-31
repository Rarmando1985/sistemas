<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.ionos.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ronychoche@ronychoche.cloud';
    $mail->Password = 'programacion1.';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port = 587;

    $mail->setFrom('ronychoche@ronychoche.cloud', 'Rony Choche');
    $mail->addAddress('evelyn.zecena@bancoinmobiliario.com.gt', 'Receptor');
   // $mail->addCC('rarmando1985@gmail.com', 'Receptor');

   // $mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

    $mail->isHTML(true);
    $mail->Subject = 'Actualizacion de estado caso ';
    $mail->Body = 'Hola, <br/>Se informa que se envio un caso para <b>Analiais</b>.';
    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
   echo 'Mensaje ' . $mail->ErrorInfo;
}
