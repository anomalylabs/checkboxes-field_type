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
            ]
        ]
    ]
];
```

### `options`

The options for the checkboxes. Any valid array or valid YAML string can be used.