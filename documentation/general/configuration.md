# Configuration

**Example Definition:**

```
protected $fields = [
    'example' => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'options' => [
                'key1' => 'Key 1',
                'key2' => 'Key 2',
                'key3' => 'Key 3'
            ],
            'min'           => 1,
            'max'           => 2,
            'default_value' => [
                'key2'
            ],
            'handler'       => 'Anomaly\CheckboxesFieldType\CheckboxesFieldTypeOptions@handle'
        ]
    ]
];
```

### `options`

The options for the checkboxes. Any valid array or valid YAML string can be used.

### `min`

The minimum number of allowed selections. By default no minimum is enforced.

### `max`

The maximum number of allowed selections. By default no maximum is enforced.

### `default_value`

The default selections. Any valid array of keys/values can be used. By default there is no default value.

### `handler`

The options handler callable string. Any valid callable class string can be used. The default value is `'Anomaly\CheckboxesFieldType\CheckboxesFieldTypeOptions@handle'`.

The handler is responsible for setting the available options on the field type instance.

**NOTE:** This option can not be through the GUI configuration. 
