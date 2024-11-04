<?php 
require_once 'conexion.php';

function obtenerProductos($orden = null, $categoria = null) {
    global $conn;

    $sql = "SELECT * FROM productos";

    // Agregar condiciones si hay orden o categoría
    if ($orden || $categoria) {
        $sql .= " WHERE 1"; 
    }

    // Aplicar ordenamiento si se ha especificado
    if ($orden) {
        // Asegúrate de que el orden se pase en el formato correcto
        $ordenarPor = substr($orden, 0, -4); // La columna
        $ordenDir = substr($orden, -3); // La dirección
        $sql .= " ORDER BY $ordenarPor $ordenDir";
    }

    // Aplicar filtro de categoría si se ha especificado
    if ($categoria) {
        $sql .= " AND categoria = '$categoria'";
    }

    $result = $conn->query($sql);
    $productos = array();

    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    return $productos;
}

session_start();

// Establecer el idioma por defecto
$lang = $_SESSION['lang'] ?? 'es';

// Cargar traducciones
$translations = include "languages/$lang.php";
$pageTranslations = $translations['comunidadNova']; 
?>


<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Nova Academy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estiloNovaAcademy.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/select2.min.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        
    
        <!-- Banner -->
        <div id="bannerAgricola" class="container-fluid p-0 position-relative">
            <img src="imgs/banners/bannerAgricola.png" alt="Banner Nova Academy" class="img-fluid">
            <div id="bannerAgricola-title" class="position-absolute top-50 start-50 translate-middle text-white">
                <h3 class="fw-bold">Nova Academy</h3>
            </div>
        </div>
        
        <!-- Sección de productos disponibles próximamente -->
        <section id="productos" class="container my-5">
            <h2 class="text-center">Disponibles Próximamente</h2>
            <select id="ordenarPor">
                <ul><option value="predeterminado">Orden predeterminado</option>
                <option value="popularidad">Ordenar por popularidad</option>
                <option value="puntuacion">Ordenar por puntuación media</option>
                <option value="fecha">Ordenar por los últimos</option>
                <option value="precio-asc">Ordenar por precio: bajo a alto</option>
                <option value="precio-desc">Ordenar por precio: alto a bajo</option>
            </select>
            <div class="row">

                <!-- Producto 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="imgs/tienda/blueberries.png" class="card-img-top" alt="Blueberries">
                        <div class="card-body">
                            <h5 class="card-title">Estrategias de Inspección y Control de Procesos para Blueberries</h5>
                            <p class="card-text">En el mercado estadounidense.</p>
                            <p class="precio">$100.000</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
                <!-- Producto 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="imgs/tienda/uvas.png" class="card-img-top" alt="Uvas de mesa">
                        <div class="card-body">
                            <h5 class="card-title">Garantía de Calidad en Uvas de Mesa</h5>
                            <p class="card-text">En el mercado estadounidense.</p>
                            <p class="precio">$100.000</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
                <!-- Producto 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="imgs/tienda/llavesdeagua.png" class="card-img-top" alt="llavesdeagua">
                        <div class="card-body">
                            <h5 class="card-title">Formación Especializada para Operarios de Bodega Enológica durante la Temporada de Vendimia</h5>
                            <p class="card-text">Clave para la inspección y conformidad.</p>
                            <p class="precio">$100.000</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
                <!-- Producto 4 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="imgs/tienda/naranja.png" class="card-img-top" alt="Cítricos">
                        <div class="card-body">
                            <h5 class="card-title">Garantía de Calidad en Cítricos Importados</h5>
                            <p class="card-text">Clave para la inspección y conformidad.</p>
                            <p class="precio">$100.000</p>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

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
