<?php
session_start();

// Incluir la conexión a la base de datos
include 'config.php';

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    // Validar que los campos no estén vacíos
    if (empty($username) || empty($password) || empty($email)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: register.php");
        exit();
    }

    // Validar si el nombre de usuario ya existe
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "El nombre de usuario ya está en uso.";
        header("Location: register.php");
        exit();
    }

    // Encriptar la contraseña antes de almacenarla
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos
    $insertQuery = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("sss", $username, $hashed_password, $email);

    if ($insertStmt->execute()) {
        $_SESSION['success'] = "Registro exitoso. Puedes iniciar sesión ahora.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Ocurrió un error al registrar el usuario.";
        header("Location: register.php");
        exit();
    }

    // Cerrar la conexión
    $stmt->close();
    $insertStmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = "Método de solicitud no permitido.";
    header("Location: register.php");
    exit();
}
?>
