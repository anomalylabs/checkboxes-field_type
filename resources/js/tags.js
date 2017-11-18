(function (window, document) {

    let selects = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]:not([data-initialized])')
    );

    selects.forEach(function ($select) {
        new Choices($select);
    });
})(window, document);
