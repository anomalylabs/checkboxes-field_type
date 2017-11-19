(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]')
    );

    fields.forEach(function (field) {

        let choices = new Choices(field, {
            removeItemButton: true,
        });

        /**
         * Fix an issue where when all options
         * are removed the last option element
         * is not removed from the DOM.
         */
        field.addEventListener('removeItem', function (event) {

            if (choices.getValue().length == 0) {
                event.target.removeChild(event.target.options[0])
            }

        }, false);
    });
})(window, document);
