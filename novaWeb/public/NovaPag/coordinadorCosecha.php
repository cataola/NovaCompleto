<?php
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Cargar traducciones
$translations = include "languages/$lang.php";
$pageTranslations = $translations['coordinadorCosecha']; // Obtén las traducciones específicas para la página principal
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador de Cosecha - Nova Analytics</title>
    <link rel="icon" type= "imgage/png" href="imgs/iconos/favicon-32x32.png">
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Archivo CSS local -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilosCoordinadorCosecha.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/select2.min.js"></script>
    
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <div id="bannerAgricola" class="container-fluid p-0 position-relative">
            <img src="imgs/banners/bannerAgricola.png" alt="_blank" class="img-fluid">
            <div id="bannerAgricola-title" class="position-absolute top-50 start-50 translate-middle text-white">
                <h3 class="fw-bold"><?php echo $pageTranslations['txtCoordinacion']; ?></h3>
            </div>
        </div>

        <div id="informacion-seccion">
            <div class="textos">
                <h3><?php echo $pageTranslations['txtServicioCoordinacion']; ?></h3>
                <h1><?php echo $pageTranslations['txtCoordinacion']; ?></h1>
                <div class="txt">
                    <p><?php echo $pageTranslations['txtCoordinacionTexto']; ?></p>
                    <a href="#formulario-seccion" class="btnCotiza"><?php echo $pageTranslations['txtCoordinacionCotiza']; ?></a>
                </div>
                <img src="imgs/cardsServicios/imgCoordinador.jpg" alt="_blank">
            </div>
        </div>

        <div id="contenedor2-cards">
            <div id="titCards2">
                <h1><?php echo $pageTranslations['txtOfrecemos2a']; ?></h1>
                <h4><?php echo $pageTranslations['txtComplementos2b']; ?></h4>
            </div>
            <div class="contCards2">
                <div class="card2-nova card-custom">
                    <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                        <a href="#" id="servicios-icon">
                            <img src="imgs/cardsServicios/software.png" alt="<?php echo $pageTranslations['txtSoftware3a']; ?>">
                        </a>
                        <h3><?php echo $pageTranslations['txtSoftware3a']; ?></h3>
                    </div>
                    <img src="imgs/cardsServicios/imgSoftware.jpg" class="card-img-top" alt="Imagen de Software de Captación de Data">
                    <div class="card2-nova-body">
                        <p><?php echo $pageTranslations['txtSoftware3b']; ?></p>
                        <a href="captacionData.html" class="button"><?php echo $pageTranslations['txtBtnCaptacion3c']; ?></a>
                    </div>
                </div>
                <div class="card2-nova card-custom">
                    <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                        <a href="#" id="servicios-icon"><img src="imgs/cardsServicios/almacenamiento.png" alt="<?php echo $pageTranslations['txtAlmacenamiento3d']; ?>"></a>
                        <h3><?php echo $pageTranslations['txtAlmacenamiento3d']; ?></h3>
                    </div>
                    <img src="imgs/cardsServicios/imgAlmacenamiento.png" class="card-img-top" alt="Imagen de Almacenamiento de Data">
                    <div class="card2-nova-body">
                        <p><?php echo $pageTranslations['txt3Almacenamiento3e']; ?></p>
                        <a href="almacenamientoData.html" class="button"><?php echo $pageTranslations['txtBtnAlmacenamiento3f']; ?></a>
                    </div>
                </div>
                <div class="card2-nova card-custom">
                    <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                        <a href="#" id="servicios-icon"><img src="imgs/cardsServicios/dash.png" alt="<?php echo $pageTranslations['txtDash3g']; ?>"></a>
                        <h3><?php echo $pageTranslations['txtDash3g']; ?></h3>
                    </div>
                    <img src="imgs/cardsServicios/imgDash.jpeg" class="card-img-top" alt="Imagen de Dashboard de Visualización de Data en Tiempo Real">
                    <div class="card2-nova-body">
                        <p><?php echo $pageTranslations['txtDash3h']; ?></p>
                        <a href="dashboardTiempoReal.html" class="button"><?php echo $pageTranslations['txtBtnDash3i']; ?></a>
                    </div>
                </div>
                <div class="card2-nova card-custom">
                    <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                        <a href="#" id="servicios-icon"><img src="imgs/cardsServicios/reporteData.png" alt="<?php echo $pageTranslations['txtReportes2j']; ?>"></a>
                        <h3><?php echo $pageTranslations['txtReportes2j']; ?></h3>
                    </div>
                    <img src="imgs/cardsServicios/imgReportes.jpg" class="card-img-top" alt="Imagen de Reportes con Data Insight">
                    <div class="card2-nova-body">
                        <p><?php echo $pageTranslations['txtReportes3k']; ?></p>
                        <a href="reportesData.html" class="button"><?php echo $pageTranslations['txtBtnReportes3l']; ?></a>
                    </div>
                </div>
                <div class="card2-nova card-custom">
                    <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                        <a href="#" id="servicios-icon"><img src="imgs/cardsServicios/data.png" alt="<?php echo $pageTranslations['txtData2m']; ?>"></a>
                        <h3><?php echo $pageTranslations['txtData2m']; ?></h3>
                    </div>
                    <img src="imgs/cardsServicios/imgData.jpg" class="card-img-top" alt="Imagen de Data Analytics">
                    <div class="card2-nova-body">
                        <p><?php echo $pageTranslations['txtData3n']; ?></p>
                        <a href="dataAnalytics.html" class="button"><?php echo $pageTranslations['txtBtnData2o']; ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="formulario-seccion" class="container-fluid">
            <div class="row w-100">
                <!-- Sección izquierda -->
                <div id="contenedor-encuentranos" class="col-md-6 d-flex flex-column justify-content-start">
                    <div class="txtSeccion">
                        <h1><?php echo $pageTranslations['txtCotiza2p']; ?></h1>
                        <h5><?php echo $pageTranslations['txtCotiza3q']; ?></h5>
                        <p><?php echo $pageTranslations['txt3Cotiza4r']; ?></p>
                    </div>

                    <!-- Espaciador -->
                    <div class="my-4"></div>

                    <!-- Sección de contacto en fila -->
                    <div id="container-encuentranos" class="d-flex">
                        <div class="contacto"> <!-- Espaciado a la derecha -->
                            <h4 class="small"><?php echo $pageTranslations['txtEncuentranos2s']; ?></h4>
                            <div class="d-flex align-items-center mb-2">
                                <img src="imgs/iconos/imgMensajeNaranjo.png" alt="Correo" id="imgCorreo" class="me-2">
                                <p id="txtCorreo" class="mb-0"><?php echo $pageTranslations['txtCorreo2t']; ?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="imgs/iconos/imgTelefonoNaranjo.png" alt="Teléfono" id="imgTelefono" class="me-2">
                                <p id="txtTelefono" class="mb-0"><?php echo $pageTranslations['txtTelefono2u']; ?></p>
                            </div>
                        </div>

                        <div class="contacto2"> <!-- Sección de contacto2 -->
                            <h4><?php echo $pageTranslations['txtSiguenos2v']; ?></h4>
                            <a href="https://www.instagram.com/novaanalytics.cl/" target="_blank" id="enlaceIg" class="d-flex align-items-center mb-2">
                                <img src="imgs/iconos/imgInstagramNaranjo.png" alt="Instagram" id="imgIg" class="me-2">
                                <span id="txtIg"><?php echo $pageTranslations['txtIg2w']; ?></span>
                            </a>
                            <a href="https://web.facebook.com/Novaproduce.cl" target="_blank" id="enlaceFb" class="d-flex align-items-center mb-2">
                                <img src="imgs/iconos/imgFacebookNaranjo.png" alt="Facebook" id="imgFb" class="me-2">
                                <span id="txtFb"><?php echo $pageTranslations['txtFb2x']; ?></span>
                            </a>
                            <a href="https://www.linkedin.com/company/nova-analytic" target="_blank" id="enlaceIn" class="d-flex align-items-center">
                                <img src="imgs/iconos/imgLinkedinNaranjo.png" alt="Linkedin" id="imgIn" class="me-2">
                                <span id="txtIn"><?php echo $pageTranslations['txtIn2y']; ?></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Formulario a la derecha -->
                <div id="contenedor-formulario" class="col-md-6 d-flex justify-content-center align-items-start">
                    <div class="contenedorCotiza">
                        <form id="contactForm" action="#" method="POST">
                            <h1><?php echo $pageTranslations['txtFormulario2z']; ?></h1>
                            <h5><?php echo $pageTranslations['txtFormulario3aa']; ?></h5>

                            <div class="mb-3">
                                <input type="text" id="name" name="name" class="form-control" placeholder="<?php echo $pageTranslations['txtNombre2ab']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <input type="email" id="email" name="email" class="form-control" placeholder="<?php echo $pageTranslations['txtEmail2ac']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" id="company" name="company" class="form-control" placeholder="<?php echo $pageTranslations['txtEmpresa2ad']; ?>">
                            </div>

                            <div class="mb-3">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="<?php echo $pageTranslations['txtCelular2ae']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <textarea id="message" name="message" rows="5" class="form-control" placeholder="<?php echo $pageTranslations['txtMensaje2af']; ?>" required></textarea>
                            </div>

                            <div id="prefContacto" class="mb-3">
                                <p><?php echo $pageTranslations['txtPreferenciaContacto2ag']; ?></p>
                            </div>

                            <div class="preferencia d-flex justify-content-start mb-4">
                                <div class="form-check me-3">
                                    <input type="checkbox" id="contactPhone" name="contactPreference" value="phone" class="form-check-input">
                                    <label for="contactPhone" class="form-check-label"><?php echo $pageTranslations['txtPreferenciaContactoLlamada12ah']; ?></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="contactEmail" name="contactPreference" value="email" class="form-check-input">
                                    <label for="contactEmail" class="form-check-label"><?php echo $pageTranslations['txtPreferenciaContactoCorreo2ai']; ?></label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center">
                                <img src="imgs/iconos/mensaje.png" alt="Enviar" id="iconoMensaje" class="me-2">
                                <span><?php echo $pageTranslations['txtEnviar2aj']; ?></span>
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