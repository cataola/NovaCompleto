<?php
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Cargar traducciones
$translations = include "languages/$lang.php";
$pageTranslations = $translations['nuestroEquipo']; // Obtén las traducciones específicas para la página principal
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type= "imgage/png" href="imgs/iconos/favicon-32x32.png">
    <title>Nuestro  Equipo  - Nova Analytics</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Archivo CSS local -->
    <link rel="stylesheet" href="estilonuestroequipo.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/select2.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <!-- Sección de equipo -->
        <div id="bannerAgricola" class="container-fluid p-0 position-relative">
            <img src="imgs/banners/bannerAgricola.png" alt="_blank" class="img-fluid">
            <div id="bannerAgricola-title" class="position-absolute top-50 start-50 translate-middle text-white">
                <h3 class="fw-bold"><?php echo $pageTranslations['txtEquipoTitulo1']; ?></h3>
                <h1 class="fw-bold"><?php echo $pageTranslations['txtConocenosTitulo2']; ?></h1>
            </div>
        </div>
        <!-- Sección Crecimiento y Excelencia -->
        <div id="banner-campo" class="container-fluid">
            <div class="row align-items-center">
                <!-- Columna del logo -->
                <div id="banner-logo" class="col-md-6 text-center">
                    <img src="imgs/logos/Logo-2024-sin-fondo-1-1024x683.png" alt="Logo" class="img-fluid">
                </div>
                <!-- Columna con imagen de fondo, título y texto -->
                <div id="campo-container" class="col-md-6">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <!-- Título -->
                        <h2 class="text-center"><?php echo $pageTranslations['txtCrecimientoTitle3']; ?></h2>
                        <!-- Texto -->
                        <p class="text-center"><?php echo $pageTranslations['txtCrecimientoText4']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Conócenos -->
        <div id="seccionequipos" class="py-5 bg-light">
            <div id="cinco" class="container text-center">
                <section class="seccionconectados">
                    <h1><?php echo $pageTranslations['txtConocenosEquipo5']; ?></h1>
                    <p><?php echo $pageTranslations['txtConocenosSubtitulo6']; ?></p>
                    <a><?php echo $pageTranslations['txtConocenosText7']; ?></a>
                </section>
            </div>
            <div>
                <!-- Carrusel -->
                <div id="carruselEquipo" class="carousel slide text-center" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner">
                        <!-- Primera sección del carrusel -->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="imgs/carrusel/1Carolina.png" class="d-block img-fluid mx-auto" alt="Carola Carrasco">
                                    <h5><?php echo $pageTranslations['txtCarolaNombre8']; ?></h5>
                                    <p><?php echo $pageTranslations['txtCarolaRol9']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <img src="imgs/carrusel/2Belen.png" class="d-block img-fluid mx-auto" alt="Belen Vera">
                                    <h5><?php echo $pageTranslations['txtBelenNombre10']; ?></h5>
                                    <p><?php echo $pageTranslations['txtBelenRol11']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <img src="imgs/carrusel/3Patricia.png" class="d-block img-fluid mx-auto" alt="Patricia Mendez">
                                    <h5><?php echo $pageTranslations['txtPatriciaNombre12']; ?></h5>
                                    <p><?php echo $pageTranslations['txtPatriciaRol13']; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Segunda sección del carrusel -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="imgs/carrusel/5Karina.png" class="d-block img-fluid mx-auto" alt="Karina Rojas">
                                    <h5><?php echo $pageTranslations['txtKarinaNombre14']; ?></h5>
                                    <p><?php echo $pageTranslations['txtKarinaRol15']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <img src="imgs/carrusel/6Nicolas.png" class="d-block img-fluid mx-auto" alt="Nicolas San Martin Freire">
                                    <h5><?php echo $pageTranslations['txtNicolasNombre16']; ?></h5>
                                    <p><?php echo $pageTranslations['txtNicolasRol17']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <img src="imgs/carrusel/7Sebastian.png" class="d-block img-fluid mx-auto" alt="Sebastian Bello">
                                    <h5><?php echo $pageTranslations['txtSebastianNombre18']; ?></h5>
                                    <p><?php echo $pageTranslations['txtSebastianRol19']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Controles del carrusel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carruselEquipo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carruselEquipo" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sección de Bienestar y Eficiencia -->
        <div id="termometro-cartas" class="fondo py-5">
            <div id="contenedor-cartas" class="container">
                <div class="row">
                    <!-- Carta 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="carta d-flex align-items-start bg-white rounded shadow p-4">
                            <!-- Botón con ícono -->
                            <div class="icono-container me-3">
                                <button id="icono-ojo" class="btn-ojo mb-3">
                                    <img src="../NovaPag/imgs/iconos/iconoojo.png" alt="Icono de ojo" class="img-fluid">
                                </button>
                            </div>
                            <!-- Contenido de la carta -->
                            <div>
                                <h2><?php echo $pageTranslations['txtBienestarTitulo20']; ?></h2>
                                <p><?php echo $pageTranslations['txtBienestarTexto21']; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Carta 2 -->
                    <div class="col-md-6 mb-4">
                        <div class="carta2 d-flex align-items-start bg-white rounded shadow p-4">
                            <!-- Botón con ícono -->
                            <div class="icono-container me-3">
                                <button class="btn-verduras mb-3">
                                    <img src="../NovaPag/imgs/iconos/iconoverduras.png" alt="Icono de verduras" class="img-fluid">
                                </button>
                            </div>
                            <!-- Contenido de la carta -->
                            <div>
                                <h2><?php echo $pageTranslations['txtCapacitacionTitulo22']; ?></h2>
                                <p><?php echo $pageTranslations['txtCapacitacionTexto23']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de contacto -->
        <div id="banner-contacto" class="text-center py-5">
            <div id="banner-conectarses" class="d-flex flex-column align-items-center justify-content-center text-center">
                <h1 class="text-white mb-3"><b><?php echo $pageTranslations['txtContactoTitulo24']; ?></b></h1>
                <h2 class="text-white mb-4"><?php echo $pageTranslations['txtContactoTexto25']; ?></h2>
                <a href="#" class="btn btn-conectar mt-3"><?php echo $pageTranslations['txtBotonConectar26']; ?></a>
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