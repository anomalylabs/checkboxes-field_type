(function (window, document) {

  let fields = Array.from(
    document.querySelectorAll('select[data-provides="anomaly.field_type.checkboxes"]')
  );

  fields.forEach(function (field) {

    let choices = new Choices(field, {
      removeItemButton: true,
    });

    field.addEventListener('removeItem', function (id, value, label, groupValue) {

      if (!value) {
        field.options.forEach(function (option) {
          field.removeChild(option);
        });
      }
        
    });

  });

})(window, document);
