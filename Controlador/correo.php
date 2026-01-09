<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/../vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;

try{
    //Configurar servidor de php mailer con smtp para enviar correo
    $mail->isSMTP();
    $mail->Host= 'smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='astrosoft06@gmail.com';
    $mail->Password='fhci lmnp tpkb neqf';
    $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port=587;

    //Destinatario
    $mail->setFrom('astrosoft06@gmail.com', 'Angel Villa');
    $mail->addAddress('villaangel305@gmail.com');

    //Contenido
    $mail->isHTML(true);
    $mail->Subject='Asunto de prueba';
    $mail->Body='Mensaje de prueba de php mailer';

    $mail->send();
   
}
catch(Exception $e){
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
?>