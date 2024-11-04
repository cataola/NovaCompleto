<?php
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Cargar traducciones
$translations = include "languages/$lang.php";
$pageTranslations = $translations['contactoNova']; // Obtén las traducciones específicas para la página principal
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTO  - Nova Analytics</title>
    <link rel="icon" type= "imgage/png" href="imgs/iconos/favicon-32x32.png">
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Archivo CSS local -->
    <link rel="stylesheet" href="estilosComunidadNova.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/select2.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div id="formulario-seccion" class="container-fluid">
            <div class="row w-100">
                <!-- Sección izquierda -->
                <div id="contenedor-encuentranos" class="col-md-6 d-flex flex-column justify-content-start">
                    <div class="txtSeccion">
                        <h1><?php echo $pageTranslations['txtContactoTitulo']; ?></h1>
                        <h5><?php echo $pageTranslations['txtContactoSub']; ?></h5>
                        <p>
                            <?php echo $pageTranslations['txtContactoTexto']; ?>
                        </p>
                    </div>
        
                    <!-- Espaciador -->
                    <div class="my-4"></div>
        
                    <!-- Sección de contacto en fila -->
                    <div id="container-encuentranos" class="d-flex">
                        <div class="contacto2"> <!-- Sección de contacto2 -->
                            <h4><?php echo $pageTranslations['txtSiguenosRedes6']; ?></h4>
                            <a href="#" id="enlaceIg" class="d-flex align-items-center mb-2">
                                <img src="imgs/iconos/imgInstagramNaranjo.png" alt="Instagram" id="imgIg" class="me-2">
                                <span id="txtIg"><?php echo $pageTranslations['txtSiguenosIg6']; ?></span>
                            </a>
                            <a href="#" id="enlaceFb" class="d-flex align-items-center mb-2">
                                <img src="imgs/iconos/imgFacebookNaranjo.png" alt="Facebook" id="imgFb" class="me-2">
                                <span id="txtFb"><?php echo $pageTranslations['txtSiguenosFb6']; ?></span>
                            </a>
                            <a href="#" id="enlaceIn" class="d-flex align-items-center">
                                <img src="imgs/iconos/imgLinkedinNaranjo.png" alt="Linkedin" id="imgIn" class="me-2">
                                <span id="txtIn"><?php echo $pageTranslations['txtSiguenosIn6']; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
        
                <!-- Formulario a la derecha -->
                <div id="contenedor-formulario" class="col-md-6 d-flex justify-content-center align-items-start">
                    <div class="contenedorCotiza">
                        <form id="contactForm" action="#" method="POST">
                            <h1><?php echo $pageTranslations['txtFormulario9']; ?></h1>
                            <h5><?php echo $pageTranslations['txtFormulario10']; ?></h5>
        
                            <div class="mb-3">
                                <input type="text" id="name" name="name" class="form-control" placeholder= <?php echo $pageTranslations['txtNombre9']; ?> required>
                            </div>
        
                            <div class="mb-3">
                                <input type="email" id="email" name="email" class="form-control" placeholder= <?php echo $pageTranslations['txtEmail9']; ?>required>
                            </div>
        
                            <div class="mb-3">
                                <input type="text" id="company" name="company" class="form-control"<?php echo $pageTranslations['txtEmpresa9']; ?> placeholder=>
                            </div>
        
                            <div class="mb-3">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder= <?php echo $pageTranslations['txtCelular9']; ?> required>
                            </div>
        
                            <div class="mb-3">
                                <textarea id="message" name="message" rows="5" class="form-control" placeholder= <?php echo $pageTranslations['txtMensaje9']; ?> required></textarea>
                            </div>
        
                            <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center">
                                <img src="imgs/iconos/mensaje.png" alt="Enviar" id="iconoMensaje" class="me-2">
                                <?php echo $pageTranslations['txtEnviar9']; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </main>
        <script src="js/select2.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script>
            $(document).ready(function() {
                $('#lenguaje').change(function() {
                    var selectedLang = $(this).val(); // Obtiene el idioma seleccionado
                    $.ajax({
                        url: 'set_language.php', // Ruta a tu script PHP que maneja el cambio de idioma
                        type: 'POST',
                        data: { lang: selectedLang },
                    success: function(response) {
                        location.reload(); // Recarga la página para aplicar el nuevo idioma
                    }
                });
            });

            // Mostrar imágenes en el select
            $('#lenguaje option').each(function() {
                var imgSrc = $(this).data('image');
                if (imgSrc) {
                    $(this).css('background-image', 'url(' + imgSrc + ')');
                    $(this).css('background-size', '20px 20px'); // Ajusta el tamaño de la imagen
                    $(this).css('background-repeat', 'no-repeat');
                    $(this).css('padding-left', '30px'); // Espacio para la imagen
                }
            });
        });
    </script>

</body>
</html>
