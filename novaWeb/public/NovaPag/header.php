<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="<?= asset('NovaPag/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('NovaPag/css/estiloHeader.css') ?>">
</head>
<body>
    <header>
        <div id="gradiente" class="py-2">
            <div class="container">
                <section id="redes" class="d-flex justify-content-end">
                    <a href="https://web.facebook.com/Novaproduce.cl" target="_blank" id="btnFb" class="mx-2">
                        <img src="<?= asset('NovaPag/imgs/iconos/fb.png') ?>" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/novaanalytics.cl/" target="_blank" id="btnIg" class="mx-2">
                        <img src="<?= asset('NovaPag/imgs/iconos/ig.png') ?>" alt="Instagram">
                    </a>
                    <a href="https://www.linkedin.com/company/nova-analytic" target="_blank" id="btnIn" class="mx-2">
                        <img src="<?= asset('NovaPag/imgs/iconos/in.png') ?>" alt="LinkedIn">
                    </a>
                </section>
            </div>
        </div>

        <div class="container">
            <!-- Logo, navbar, button, and select -->
            <div id="algo" class="d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <div class="d-flex align-items-center">
                    <a href="indexNova.php"><img id="logo" src="<?= asset('NovaPag/imgs/logos/Logo-2024-sin-fondo-1-1024x683.png') ?>" alt="Logo" class="img-fluid" width="120"></a>
                </div>

                <!-- Navbar -->
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="NuestroEquipo.php"><?php echo $translations['header']['equipo']; ?><b></b></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $translations['header']['servicios']; ?><b></b></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#"><?php echo $translations['header']['inspeccionCoordinacion']; ?><b></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="inspeccionLabores.php"><?php echo $translations['header']['inspeccionLabores']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="inspeccionCalidad.php"><?php echo $translations['header']['inspeccionCalidad']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="coordinadorCosecha.php"><?php echo $translations['header']['coordinadorCosecha']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="desarrolloReportes.php"><?php echo $translations['header']['desarrolloReportes']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="auditorBodega.php"><?php echo $translations['header']['auditorBodega']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="capacitacionesAgricolas.php"><?php echo $translations['header']['capacitacionesAgricolas']; ?><b></b></a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#"><?php echo $translations['header']['tecnologias']; ?><b></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="captacionData.php"><?php echo $translations['header']['softwareCaptacion']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="almacenamientoData.php"><?php echo $translations['header']['almacenamientoData']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="dashboardTiempoReal.php"><?php echo $translations['header']['dashboardData']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="reportesData.php"><?php echo $translations['header']['reportesData']; ?><b></b></a></li>
                                                <li><a class="dropdown-item" href="dataAnalytics.php"><?php echo $translations['header']['dataAnalytics']; ?><b></b></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="comunidadnoova.php"><?php echo $translations['header']['comunidadNova']; ?><b></b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contacto.php"><?php echo $translations['header']['contacto']; ?><b></b></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="contenedor-btnSelect" class="d-flex align-items-center">
                    <a href="<?php echo route('login.php'); ?>" id="btnCliente" class="btn btn-outline-primary d-flex align-items-center me-3">
                        <img src="<?= asset('NovaPag/imgs/iconos/icons8-cliente-48.png') ?>" alt="Clientes" width="24" height="24">
                        <span class="ms-2"><?php echo $translations['header']['clientes']; ?></span>
                    </a>
                    <form method="get" action="">
                        <select id="language-select" name="lang" class="form-select wide-select" onchange="this.form.submit()">
                            <option data-image="<?php echo asset('NovaPag/imgs/iconos/bandera.png'); ?>" value="es" <?php echo ($lang == 'es') ? 'selected' : ''; ?>>Español</option>
                            <option data-image="<?php echo asset('NovaPag/imgs/iconos/estados-unidos.png'); ?>" value="en" <?php echo ($lang == 'en') ? 'selected' : ''; ?>>English</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
   </header>


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
