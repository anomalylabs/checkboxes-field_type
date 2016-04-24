# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You must set the checkboxes field type value with a key or keys from the available options.

    $entry->example = "foo";

You can set multiple values with an array.

    $entry->example = ["foo", "bar"];

<hr>

<a name="output"></a>
## Basic Output

The addon field type returns an array of value keys.

    $entry->example; // ["foo", "bar"]

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the checkboxes field type presenter is returned instead.

#### Selections

Return the selected values in `key => value` format.

    $entry->example->selections(); // ["foo" => "FOO", "bar" => "BAR"]

#### Keys

Return the selected value keys only.

    $entry->example->keys(); // ["foo", "bar"]

#### Values
To return the selected value strings only, use the `values` method.

    $entry->example->values(); // ["FOO", "BAR"]