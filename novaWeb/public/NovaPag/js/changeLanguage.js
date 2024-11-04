document.addEventListener("DOMContentLoaded", function() {
    // Inicializa Select2
    $('#language-select').select2({
        minimumResultsForSearch: Infinity,
        templateResult: function(option) {
            if (!option.id) {
                return option.text; // Si no hay ID, solo muestra el texto
            }
            // Devuelve el HTML para cada opción en el menú desplegable
            return $('<span><img src="' + $(option.element).data('image') + '" class="img-flag" style="width: 20px; height: 15px; margin-right: 5px;" /> ' + option.text + '</span>');
        },
        templateSelection: function(option) {
            if (!option.id) {
                return option.text; // Si no hay ID, solo muestra el texto
            }
            // Devuelve el HTML para el texto seleccionado
            return $('<span><img src="' + $(option.element).data('image') + '" class="img-flag" style="width: 20px; height: 15px; margin-right: 5px;" /> ' + option.text + '</span>');
        }
    });

    // Manejar el cambio de idioma
    $('#language-select').on('change', function() {
        var selectedLang = $(this).val(); // Obtiene el idioma seleccionado
        $.post('set_language.php', { lang: selectedLang }, function() {
            location.reload(); // Recarga la página para aplicar el nuevo idioma
        }).fail(function() {
            alert('Error al cambiar el idioma.'); // Mensaje de error
        });
    });

    // Mostrar imágenes al cargar la página
    $('#language-select option').each(function() {
        var imgSrc = $(this).data('image');
        if (imgSrc) {
            $(this).css('background-image', 'url(' + imgSrc + ')');
            $(this).css('background-size', '20px 20px'); // Ajusta el tamaño de la imagen
            $(this).css('background-repeat', 'no-repeat');
            $(this).css('padding-left', '30px'); // Espacio para la imagen
        }
    });
});
