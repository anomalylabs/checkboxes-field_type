# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You must set the checkboxes field type value with a key or keys from the available options.

{{ code('php', '$entry->example = "foo";') }}

You can set multiple values with an array.

{{ code('php', '$entry->example = ["foo", "bar"];') }}

<hr>

<a name="output"></a>
## Basic Output

The addon field type returns an array of value keys.

{% code php %}
$entry->example; // ["foo", "bar"]
{% endcode %}

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the checkboxes field type presenter is returned instead.

#### Selections

Return the selected values in `key => value` format.

{% code php %}
$entry->example->selections(); // ["foo" => "FOO", "bar" => "BAR"]
{% endcode %}

#### Keys

Return the selected value keys only.

{% code php %}
$entry->example->keys(); // ["foo", "bar"]
{% endcode %}

#### Values
To return the selected value strings only, use the `values` method.

{% code php %}
$entry->example->values(); // ["FOO", "BAR"]
{% endcode %}