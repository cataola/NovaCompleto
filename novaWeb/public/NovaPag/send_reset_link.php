<?php
require 'vendor/autoload.php'; // Incluir el autoload de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura el correo electrónico del formulario
    $destinatario = $_POST['email'];

    // Verifica si el correo es válido
    if (!filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido";
        exit;
    }

    $mail = new PHPMailer(true); // Crear una instancia de PHPMailer

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Especifica el servidor SMTP
        $mail->SMTPAuth   = true; // Habilita la autenticación SMTP
        $mail->Username   = 'novaanalytics2024@gmail.com'; // Tu dirección de correo electrónico
        $mail->Password   = 'Admin123123'; // Tu contraseña o contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita TLS
        $mail->Port       = 587; // Puerto TCP para la conexión

        // Configura el remitente y el destinatario
        $mail->setFrom('novaanalytics2024@gmail.com', 'Nova Analytics');
        $mail->addAddress($destinatario); // Correo del destinatario ingresado por el usuario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Restablecimiento de contraseña';

        // Enlace de restablecimiento (enlace de ejemplo; ajusta según tus necesidades)
        $token = bin2hex(random_bytes(16)); // Token aleatorio para mayor seguridad
        $resetLink = "http://localhost/NovaPag/reset_password.php?token=" . $token;

        // Guardar el token en la base de datos asociado al usuario, si fuera necesario

        $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='$resetLink'>$resetLink</a>";
        $mail->AltBody = "Copia y pega el siguiente enlace en tu navegador para restablecer tu contraseña: $resetLink";

        // Enviar el correo
        $mail->send();
        echo 'El enlace de restablecimiento ha sido enviado a tu correo.';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>

