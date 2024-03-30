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

    // Configura el servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mpanameno.clg@gmail.com'; // Tu dirección de correo de Gmail
    $mail->Password = 'casbdxtmqhgkydgo'; // Tu contraseña de Gmail o contraseña de aplicación generada
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configura el remitente y el destinatario
    $mail->setFrom('mpanameno.clg@gmail.com', 'Notificaciones CLG');
    $mail->addAddress('tcpanameno@gmail.com', 'John Doe');

    // Configura el asunto y el cuerpo del mensaje
    $mail->IsHTML(true);
    $mail->Subject = 'Notificacion de mensaje en CLG';
    $mail->Body = $message;

    // Envía el correo
    $mail->send();
    echo 'Correo enviado exitosamente';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $mail->ErrorInfo;
}
?>
