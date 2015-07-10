<?php

return [
    'options'       => [
        'required' => true,
        'type'     => 'anomaly.field_type.textarea'
    ],
    'min'           => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1
        ]
    ],
    'max'           => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min' => 1
        ]
    ],
    'default_value' => [
        'type' => 'anomaly.field_type.tags'
    ]
];
