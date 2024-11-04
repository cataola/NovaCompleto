<?php
session_start();
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar usuario en la base de datos
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            // Redirigir a la página de inicio
            header("Location: novaAcademy.php");
        } else {
            $_SESSION['message'] = "Contraseña incorrecta.";
            header("Location: login.php");
        }
    } else {
        $_SESSION['message'] = "Usuario no encontrado.";
        header("Location: login.php");
    }
}
