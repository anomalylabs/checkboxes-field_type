(function (window, document) {

  let fields = Array.from(
    document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]')
  );

  fields.forEach(function (field) {

    let choices = new Choices(field, {
      removeItemButton: true,
      duplicateItems: false,
      delimiter: field.dataset.delimiter || ',',
    });

    /**		
     * Fix an issue where when all options		
     * are removed the last option element		
     * is not removed from the DOM.		
     */
    let onRemoveItem = function (e) {
      if (!e.detail.value) {
        field.options.forEach(function (option) {
          field.removeChild(option);
        });
      }
    };
    
    choices.passedElement.addEventListener('removeItem', onRemoveItem);

  });

})(window, document);
