<?php
// Verificar si se recibieron datos del formulario
if (!empty($_POST)) {
    // Obtener los datos del formulario
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    
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