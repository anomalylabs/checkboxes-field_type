# Checkboxes Field Type

- [Introduction](#introduction)
- [Configuration](#configuration)
- [Output](#output)


<a name="introduction"></a>
## Introduction

`anomaly.field_type.checkboxes`

The checkboxes field type provides multiple checkbox inputs.


<a name="configuration"></a>
## Configuration

**Example Definition:**

    protected $fields = [
        'example' => [
            'type'   => 'anomaly.field_type.checkboxes',
            'config' => [
                'options' => [
                    'key1' => 'Value 1',
                    'key2' => 'Value 2',
                    'key3' => 'Value 3'
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


<a name="output"></a>
## Output

This field type returns an array of selected key values by default.

### `keys`

Return the option keys as an array. In most cases this is the same as the default output.

    // Twig usage
    {{ entry.example.keys|join(', ') }} // Outputs key1, key2, key3
    
    // API usage
    implode(', ', $entry->example->keys()); // Outputs key1, key2, key3

### `values`

Return the option values as an array.

    // Twig usage
    {{ entry.example.values|join(', ') }} // Outputs Value 1, Value 2, Value 3
    
    // API usage
    implode(', ', $entry->example->values()); // Outputs Value 1, Value 2, Value 3

### `selections`

Return the selections array.

    // Twig usage
    {% for key, value in entry.example.selections %}
    	{{ key }} = {{ value }} // Outputs key1 = Value 1
    {% endfor %}
    
    // API usage
    foreach ($entry->example->selections() as $key => $value) {
    	echo "{$key} = {$value}"; // Outputs key1 = Value 1
    }
