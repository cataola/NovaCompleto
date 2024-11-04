<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = trim($_POST['new_password']);
    
    // Verificar si el token es válido
    $query = "SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $_SESSION['error'] = "Token inválido o ha expirado.";
        header("Location: reset_password.php");
        exit();
    }

    // Obtener el correo electrónico asociado al token
    $row = $result->fetch_assoc();
    $email = $row['email'];

    // Encriptar la nueva contraseña
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $updateQuery = "UPDATE users SET password = ? WHERE email = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ss", $hashed_password, $email);
    $updateStmt->execute();

    // Eliminar el token de la base de datos
    $deleteQuery = "DELETE FROM password_resets WHERE token = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("s", $token);
    $deleteStmt->execute();

    $_SESSION['success'] = "Contraseña actualizada exitosamente.";
    header("Location: login.php");
    exit();
}
?>
