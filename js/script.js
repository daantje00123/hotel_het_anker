window.addEventListener('DOMContentLoaded', function() {
    $('.datepicker').formatter({
        pattern: '{{99}}-{{99}}-{{9999}}',
        persistent: true
    });

    $('.datepicker').datepicker({
        dateFormat: "dd-mm-yy"
    });

    $('[data-toggle="tooltip"]').tooltip();
});