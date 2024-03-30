<?php

$htmlContent = '<h1>Cliente '.$_POST['Name'].'</h1>
<p>Envia la siguiente información.</p>';
    $tabla="<table>
    <tr><td>Categoría</td><td>".$_POST['name']."</td></tr>  
    <tr><td>Precio</td><td>".$_POST['email']."</td></tr>  
    <tr><td>Lugar comprado</td><td>".$_POST['phone']."</td></tr>  
    <tr><td>Peso del producto</td><td>".$_POST['message']."</td></tr>  
          </table>";
$htmlContent.=$tabla;
$htmlContent.="<p>Factura o comprobante de compra anexada en este correo</p>";

$message = "<!DOCTYPE html>
<html>
<head>
<title>Notificacion orden</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
".$htmlContent."
</body>
</html>";
//$path = "../../paginaWeb/documentos/".$_SESSION['archivo'];
//echo ( extension_loaded ( 'openssl' )? 'SSL cargado' : 'SSL no cargado' ). "\ n" ;
/**
* This example shows making an SMTP connection with authentication.
*/
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
$mail->SMTPDebug = 0;
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPSecure = 'ssl';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'mpanameno.clg@gmail.com';
//Password to use for SMTP authentication
$mail->Password = 'Inicio01';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;
//Set who the message is to be sent from
$mail->setFrom('mpanameno.clg@gmail.com', 'Notificaciones CLG');
//Set an alternative reply-to address
//$mail->addReplyTo('correo@dominio.tld', 'Magic');
//Set who the message is to be sent to
$mail->addAddress('tcpanameno@gmail.com', 'John Doe');
$mail->IsHTML(true);
//Set the subject line
$mail->Subject = 'Notificacion de mensaje en CLG';
//$mail->AddAttachment($path); 
$mail->Body = $message; // Mensaje a enviar
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Message sent!';
}
?>