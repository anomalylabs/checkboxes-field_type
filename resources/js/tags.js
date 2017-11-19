(function (window, document) {

    let inputs = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.input_type.checkboxes"]:not([data-initialized])')
    );

    inputs.forEach(function (input) {

        input.dataset.initialized = true;

        let choices = new Choices(input, {
            removeItemButton: true,
        });

        /**
         * Fix an issue where when all options
         * are removed the last option element
         * is not removed from the DOM.
         */
        input.addEventListener('removeItem', function () {

            if (choices.getValue().length == 0) {
                input.removeChild(input.options[0])
            }

        }, false);
    });
})(window, document);
