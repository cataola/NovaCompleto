<?php
session_start();

$lang = $_SESSION['lang'] ?? 'es';
$translations = include "languages/$lang.php";
$pageTranslations = $translations['formularioRequerimientos']; // Obtén las traducciones específicas para la página acerca de
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Requerimientos</title>
    <link rel="icon" type= "image/png" href="imgs/iconos/favicon-32x32.png">
    <link href="css/select2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Archivo CSS local -->
    <link rel="stylesheet" href="estilosFormularioRequerimientos.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/select2.min.js"></script>
    
</head>
<body>
        <?php include 'header.php'; ?>

    <main>
        <div id="fondo-formulario">
         <div id="container-formulario" class="container mt-5">
             <h2 id="titulo" class="en" class="text-center mb-4"><?php echo $pageTranslations["titulo"]; ?></h2>
             <form id="formulario" novalidate>
                 <!-- Nombre de la empresa -->
                 <div class="mb-3">
                     <label for="empresa" class="form-label"><?php echo $pageTranslations["empresa"]; ?><b></b></label>
                     <input  type="text" class="form-control" placeholder="Nombre de la Empresa" required>
                     <div class="invalid-feedback"><?php echo $pageTranslations["msjEmpresa"]; ?></div>
                 </div>
     
                 <!-- Nombre del contacto principal -->
                 <div class="mb-3">
                     <label for="contactoPrincipal" class="form-label"><?php echo $pageTranslations["contactoPrincipal"]; ?><b></b></label>
                     <input type="text" class="form-control" placeholder="Nombre del Contacto Principal" required>
                     <div class="invalid-feedback"><?php echo $pageTranslations["msjContacto"]; ?></div>
                 </div>
     
                 <!-- Correo electrónico de contacto -->
                 <div class="mb-3">
                     <label for="correo" class="form-label"><?php echo $pageTranslations["correo"]; ?><b></b></label>
                     <input type="email" class="form-control" placeholder="Correo Electrónico de Contacto" required>
                     <div class="invalid-feedback"><?php echo $pageTranslations["msjCorreo"]; ?></div>
                 </div>
     
                 <!-- Teléfono de contacto -->
                 <div class="mb-3">
                     <label for="telefono" class="form-label"><?php echo $pageTranslations["telefono"]; ?><b></b></label>
                     <input type="tel" class="form-control" placeholder="Teléfono de Contacto" required pattern="[0-9]+">
                     <div class="invalid-feedback"><?php echo $pageTranslations["telefono"]; ?></div>
                 </div>
     
                 <!-- Ubicación de la empresa -->
                 <div class="mb-3">
                     <label for="ubicacion" class="form-label"><?php echo $pageTranslations["ubicacion"]; ?><b></b></label>
                     <input type="text" class="form-control" placeholder="Ubicación de la Empresa" required>
                     <div class="invalid-feedback"><?php echo $pageTranslations["msjUbicacion"]; ?></div>
                 </div>
     
                 <!-- Descripción breve de la empresa y actividad principal -->
                 <div class="mb-3">
                     <label for="descripcion" class="form-label"><?php echo $pageTranslations["descripcion"]; ?><b></b></label>
                     <textarea class="form-control" rows="4" placeholder="Descripción Breve de la Empresa y su Actividad Principal" required></textarea>
                     <div class="invalid-feedback"><?php echo $pageTranslations["msjDescripcion"]; ?></div>
                 </div>
     
                 <!-- Selección de opciones -->
                 <div class="mb-3">
                     <label for="opciones" class="form-label"><?php echo $pageTranslations["opciones"]; ?><b></b></label>
                     <select class="form-select" id="opciones" required>
                         <option value=""><?php echo $pageTranslations["seleccion"]; ?></option>
                         <option value="1"><?php echo $pageTranslations["requisitos"]; ?></option>
                         <option value="2"><?php echo $pageTranslations["estimacion"]; ?></option>
                         <option value="3"><?php echo $pageTranslations["digitalizacion"]; ?></option>
                         <option value="4"><?php echo $pageTranslations["inspector"]; ?></option>
                         <option value="5"><?php echo $pageTranslations["control"]; ?></option>
                         <option value="6"><?php echo $pageTranslations["gestion"]; ?></option>
                         <option value="7"><?php echo $pageTranslations["bodega"]; ?></option>
                         <option value="8"><?php echo $pageTranslations["unificacion"]; ?></option>
                         <option value="9"><?php echo $pageTranslations["integral"]; ?></option>
                         <option value="10"><?php echo $pageTranslations["informes"]; ?></option>
                         <option value="11"><?php echo $pageTranslations["plan"]; ?></option>
                     </select>
                     <div class="invalid-feedback"><?php echo $pageTranslations["msjSelect"]; ?></div>
                 </div>
     
                 <!-- Botón de envío -->
                 <button id="siguiente" type="submit" class="btn btn-primary"><?php echo $pageTranslations["siguiente"]; ?><b></b></button>
             </form>
         </div>
        </div>
     </main>
        <?php include 'footer.php'; ?>
    
    
    <script src="js/select2.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        (function () {
            'use strict'
            // Seleccionar el formulario
            const form = document.querySelector('#formulario')

            // Escuchar el evento submit del formulario
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()  // Prevenir el envío
                    event.stopPropagation() // Detener propagación
                }

                form.classList.add('was-validated') // Añadir clases de Bootstrap
            }, false)
        })()
    });
    </script>
   

</body>
</html>