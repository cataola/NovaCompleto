<?php
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Cargar traducciones
$translations = include "languages/$lang.php";
$pageTranslations = $translations['comunidadNova']; // Obtén las traducciones específicas para la página principal
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComunidadNova</title>
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
                            <h1><?php echo $pageTranslations["txtComunidadTitulo1"]; ?></h1>
                            <h5><?php echo $pageTranslations["txtComunidadSub"]; ?></h1></h5>
                            <p>
                                <?php echo $pageTranslations["txtComunidadTexto"]; ?></h1> 
                            </p>
                        </div>
            
                        <!-- Espaciador -->
                        <div class="my-4"></div>
            
                        <!-- Sección de contacto en fila -->
                        <div id="container-encuentranos" class="d-flex">
                            <div class="contacto"> <!-- Espaciado a la derecha -->
                                <h4 class="small">ENCUÉNTRANOS</h4>
                                <div class="d-flex align-items-center mb-2">
                                    <img src="imgs/iconos/imgMensajeNaranjo.png" alt="Correo" id="imgCorreo" class="me-2">
                                    <p id="txtCorreo" class="mb-0">contacto@novaproduce.cl</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="imgs/iconos/imgTelefonoNaranjo.png" alt="Teléfono" id="imgTelefono" class="me-2">
                                    <p id="txtTelefono" class="mb-0">+569 7232 2388</p>
                                </div>
                            </div>
            
                            <div class="contacto2"> <!-- Sección de contacto2 -->
                                <h4>SÍGUENOS</h4>
                                <a href="#" id="enlaceIg" class="d-flex align-items-center mb-2">
                                    <img src="imgs/iconos/imgInstagramNaranjo.png" alt="Instagram" id="imgIg" class="me-2">
                                    <span id="txtIg">Instagram</span>
                                </a>
                                <a href="#" id="enlaceFb" class="d-flex align-items-center mb-2">
                                    <img src="imgs/iconos/imgFacebookNaranjo.png" alt="Facebook" id="imgFb" class="me-2">
                                    <span id="txtFb">Facebook</span>
                                </a>
                                <a href="#" id="enlaceIn" class="d-flex align-items-center">
                                    <img src="imgs/iconos/imgLinkedinNaranjo.png" alt="Linkedin" id="imgIn" class="me-2">
                                    <span id="txtIn">Linkedin</span>
                                </a>
                            </div>
                        </div>
                    </div>
            
                    <!-- Formulario a la derecha -->
                    <div id="contenedor-formulario" class="col-md-6 d-flex justify-content-center align-items-start">
                        <div class="contenedorCotiza">
                            <form id="contactForm" action="#" method="POST">
                                <h1>Formulario</h1>
                                <h5>___</h5>
            
                                <div class="mb-3">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>
                                </div>
            
                                <div class="mb-3">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo" required>
                                </div>
            
                                <div class="mb-3">
                                    <input type="text" id="company" name="company" class="form-control" placeholder="Empresa">
                                </div>
            
                                <div class="mb-3">
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Teléfono/Celular" required>
                                </div>
            
                                <div class="mb-3">
                                    <textarea id="message" name="message" rows="5" class="form-control" placeholder="Mensaje" required></textarea>
                                </div>
            
                                <div id="prefContacto" class="mb-3">
                                    <p>Prefiero ser contactado por:</p>
                                </div>
            
                                <div class="preferencia d-flex justify-content-start mb-4">
                                    <div class="form-check me-3">
                                        <input type="checkbox" id="contactPhone" name="contactPreference" value="phone" class="form-check-input">
                                        <label for="contactPhone" class="form-check-label">Llamada</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="contactEmail" name="contactPreference" value="email" class="form-check-input">
                                        <label for="contactEmail" class="form-check-label">Correo Electrónico</label>
                                    </div>
                                </div>
            
                                <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center">
                                    <img src="imgs/iconos/mensaje.png" alt="Enviar" id="iconoMensaje" class="me-2">
                                    Enviar
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
    <script>
        function nextStep(step) {
            if (step === 1) {
                document.getElementById('formStep1').style.display = 'block';
                document.getElementById('formStep2').style.display = 'none';
            } else {
                document.getElementById('formStep1').style.display = 'none';
                document.getElementById('formStep2').style.display = 'block';
            }
        }

    </script> 

</body>
</html>

