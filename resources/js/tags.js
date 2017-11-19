(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]:not([data-initialized])')
    );

    fields.forEach(function (field) {

        field.dataset.initialized = true;

        let choices = new Choices(field, {
            removeItemButton: true,
        });

        /**
         * Fix an issue where when all options
         * are removed the last option element
         * is not removed from the DOM.
         */
        field.addEventListener('removeItem', function() {

            if (choices.getValue().length == 0) {
                field.removeChild(field.options[0])
            }

        }, false);
    });
})(window, document);
