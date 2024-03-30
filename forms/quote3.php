<?php
// Importa la clase PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carga la biblioteca PHPMailer
require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';

// Instancia PHPMailer
$mail = new PHPMailer(true);
$customerName = $_POST['name'];
$customerEmail = $_POST['email'];


$htmlContent = '<h1>Customer: '.$_POST['name'].'</h1>
<p>Customer Information.</p>';
    $tabla="<table>
    <tr><td>Name: </td><td>".$_POST['name']."</td></tr>  
    <tr><td>Email</td><td>".$_POST['email']."</td></tr>  
    <tr><td>Phone</td><td>".$_POST['phone']."</td></tr>  
    <tr><td>Message</td><td>".$_POST['message']."</td></tr>  
          </table>";
$htmlContent.=$tabla;
$htmlContent.="<p>The Customer requests a call to provide a visit and a quote for a service with CLG</p>";

$message = "<!DOCTYPE html>
<html>
<head>
<title>Email Quote notification</title>

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

try {
    // Configura el servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mpanameno.clg@gmail.com'; // Tu dirección de correo de Gmail
    $mail->Password = 'casbdxtmqhgkydgo'; // Tu contraseña de Gmail o contraseña de aplicación generada
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configura el remitente y el destinatario
    $mail->setFrom($customerEmail, 'New Quote Requested');
    $mail->addAddress($customerEmail, $customerName);

    // Configura el asunto y el cuerpo del mensaje
    $mail->IsHTML(true);
    $mail->Subject = 'New Quote Requested';
    $mail->Body = $message;

    // Envía el correo
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Error sending the email: ', $mail->ErrorInfo;
}
?>
