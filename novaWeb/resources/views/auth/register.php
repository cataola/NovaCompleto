<?php
session_start();
include "config.php"; // Asegúrate de tener la conexión a la base de datos en este archivo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validaciones
    $errors = [];

    // Verificar si el nombre de usuario ya existe
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "El nombre de usuario ya está en uso.";
    }

    // Verificar si el correo electrónico ya existe
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "El correo electrónico ya está en uso.";
    }

    // Validar formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del correo electrónico no es válido.";
    }

    // Si hay errores, guardarlos en la sesión y redirigir
    if (!empty($errors)) {
        $_SESSION['message'] = implode("<br>", $errors);
        header("Location: register.php");
        exit();
    }

    // Si no hay errores, proceder con el registro
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $hashedPassword, $email);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Registro exitoso. Puedes iniciar sesión.";
        header("Location: login.php");
        exit(); // Asegúrate de salir después de la redirección
    } else {
        $_SESSION['message'] = "Error al registrar. Inténtalo de nuevo.";
        header("Location: register.php");
        exit();
    }
}

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Verificar si se ha recibido un cambio de idioma en la URL
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}

$translations = include realpath(__DIR__ . '/../../languages/' . $lang . '.php');
$pageTranslations = $translations['registro']; // Accede a las traducciones de la página de registro
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Nova Analytics</title>
    <link rel="icon" type="image/png" href="NovaPag/imgs/iconos/favicon-32x32.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="<?= asset('NovaPag/css/bootstrap.min.css') ?>" rel="stylesheet"> <!-- Archivo CSS local -->
    <link rel="stylesheet" href="<?= asset('NovaPag/css/estiloRegistro.css') ?>">
</head>
<body class="bg-light">
    <div id="registration-container" class="container d-flex flex-column justify-content-center align-items-center vh-100 position-relative">
        <div class="text-center position-absolute" style="top: 20px;">
            <img src="<?php echo asset('NovaPag/imgs/logos/Logo-2024-sin-fondo-1-1024x683.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 150px;">
        </div>

        <div id="registration-card" class="card p-4" style="width: 400px;">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['message']) ?></div>
                <?php unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo ?>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label"><?= htmlspecialchars($pageTranslations["usuario"]) ?></label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><?= htmlspecialchars($pageTranslations["contraseña"]) ?></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><?= htmlspecialchars($pageTranslations["correoUsuario"]) ?></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <button type="submit" class="btn btn-primary w-100"><?= htmlspecialchars($pageTranslations["registrar"]) ?></button>
            </form>
        </div>
        
        <!-- Enlace para volver a iniciar sesión -->
        <div class="mt-3">
            <a href="login"><?php echo $pageTranslations["back_to_login"]; ?></a>
        </div>

        <div id="language-selection" class="mt-4 d-flex flex-column align-items-center">
            <div class="mt-3 text-center">
                <form method="get" action="">
                    <select id="language-select" name="lang" class="form-select wide-select" onchange="this.form.submit()">
                        <option data-image="<?php echo asset('NovaPag/imgs/iconos/bandera.png'); ?>" value="es" <?php echo ($lang == 'es') ? 'selected' : ''; ?>>Español</option>
                        <option data-image="<?php echo asset('NovaPag/imgs/iconos/estados-unidos.png'); ?>" value="en" <?php echo ($lang == 'en') ? 'selected' : ''; ?>>English</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="<?= asset('NovaPag/js/bootstrap.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        function formatOption(option) {
            if (!option.id) return option.text;
            var img = $(option.element).data('image');
            return $('<span><img src="' + img + '" style="width: 20px; height: 20px; margin-right: 5px;"> ' + option.text + '</span>');
        }

        $('#language-select').select2({
            templateResult: formatOption,
            templateSelection: formatOption,
            minimumResultsForSearch: Infinity // Oculta la barra de búsqueda
        });
    });
</script>
</html>
