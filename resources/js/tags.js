(function (window, document) {

    let selects = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]:not([data-initialized])')
    );

    selects.forEach(function ($select) {

        $select.dataset.initialized = true;

        new Choices($select);
    });
})(window, document);
