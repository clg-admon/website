<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Mostrar los datos recibidos
    echo "<h2>Datos recibidos:</h2>";
    echo "<p>Nombre: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Teléfono: $phone</p>";
    echo "<p>Mensaje: $message</p>";
} else {
    // Si no se recibieron datos del formulario, mostrar un mensaje de error
    echo "<h2>Error: No se recibieron datos del formulario</h2>";
}
?>