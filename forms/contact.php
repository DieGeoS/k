<?php
// Dirección de correo de destino
$to = "diegosanche678@gmail.com";

// Verificar que el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);
    
    // Verificar que no hay campos vacíos
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, completa todos los campos del formulario correctamente.";
        exit;
    }
    
    // Crear el contenido del correo
    $email_content = "Nombre: $name\n";
    $email_content .= "Correo: $email\n";
    $email_content .= "Teléfono: $subject\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Encabezados del correo
    $headers = "From: $name <$email>";

    // Enviar el correo
    if (mail($to, "Nuevo mensaje de contacto", $email_content, $headers)) {
        echo "Tu mensaje ha sido enviado exitosamente. Gracias.";
    } else {
        echo "Hubo un problema al enviar tu mensaje. Intenta de nuevo.";
    }
} else {
    echo "Hubo un problema con el envío del formulario. Intenta de nuevo.";
}
?>
