# Configuration

- [Basic Configuration](#basic)
- [Extra Configuration](#extra)
- [Option Handlers](#handlers)
- [Option Groups](#groups)

<hr>

Below is the full configuration available with defaults.

    {% code php %}
    protected $fields = [
        "example" => [
            "type"   => "anomaly.field_type.checkboxes",
            "config" => [
                "default_value" => null,
                "options"       => null,
                "handler"       => "Anomaly\CheckboxesFieldType\Handler\DefaultHandler@handle"
            ]
        ]
    ];
    {% endcode %}

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

{{ code('php', '"default_type" => false') }}

The `default_value` is a core option. This field type accepts any key from the options.

### Checkbox Options

You can set the available options as an array of key => value pairs.
{% code php %}
"options" => [
    "foo" => "FOO",
    "bar" => "BAR"
]
{% endcode %}

<hr>

<a name="groups"></a>
## Option Groups

Checkbox options can be organized into groups by nesting the options into keyed groups. The _key_ is translated into the group label.

{% code php %}
"options" => [
    "module::message.examples" => [
        "foo" => "FOO",
        "bar" => "BAR"
    ]
]
{% endcode %}

<hr>

<a name="handlers"></a>
## Option Handlers

Option handlers are responsible for setting the available options on the field type. You can define your own option handler to add your own logic to available dropdown options.

### Defining Custom Handlers

Custom handlers can be defined as a callable string.

{{ code('php', '"handler" => "App/Example/MyOptions@handle"') }}

You can also define custom handlers as a closure.

<div class="alert alert-info">
<strong>Remember:</strong> Closures can not be stored in the database so you need to define closures in the form builder.
</div>

    {% code php %}
    protected $fields = [
        "example" => [
            "config" => [
                "handler" => function (CheckboxesFieldType $fieldType) {
                    $fieldtype->setOptions(
                        [
                            "foo" => "FOO",
                            "bar" => "BAR"
                        ]
                    );
                }
            ]
        ]
    ];
    {% endcode %}

### Building Custom Handlers

Building custom option handlers could not be easier. Simply create the class with the method you defined in the config option.

{{ code('php', '"handler" => "App/Example/MyOptions@handle"') }}

The callable string is called via Laravel's service container. The {{ code('php', '$fieldType') }} is passed as an argument.

<div class="alert alert-primary">
<strong>Note:</strong> Because handlers are called through Laravel's service container, you can automatically inject dependencies into the construct and method.
</div>

    {% code php %}
    class MyOptions
    {
        public function handle(CheckboxesFieldType $fieldType)
        {
            $fieldtype->setOptions(
                [
                    "foo" => "FOO",
                    "bar" => "BAR"
                ]
            );
        }
    }
    {% endcode %}
