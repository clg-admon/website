<?php
// Verificar si se recibieron datos del formulario
if (!empty($_POST)) {
    // Obtener los datos del formulario
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    
    // Aquí puedes hacer cualquier procesamiento necesario con los datos del formulario
    
    // Devolver el valor '1'
    echo "1";
    echo '<script>alert("Mensaje de alerta desde PHP");</script>';
} else {
    // Si no se recibieron datos del formulario, mostrar un mensaje de error
    echo "Error: No se recibieron datos del formulario";
}
?>
