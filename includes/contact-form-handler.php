<?php
header('Content-Type: application/json');

// Validación básica de campos
$nombre  = trim($_POST['nombre'] ?? '');
$email   = trim($_POST['email'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

if ($nombre === '' || $email === '' || $mensaje === '') {
    echo json_encode(['success' => false, 'error' => 'Todos los campos son obligatorios.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'El correo electrónico no es válido.']);
    exit;
}

// Configuración del correo
$to      = 'contacto@norttek.com.mx'; // Cambia por tu correo real
$subject = "Nuevo mensaje de contacto desde el sitio web";
$body    = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";
$headers = "From: noreply@norttek.com.mx\r\nReply-To: $email\r\n";

// Enviar correo
if (mail($to, $subject, $body, $headers)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'No se pudo enviar el mensaje. Intenta más tarde.']);
}
?>