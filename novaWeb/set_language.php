<?php
session_start();

// Define los idiomas permitidos
$allowed_languages = ['es', 'en'];

// Verifica si se ha recibido un idioma
if (isset($_POST['lang']) && in_array($_POST['lang'], $allowed_languages)) {
    $_SESSION['lang'] = $_POST['lang']; // Almacena el idioma en la sesión
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(400); // Código de error 400 para solicitud incorrecta
    echo json_encode(['status' => 'error', 'message' => 'Idioma no válido o no especificado']);
}
?>
