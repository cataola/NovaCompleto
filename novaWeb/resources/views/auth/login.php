<?php
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Verificar si se ha recibido un cambio de idioma en la URL
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}

$translations = include realpath(__DIR__ . '/../../languages/' . $lang . '.php');

$pageTranslations = $translations['loggin']; // Accede a las traducciones de la página de inicio de sesión
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceder - Nova Analytics</title>
    <link rel="icon" type="image/png" href="NovaPag/imgs/iconos/favicon-32x32.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link  href="<?= asset('NovaPag/css/bootstrap.min.css') ?>" rel="stylesheet"> <!-- Archivo CSS local -->
    <link rel="stylesheet" href="<?= asset('NovaPag/css/estilosLoggin.css') ?>">
</head>
<body class="bg-light">
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100 position-relative">
        <!-- Logo posicionado arriba de la tarjeta -->
        <div class="text-center position-absolute" style="top: 20px;">
            <img src="<?php echo asset('NovaPag/imgs/logos/Logo-2024-sin-fondo-1-1024x683.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 150px;">
        </div>

        <!-- Tarjeta de login -->
        <div class="card p-4" style="width: 400px;">
            <form id="loginForm"  method="POST" action="novaAcademy.php">
                <div class="mb-3">
                    <label for="username" class="form-label"><?php echo $pageTranslations["username"]; ?></label>
                    <input type="email" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><?php echo $pageTranslations["password"]; ?></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <!-- Botón de envío -->
                <button type="submit" class="btn btn-primary w-100"><?php echo $pageTranslations["access"]; ?></button>
                <p id="errorMessage" class="text-danger mt-3" style="display: none;"></p>
            </form>
        </div>

        <!-- Divs debajo del cuadro blanco, alineados verticalmente -->
        <div class="mt-4 d-flex flex-column align-items-center">
            <!-- Enlaces centrados -->
            <div class="text-center">
                <a href="NovaPag/reset_password.php"><?php echo $pageTranslations["reset_password"]; ?></a><br>
                <a href="register"><?php echo $pageTranslations["sign-up"]; ?></a><br>
                <a href="NovaPag/index.php"><?php echo $pageTranslations["back_to_home"]; ?></a>
            </div>

            <!-- Selector de idioma centrado debajo de los enlaces -->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="<?= asset('NovaPag/js/bootstrap.min.js') ?>"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Previene el envío del formulario de manera tradicional
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');
            
            try {
                // Enviar las credenciales al backend utilizando Axios
                const response = await axios.post('http://127.0.0.1:8000/api/login', {
                    email: username,
                    password: password
                });

                // Almacenar el token en localStorage
                localStorage.setItem('token', response.data.token);

                // Redirigir al usuario a la página principal tras el login
                window.location.href = '/dashboard'; // Cambia esta URL a la ruta de tu dashboard
            } catch (error) {
                // Mostrar mensaje de error si las credenciales son incorrectas
                errorMessage.textContent = 'Credenciales incorrectas. Por favor, intenta de nuevo.';
                errorMessage.style.display = 'block';
            }
        });
    </script>
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
</body>



</html>
