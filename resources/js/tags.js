(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]:not([data-initialized])')
    );

    fields.forEach(function (field) {

        field.dataset.initialized = true;

        new Choices(field, {
            removeItemButton: true,
        });
    });
})(window, document);
