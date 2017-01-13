$(document).on('ajaxComplete ready', function () {

    // Initialize tag inputs.
    $('select[data-provides="anomaly.field_type.checkboxes"]:not([data-initialized])').each(function () {

        $(this)
            .attr('data-initialized', '')
            .select2();
    });
});
