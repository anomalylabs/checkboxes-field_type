# Output

This field type returns the addon instance as a value. You may access the object as normal.

**Examples:**

### `keys`

Return the option keys as an array.

```
// Twig Usage
{{ entry.example.keys|join(', ') }} // Outputs key1, key2, key3

// API Usage
implode(', ', $entry->example->keys()); // Outputs key1, key2, key3
```

### `values`

Return the option values as an array.

```
// Twig Usage
{{ entry.example.values|join(', ') }} // Outputs Value 1, Value 2, Value 3

// API Usage
implode(', ', $entry->example->values()); // Outputs Value 1, Value 2, Value 3
```

### `selections`

Return the selections array.

```
// Twig Usage
{% for key, value in entry.example.selections %}
	{{ key }} = {{ value }} // Outputs key1 = Value 1
{% endfor %}

// API Usage
foreach ($entry->example->selections() as $key => $value) {
	echo "{$key} = {$value}"; // Outputs key1 = Value 1
}
```
