document.addEventListener("DOMContentLoaded", function() {
    // Inicializa Select2 con íconos de bandera
    $('#language-select').select2({
        minimumResultsForSearch: Infinity,
        templateResult: function(option) {
            if (!option.id) {
                return option.text;
            }
            return $('<span><img src="' + $(option.element).data('image') + '" class="img-flag" style="width: 20px; height: 15px; margin-right: 5px;" /> ' + option.text + '</span>');
        },
        templateSelection: function(option) {
            if (!option.id) {
                return option.text;
            }
            return $('<span><img src="' + $(option.element).data('image') + '" class="img-flag" style="width: 20px; height: 15px; margin-right: 5px;" /> ' + option.text + '</span>');
        }
    });

    // Maneja el cambio de idioma
    $('#language-select').on('change', function() {
        var selectedLang = $(this).val();
        $.ajax({
            url: '{{ route("set.language") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                lang: selectedLang
            },
            success: function(response) {
                if (response.status === 'success') {
                    location.reload(); // Recarga la página para aplicar el nuevo idioma
                }
            },
            error: function() {
                alert('Error al cambiar el idioma.'); // Mensaje de error
            }
        });
    });
});
