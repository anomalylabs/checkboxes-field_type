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
    let onRemoveItem = function (id, value, label, groupValue) {
      if (!value) {
        field.options.forEach(function (option) {
          field.removeChild(option);
        });
      }
    };
    
    field.addEventListener('removeItem', onRemoveItem);

  });

})(window, document);
