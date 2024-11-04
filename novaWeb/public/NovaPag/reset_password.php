<?php
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Verificar si se ha recibido un cambio de idioma en la URL
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}

$translations = include realpath(__DIR__ . '/../../resources/languages/' . $lang . '.php');

$pageTranslations = $translations['ResetPSW']; // Accede a las traducciones de la página de inicio de sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <h2><?php echo $pageTranslations["restablecerContra"]; ?></h2>

        <!-- Mostrar mensajes de alerta -->
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger mt-3">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success mt-3">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <form method="POST" action="send_reset_link.php">
            <div class="mb-3">
                <label for="email" class="form-label"><?php echo $pageTranslations["ingresoCorreo"]; ?></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $pageTranslations["enviarEnlace"]; ?></button>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script> <!-- Asegúrate de incluir Bootstrap JS -->
</body>
</html>
