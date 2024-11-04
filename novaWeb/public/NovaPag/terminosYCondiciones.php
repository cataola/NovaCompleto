<?php
session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Cargar traducciones
$translations = include "languages/$lang.php";
$pageTranslations = $translations['terminosCondiciones']; // Obtén las traducciones específicas para la página principal
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminos y Condiciones - Nova Analytics</title>
    <link rel="icon" type= "imgage/png" href="imgs/iconos/favicon-32x32.png">
    <link href="css/select2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Archivo CSS local -->
    <link rel="stylesheet" href="estilosTerminosyCondiciones.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/select2.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div>
            <p><?php echo $pageTranslations['txtTerminos']; ?></p>
        </div>
        
    </main>
    <?php include 'footer.php'; ?>

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

