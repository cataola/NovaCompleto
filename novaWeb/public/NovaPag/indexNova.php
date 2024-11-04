<?php
// Inicia la sesión
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Verificar si se ha recibido un cambio de idioma en la URL
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}


$translations = include realpath(__DIR__ . '/../../resources/languages/' . $lang . '.php');

$pageTranslations = $translations['indexNova']; // Accede a las traducciones de la página de inicio de sesión
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>Nova Analytics</title>
    <link rel="icon" type= "imgage/png" href="NovaPag/imgs/iconos/favicon-32x32.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="<?= asset('NovaPag/css/bootstrap.min.css') ?>" rel="stylesheet"> <!-- Archivo CSS local -->
    <link rel="stylesheet" href="<?= asset('NovaPag/css/estilosIndexNova.css') ?>">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div id="banner-section" class="container-fluid p-0 position-relative">
            <img src="<?php echo asset('NovaPag/imgs/banners/campo.png'); ?>" alt="Campo" class="img-fluid">

            
            <div  class="position-absolute top-50 start-50 translate-middle text-white">
                <h3 id="bannerTitle" class="fw-bold"><?php echo $pageTranslations["bannerTitle"]; ?></h3>
                <h5 id="bannerSubtitle"><?php echo $pageTranslations["bannerSubtitle"]; ?></h5>
                <a href="formularioRequerimientos.php" class="btn" id="bannerButton"><?php echo $pageTranslations["bannerButton"]; ?></a>
            </div>
        </div>

        <div id="main-container" class="d-flex">
            <!-- Sección del video -->
            <div id="video-section" class="w-60">
                <video controls class="w-100 h-100 object-fit-cover">
                    <source src="{{ asset('NovaPag/vid/campoVid.mp4') }}" type="video/mp4">
                </video>
            </div>
        
            <!-- Sección derecha (título y carrusel) -->
            <div id="right-section" class="w-40 d-flex flex-column">
                <!-- Título "Nuestros Clientes" -->
                <div id="clients-title" class="p-3">
                    <h1 class="fw-bold text-center"><?php echo $pageTranslations["NuestrosClientes"]; ?></h1>
                </div>
        
                <!-- Carrusel de clientes -->
                <div id="clients-carousel-container" class="container d-flex align-items-center justify-content-center flex-grow-1">
                    <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <!-- Contenedor de las imágenes del carrusel -->
                        <div class="carousel-inner"> 
                            <div id="client-img1" class="carousel-item active">
                                <img src="<?= asset('NovaPag/imgs/clientes/classic.png') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <div id="client-img2" class="carousel-item">
                                <img src="<?= asset('NovaPag/imgs/clientes/fruveg.webp') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <div id="client-img3" class="carousel-item">
                                <img src="<?= asset('NovaPag/imgs/clientes/illume.png') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <div id="client-img4" class="carousel-item">
                                <img src="<?= asset('NovaPag/imgs/clientes/jonh.png') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <div id="client-img5" class="carousel-item">
                                <img src="<?= asset('NovaPag/imgs/clientes/mayrson.png') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <div id="client-img6" class="carousel-item">
                                <img src="<?= asset('NovaPag/imgs/clientes/nathel.jpg') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <div id="client-img7" class="carousel-item">
                                <img src="<?= asset('NovaPag/imgs/clientes/sanmariano.png') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <div id="client-img8" class="carousel-item">
                                <img src="<?= asset('NovaPag/imgs/clientes/terra.png') ?>" alt="Classic" class="d-block w-100 clientes-carousel-image">
                            </div>
                            <!-- Sigue añadiendo más imágenes de clientes -->
                        </div>

        
                        <!-- Controles de navegación del carrusel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#clientsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
        
                        <button class="carousel-control-next" type="button" data-bs-target="#clientsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        

            <div id="contenedor-diagrama">
                <div id="image-section">
                    <!-- Espacio para la imagen -->
                    <img src="<?= asset('NovaPag/imgs/cardsServicios/imgCalidad.jpg') ?>" alt="Diagrama" class="img-placeholder">
                </div>
            </div>
            <!-- Contenedor principal del carrusel con fondo blanco y centrado -->
            <div id="servicios-cards-section" class="container-fluid bg-white d-flex justify-content-center align-items-center vh-100">
                <div id="services-carousel-container" class="position-relative">
                    <section id="services-carousel-heading" class="text-center mb-4">
                        <h1><?php echo $pageTranslations["descripcionServicios"]; ?><b></b></h1>
                    </section>
                    <div id="services-carousel" class="carousel slide">
                        <div class="carousel-inner">
                            <!-- Primer grupo de 4 tarjetas -->
                            <div class="carousel-item active">
                                <div id="services-carousel-cards-1" class="services-carousel-cards">
                                    <!-- Card 1 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $pageTranslations["inspectorGeneral"]; ?></h2>
                                            <div class="card_image mb-3">
                                                <img src="<?= asset('NovaPag/imgs/carrusel2/inspectorG.jpg') ?>" alt="Inspector General" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["inspectorServicios"]; ?><br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 2 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $pageTranslations["controlLabores"]; ?></h2>
                                            <div class="card_image mb-3">
                                                <img src="<?= asset('NovaPag/imgs/carrusel2/modLabores.jpg') ?>" alt="Módulo de Control de Labores" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["controlServicios"]; ?><br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 3 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $pageTranslations["moduloBodega"]; ?></h2>
                                            <div class="card_image mb-3">
                                            <img src="<?= asset('NovaPag/imgs/carrusel2/modBodega.jpg') ?>" alt="Módulo de Bodega Fitosanitaria" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["bodegaServicios"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 4 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $pageTranslations["software"]; ?></h2>
                                            <div class="card_image mb-3">
                                                <img src="<?= asset('NovaPag/imgs/carrusel2/modUnificacion.jpg') ?>" alt="Módulo de Unificación de Software Integrada" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["softwareServicios"]; ?><br></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Segundo grupo de 4 tarjetas -->
                            <div class="carousel-item">
                                <div id="services-carousel-cards-2" class="services-carousel-cards">
                                    <!-- Card 5 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $pageTranslations["integral"]; ?></h2>
                                            <div class="card_image mb-3">
                                                <img src="<?= asset('NovaPag/imgs/carrusel2/modIntegral.jpg') ?>" alt="Módulo Integral de Calidad" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["integralServicios"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 6 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $pageTranslations["cosecha"]; ?></h2>
                                            <div class="card_image mb-3">
                                                <img src="<?= asset('NovaPag/imgs/carrusel2/modEstimacion.jpg') ?>" alt="Módulo de Estimación de Cosecha" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["cosechaServicios"]; ?><br><br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 7 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2  class="card-title"><?php echo $pageTranslations["historicas"]; ?></h2>
                                            <div class="card_image mb-3">
                                                <img src="<?= asset('NovaPag/imgs/carrusel2/dig.jpg') ?>" alt="Digitalización de Data Histórica" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["historicaServicios"]; ?><br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 8 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="card-title"><?php echo $pageTranslations["tecnicas"]; ?></h2>
                                            <div class="card_image mb-3">
                                                <img src="<?= asset('NovaPag/imgs/carrusel2/modGestion.jpg') ?>" alt="Módulo de Gestión de Asesorías Técnicas" class="picture img-fluid">
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $pageTranslations["tecnicasServicios"]; ?></p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Controles de navegación del carrusel -->
                        <button id="services-carousel-prev" class="carousel-control-prev" type="button" data-bs-target="#services-carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button id="services-carousel-next" class="carousel-control-next" type="button" data-bs-target="#services-carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <div id="nova">
                <div id="nova-section" class="container-fluid py-5">
                    <div id="containerSeccionNova" class="row">
                        <!-- Texto sección 1 -->
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="txtSeccion1 text-white">
                                <p><?php echo $pageTranslations["pSeccion1"]; ?></p>
                            </div>
                        </div>
                        <!-- Imagen 1 -->
                        <div class="col-md-6">
                            <div class="imgNova1">
                                <img src="<?= asset('NovaPag/imgs/seccNova/seccionNova2.jpg') ?>" alt="Imagen 1" class="img-fluid">
                            </div>
                        </div>
                    </div>
            
                    <div class="row py-5">
                        <!-- Imagen 2 y Texto sección 2 en la misma fila -->
                        <div class="col-md-6">
                            <div class="imgNova2">
                                <img src="<?= asset('NovaPag/imgs/seccNova/seccionNova1.jpg') ?>" alt="Imagen 2" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="txtSeccion2 text-white">
                                <p><?php echo $pageTranslations["pSeccion2"]; ?></p>
                            </div>
                        </div>
                    </div>
            
                    <div class="row py-5">
                        <!-- Imagen 3 -->
                        <div class="col-md-6">
                            <div class="imgNova3">
                                <img src="<?= asset('NovaPag/imgs/seccNova/seccionNova3.jpg') ?>" alt="Imagen 3" class="img-fluid">
                            </div>
                        </div>
                        <!-- Imagen 4 -->
                        <div class="col-md-6">
                            <div class="imgNova4">
                                <img src="<?= asset('NovaPag/imgs/seccNova/seccionNova4.jpg') ?>" alt="Imagen 4" class="img-fluid">
                            </div>
                        </div>
                    </div>
            
                    <!-- Título inteligencia -->
                    <div id="titInteligencia" class="text-center py-5 text-white">
                        <h1><?php echo $pageTranslations["pInteligencia"]; ?></h1>
                    </div>
                </div>
            </div>

            <div id="contenedor-cards-nova">
                <div id="titCards1" class="text-center">
                    <h1><?php echo $pageTranslations["serviciosIyC"]; ?></h1>
                    <h4><?php echo $pageTranslations["subtServiciosIyC"]; ?></h4>
                </div>
                <div class="contCards">
                    <!-- Tarjeta 1 -->
                    <div class="card-nova card-custom">
                        <div id="icon-nova-tit" class="icon-nova-title d-flex align-items-center justify-content-center">
                            <a href="#" id="servicios-icon">
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/lupa.png') ?>" alt="Inspección de Labores">
                            </a>
                            <h3><?php echo $pageTranslations["cardLabores"]; ?></h3>
                        </div>
                            <img src="<?= asset('NovaPag/imgs/cardsServicios/imgLabores.jpg') ?>" class="card-img-top" alt="Imagen de Inspección de Labores">
                        <div class="card-nova-body">
                            <p class="card-nova-text"><?php echo $pageTranslations["txtCardLabores"]; ?><br></p>
                            <a href="inspeccionLabores.html" class="button"><?php echo $pageTranslations["btnCardIL"]; ?></a>
                        </div>
                    </div>
                    <!-- Tarjeta 2 -->
                    <div class="card-nova card-custom">
                        <div id="icon-nova-tit" class="icon-nova-title d-flex align-items-center justify-content-center">
                            <a href="#" id="servicios-icon">
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/escudo.png') ?>" alt="Inspección de Calidad">
                            </a>
                            <h3><?php echo $pageTranslations["cardCalidad"]; ?></h3>
                        </div>
                            <img src="<?= asset('NovaPag/imgs/cardsServicios/imgCalidad.jpg') ?>" class="card-img-top" alt="Imagen de Inspección de Calidad">
                        <div class="card-nova-body">
                            <p class="card-nova-text"><?php echo $pageTranslations["txtCardCalidad"]; ?><br></p>
                            <a href="inspeccionCalidad.html" class="button"><?php echo $pageTranslations["btnCardI"]; ?></a>
                        </div>
                    </div>
                    <!-- Tarjeta 3 -->
                    <div class="card-nova card-custom">
                        <div id="icon-nova-tit" class="icon-nova-title d-flex align-items-center justify-content-center">
                            <a href="#" id="servicios-icon">
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/acceso.png') ?>" alt="Coordinador de Cosecha">
                            </a>
                            <h3><?php echo $pageTranslations["cardCosecha"]; ?></h3>
                        </div>
                            <img src="<?= asset('NovaPag/imgs/cardsServicios/imgCoordinador.jpg') ?>" class="card-img-top" alt="Imagen de Coordinador de Cosecha">
                        <div class="card-nova-body">
                            <p class="card-nova-text"><?php echo $pageTranslations["txtCardCosecha"]; ?><br></p>
                            <a href="coordinadorCosecha.html" class="button"><?php echo $pageTranslations["btnCardCC"]; ?></a>
                        </div>
                    </div>
                    <!-- Tarjeta 4 -->
                    <div class="card-nova card-custom">
                        <div id="icon-nova-tit" class="icon-nova-title d-flex align-items-center justify-content-center">
                            <a href="#" id="servicios-icon">
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/grafico.png') ?>" alt="Desarrollo de Reportes">
                            </a>
                            <h3><?php echo $pageTranslations["cardReportes"]; ?></h3>
                        </div>
                            <img src="<?= asset('NovaPag/imgs/cardsServicios/imgdesarrollo.png') ?>" class="card-img-top" alt="Imagen de Desarrollo de Reportes">
                        <div class="card-nova-body">
                            <p class="card-nova-text"><?php echo $pageTranslations["txtCardReportes"]; ?><br></p>
                            <a href="desarrolloReportes.html" class="button"><?php echo $pageTranslations["btnCardDR"]; ?></a>
                        </div>
                    </div>
                    <!-- Tarjeta 5 -->
                    <div class="card-nova card-custom">
                        <div id="icon-nova-tit" class="icon-nova-title d-flex align-items-center justify-content-center">
                            <a href="#" id="servicios-icon">
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/auditor.png') ?>" alt="Auditor de Bodega">
                            </a>
                            <h3><?php echo $pageTranslations["cardAuditor"]; ?></h3>
                        </div>
                            <img src="<?= asset('NovaPag/imgs/cardsServicios/imgAuditor.jpg') ?>" class="card-img-top" alt="Imagen de Auditor de Bodega">
                        <div class="card-nova-body">
                            <p class="card-nova-text"><?php echo $pageTranslations["txtCardAuditor"]; ?><br></p>
                            <a href="auditorBodega.html" class="button"><?php echo $pageTranslations["btnCardB"]; ?></a>
                        </div>
                    </div>
                    <!-- Tarjeta 6 -->
                    <div class="card-nova card-custom">
                        <div id="icon-nova-tit" class="icon-nova-title d-flex align-items-center justify-content-center">
                            <a href="#" id="servicios-icon">
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/agricola.png') ?>" alt="Capacitaciones Agrícolas">
                            </a>
                            <h3><?php echo $pageTranslations["cardCapacitacion"]; ?></h3>
                        </div>
                            <img src="<?= asset('NovaPag/imgs/cardsServicios/imgCapacitaciones.jpg') ?>" class="card-img-top" alt="Imagen de Capacitaciones Agrícolas">
                        <div class="card-nova-body">
                            <p class="card-nova-text"><?php echo $pageTranslations["txtCardCapacitacion"]; ?><br></p>
                            <a href="capacitacionesAgricolas.html" class="button"><?php echo $pageTranslations["btnCardA"]; ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="contenedor2-cards">
                    <div id="titCards2">
                        <h1><?php echo $pageTranslations["serviciosTec"]; ?></h1>
                        <h4><?php echo $pageTranslations["subtServiciosTec"]; ?></h4>
                    </div>
                    <div class="contCards2">
                        <div class="card2-nova card-custom">
                            <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                                <a href="#" id="servicios-icon">
                                    <img src="<?= asset('NovaPag/imgs/cardsServicios/software.png') ?>" alt="Software de Captación de Data">
                                </a>
                                <h3><?php echo $pageTranslations["cardSoftware"]; ?></h3>
                            </div>
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/imgSoftware.jpg') ?>" class="card-img-top" alt="Imagen de Software de Captación de Data">
                            <div class="card2-nova-body">
                                <p><?php echo $pageTranslations["txtCardSoftware"]; ?><br></p>
                                <a href="captacionData.html" class="button"><?php echo $pageTranslations["btnCardC"]; ?></a>
                            </div>
                        </div>
                        <div class="card2-nova card-custom">
                            <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                                <a href="#" id="servicios-icon"><img src="<?= asset('NovaPag/imgs/cardsServicios/almacenamiento.png') ?>" alt="Almacenamiento de Data"></a>
                                <h3><?php echo $pageTranslations["cardAlmacenamiento"]; ?></h3>
                            </div>
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/imgAlmacenamiento.png') ?>" class="card-img-top" alt="Imagen de Almacenamiento de Data">
                            <div class="card2-nova-body">
                                <p><?php echo $pageTranslations["txtxCardAlmacenamiento"]; ?></p>
                                <a href="almacenamientoData.html" class="button"><?php echo $pageTranslations["btnCardSe"]; ?></a>
                            </div>
                        </div>
                        <div class="card2-nova card-custom">
                            <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                                <a href="#" id="servicios-icon"><img src="<?= asset('NovaPag/imgs/cardsServicios/dash.png') ?>" alt="Dashboard de Visualización de Data en Tiempo Real"></a>
                                <h3><?php echo $pageTranslations["cardDash"]; ?></h3>
                            </div>
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/imgDash.jpeg') ?>"  class="card-img-top" alt="Imagen de Dashboard de Visualización de Data en Tiempo Real">
                            <div class="card2-nova-body">
                                <p><?php echo $pageTranslations["txtxCardDash"]; ?><br></p>
                                <a href="dashboardTiempoReal.html" class="button"><?php echo $pageTranslations["btnCardDash"]; ?></a>
                            </div>
                        </div>
                        <div class="card2-nova card-custom">
                            <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                                <a href="#" id="servicios-icon"><img src="<?= asset('NovaPag/imgs/cardsServicios/reporteData.png') ?>" alt="Reportes con Data Insight"></a>
                                <h3><?php echo $pageTranslations["cardDataI"]; ?></h3>
                            </div>
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/imgReportes.jpg') ?>" class="card-img-top"  alt="Imagen de Reportes con Data Insight">
                            <div class="card2-nova-body">
                                <p><?php echo $pageTranslations["txtxCardDataI"]; ?><br></p>
                                <a href="reportesData.html" class="button"><?php echo $pageTranslations["btnCardRe"]; ?></a>
                            </div>
                        </div>
                        <div class="card2-nova card-custom">
                            <div class="icon2-nova-title d-flex align-items-center justify-content-center">
                                <a href="#" id="servicios-icon"><img src="<?= asset('NovaPag/imgs/cardsServicios/data.png') ?>" alt="Data Analytics"></a>
                                <h3><?php echo $pageTranslations["cardDataAnalytics"]; ?></h3>
                            </div>
                                <img src="<?= asset('NovaPag/imgs/cardsServicios/imgData.jpg') ?>" class="card-img-top" alt="Imagen de Data Analytics">
                            <div class="card2-nova-body">
                                <p><?php echo $pageTranslations["txtxCardDataAnalytics"]; ?><br></p>
                                <a href="dataAnalytics.html" class="button"><?php echo $pageTranslations["btnCardPo"]; ?></a>
                            </div>
                        </div>
                    </div>
            </div>

            <div id="container-carrusel-footer">
                <div id="multiItemCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col">
                                    <img src="<?= asset('NovaPag/imgs/carrusel3/img1C3.jpg') ?>" class="d-block w-100" alt="Imagen 1">
                                </div>
                                <div class="col">
                                    <img src="<?= asset('NovaPag/imgs/carrusel3/img2C3.jpg') ?>" class="d-block w-100" alt="Imagen 2">
                                </div>
                                <div class="col">
                                    <img src="<?= asset('NovaPag/imgs/carrusel3/img3C3.jpg') ?>" class="d-block w-100" alt="Imagen 3">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col">
                                    <img src="<?= asset('NovaPag/imgs/carrusel3/img4C3.jpg') ?>" class="d-block w-100" alt="Imagen 4">
                                </div>
                                <div class="col">
                                    <img src="<?= asset('NovaPag/imgs/carrusel3/img5C3.jpg') ?>" class="d-block w-100" alt="Imagen 5">
                                </div>
                                <div class="col">
                                    <img src="<?= asset('NovaPag/imgs/carrusel3/img6C3.jpg') ?>"  class="d-block w-100" alt="Imagen 6">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col">
                                    <img src="<?= asset('NovaPag/imgs/carrusel3/img7C3.jpg') ?>" class="d-block w-100" alt="Imagen 7">
                                </div>
                                <div class="col"></div> <!-- Columna vacía -->
                                <div class="col"></div> <!-- Columna vacía -->
                            </div>
                        </div>
                    </div>
            
                    <!-- Controles de navegación -->
                    <button class="carousel-footer-control-prev" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="prev">
                        <span class="carousel-footer-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-footer-control-next" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="next">
                        <span class="carousel-footer-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            
            <div class="container-fluid p-0" id="banner-agricola">
                <!-- Imagen de banner agrícola -->
                <div class="position-relative">
                    <img src="<?= asset('NovaPag/imgs/banners/banner.png') ?>" alt="Banner Agrícola" class="img-fluid w-100">
                    
                    <!-- Texto superpuesto -->
                    <div class="banner-txt-agricola position-absolute top-50 start-50 translate-middle text-center">
                        <h5 class="display-4 text-white"><?php echo $pageTranslations["txtBannerAgricola"]; ?></h5>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
    </main>
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
</body>
</html>