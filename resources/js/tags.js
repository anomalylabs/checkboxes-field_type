(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]')
    );

    fields.forEach(function (field) {
        new Choices(field, {
            removeItemButton: true,
            duplicateItems: false,
            delimiter: field.dataset.delimiter || ',',
        });
    });

})(window, document);
