
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="NovaPag/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('NovaPag/css/estiloFooter.css') ?>">
    <script src="NovaPag/js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <footer data-page="footer" id="banner-footer" >
        <div id="contenedorfooter" class="container">
            <div id="columnas-logo" class="row">
                <div id="logo-section" class="col-md-4 d-flex flex-column align-items-start">
                    <div id="logo-container">
                        <img src="<?php echo asset('NovaPag/imgs/logos/logoBlanco.png'); ?>" alt="Logo Nova Analytics" class="img-fluid mb-3" id="logo-img">
                        <p><?php echo $translations['footer']['txtFooter']; ?></p>
                    </div>
                </div>
                <div id="menu-section" class="col-md-8">
                    <div id="menus-categorias" class="row">
                        <div id="menuFooter" class="col-md-4">
                            <h3><?php echo $translations['footer']['txtMenuFooter']; ?></h3>
                            <ul id="list-menu"class="list-unstyled">
                                <li><a href="indexNova.php"><?php echo $translations['footer']['inicio']; ?></a></li>
                                <li><a href="Nuestro Equipo.php"><?php echo $translations['footer']['equipoFooter']; ?></a></li>
                                <li><a href="indexNova.php"><?php echo $translations['footer']['serviciosFooter']; ?></a></li>
                                <li><a href="novaAcademy.php">Nova Academy</a></li>
                                <li><a href="comunidadnoova.php"><?php echo $translations['footer']['trabajaFooter']; ?></a></li>
                                <li><a href="contacto.php"><?php echo $translations['footer']['contactoFooter']; ?></a></li>
                            </ul>
                        </div>
                        <div id="menuInspeccion" class="col-md-4">
                            <h3><?php echo $translations['footer']['inspeccionFooter']; ?></h3>
                            <ul id="list-menuInspeccion" class="list-unstyled">
                                <li><a href="inspeccionLabores.php"><?php echo $translations['footer']['laboresFooter']; ?></a></li>
                                <li><a href="inspeccionCalidad.php"><?php echo $translations['footer']['calidadFooter']; ?></a></li>
                                <li><a href="coordinadorCosecha.php"><?php echo $translations['footer']['coordinadorFooter']; ?></a></li>
                                <li><a href="desarrolloReportes.php"><?php echo $translations['footer']['desarrolloFooter']; ?></a></li>
                                <li><a href="auditorBodega.php"><?php echo $translations['footer']['auditorFooter']; ?></a></li>
                                <li><a href="capacitacionesAgricolas.php"><?php echo $translations['footer']['capacitacionesFooter']; ?></a></li>
                            </ul>
                        </div>
                        <div id="tecnologiasFooter" class="col-md-4">
                            <h3 id=""><?php echo $translations['footer']['txtTecnologiasFooter']; ?></h3>
                            <ul id="list-tecnologia" class="list-unstyled">
                                <li><a href="captacionData.php"><?php echo $translations['footer']['softwareFooter']; ?></a></li>
                                <li><a href="almacenamientoData.php"><?php echo $translations['footer']['almacenamientoFooter']; ?></a></li>
                                <li><a href="dashboardTiempoReal.php"><?php echo $translations['footer']['tiemporeal']; ?></a></li>
                                <li><a href="reportesData.php"><?php echo $translations['footer']['reportesFooter']; ?></a></li>
                                <li><a href="dataAnalytics.php">Data Analytics</a></li>
                                <li><a href="terminosYCondiciones.php"><?php echo $translations['footer']['terminosFooter']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div id="social-icons" class="col-4 text-center mt-4">
                    <a href="https://web.facebook.com/Novaproduce.cl" id="btnFb2" class="btn-circle me-4">
                        <img src="<?= asset('NovaPag/imgs/iconos/fb.png') ?>" alt="Facebook" id="fb-icon" class="img-fluid">
                        
                    </a>
                    <a href="https://www.instagram.com/novaproduce.cl" id="btnIg2" class="btn-circle me-4">
                        <img src="<?= asset('NovaPag/imgs/iconos/ig.png') ?>" alt="Instagram" id="ig-icon" class="img-fluid">
                    </a>
                    <a href="https://www.linkedin.com/company/nova-analytic" id="btnIn2" class="btn-circle me-4">
                        <img src="<?= asset('NovaPag/imgs/iconos/in.png') ?>" id="in-icon" class="img-fluid">
                    </a>
                </div>
            </div>
    
            <a href="https://api.whatsapp.com/send/?phone=56952101400&text&type=phone_number&app_absent=0" id="whatsapp-button" class="btn-circle position-fixed">
                <img src="<?= asset('NovaPag/imgs/iconos/wsp.png') ?>" alt="WhatsApp" id="whatsapp-icon" class="img-fluid">
                <div id="qr-code-container" class="position-absolute bg-white p-13 rounded d-none">
                    <img src="<?= asset('NovaPag/imgs/iconos/codigo-qr.png') ?>" alt="QR Code" id="qr-code" class="img-fluid">
                    <h1><?php echo $translations['footer']['escanea']; ?></h1>
                </div>
            </a>
        </div>
    </footer>
    <script src="NovaPag/js/bootstrap.min.js"></script> 
</body>
</html>