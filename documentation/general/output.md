# Output

This field type returns the addon instance as a value. You may access the object as normal.

**Examples:**

### `keys`

Return the option keys as an array.

```
// Twig Usage
{{ entry.example.keys }}

// API Usage
$entry->example->keys();
```

### `values`

Return the option values as an array.

```
// Twig Usage
{{ entry.example.keys }}

// API Usage
$entry->example->keys();
```

### `selections`

Return the selections array.

```
// Twig Usage
{{ entry.example.selections }}

// API Usage
$entry->example->selections();
```
