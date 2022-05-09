<?php

return [
    'mode'          => [
        'label'  => 'Тип ввода',
        'option' => [
            'checkboxes' => 'Чекбоксы',
            'tags'       => 'Теги',
        ],
    ],
    'options'       => [
        'label'        => 'Опции',
        'instructions' => 'Ниже задаются параметры в формате <strong>key: Value</strong> или <strong>Value</strong>. Каждый параметр должен быть указан в отдельной строке.',
        'placeholder'  => 'key: Value',
    ],
    'min'           => [
        'label'        => 'Минимум',
        'instructions' => 'Минимальное количество вариантов выбора.',
    ],
    'max'           => [
        'label'        => 'Максимум',
        'instructions' => 'Максимольное количество вариантов выбора.',
    ],
    'default_value' => [
        'label'        => 'Значение по умолчанию',
        'instructions' => 'Значения выбора по умолчанию.',
    ],
    'separator'     => [
        'label'        => 'Разделитель',
        'instructions' => 'Можно задать нестандартный разделитель пары <strong>key: Value</strong>.',
        'placeholder'  => ':',
    ],
];
