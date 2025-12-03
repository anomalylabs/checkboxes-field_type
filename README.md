# Checkboxes Field Type

*anomaly.field_type.checkboxes*

A field type for multiple checkbox selections with support for custom options, handlers, and various display modes.

## Description

The checkboxes field type provides a flexible way to present multiple checkbox options for users to select. It supports custom option handlers, multiple display modes, and stores selected values as an array.

## Features

- **Multiple Selection**: Allow users to select multiple options
- **Custom Options**: Define options via arrays, handlers, or callbacks
- **Display Modes**: Checkboxes, dropdown, or tags display
- **Pre-defined Handlers**: Built-in handlers for countries and states
- **Validation**: Array-based validation
- **Value Separator**: Customizable key-value separator
- **Filter Support**: Built-in filter view for tables

## Configuration

### Basic Configuration

```php
'preferences' => [
    'type' => 'anomaly.field_type.checkboxes',
],
```

### Configuration Options

#### `options`
Define the available checkbox options.

```php
'interests' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'options' => [
            'technology' => 'Technology',
            'sports'     => 'Sports',
            'music'      => 'Music',
            'travel'     => 'Travel',
        ],
    ],
],
```

#### `mode` (default: 'checkboxes')
The display mode for the field.

```php
'config' => [
    'mode' => 'checkboxes', // checkboxes, dropdown, or tags
]
```

#### `handler`
Custom options handler class or method.

```php
'categories' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'handler' => 'App\\Category\\CategoryOptionsHandler@handle',
    ],
],
```

#### `separator` (default: ':')
Separator for key-value pairs in options.

```php
'config' => [
    'separator' => '|',
]
```

## Display Modes

### Checkboxes Mode (Default)
Traditional checkbox list.

```php
'permissions' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'mode'    => 'checkboxes',
        'options' => [
            'read'   => 'Read',
            'write'  => 'Write',
            'delete' => 'Delete',
        ],
    ],
],
```

### Dropdown Mode
Multi-select dropdown.

```php
'tags' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'mode'    => 'dropdown',
        'options' => [
            'php'        => 'PHP',
            'javascript' => 'JavaScript',
            'python'     => 'Python',
        ],
    ],
],
```

### Tags Mode
Tag-style interface.

```php
'skills' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'mode'    => 'tags',
        'options' => [
            'laravel' => 'Laravel',
            'vue'     => 'Vue.js',
            'react'   => 'React',
        ],
    ],
],
```

## Pre-defined Handlers

### Countries Handler
All world countries.

```php
'countries' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'handler' => 'countries',
    ],
],
```

### States Handler
US states.

```php
'states' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'handler' => 'states',
    ],
],
```

## Usage Examples

### Simple Options

```php
protected $fields = [
    'features' => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'options' => [
                'wifi'       => 'WiFi',
                'parking'    => 'Parking',
                'pool'       => 'Swimming Pool',
                'gym'        => 'Gym',
                'restaurant' => 'Restaurant',
            ],
        ],
    ],
];
```

### Dynamic Options Handler

```php
'categories' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'handler' => 'App\\Category\\CategoryOptionsHandler@handle',
    ],
],
```

Handler example:

```php
namespace App\Category;

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;

class CategoryOptionsHandler
{
    public function handle(CheckboxesFieldType $fieldType)
    {
        $options = [];
        
        $categories = CategoryModel::where('active', true)
            ->orderBy('name')
            ->get();
            
        foreach ($categories as $category) {
            $options[$category->id] = $category->name;
        }
        
        $fieldType->setOptions($options);
    }
}
```

### Permissions/Roles Selection

```php
'user_permissions' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'mode'    => 'dropdown',
        'options' => [
            'users.create' => 'Create Users',
            'users.edit'   => 'Edit Users',
            'users.delete' => 'Delete Users',
            'posts.create' => 'Create Posts',
            'posts.edit'   => 'Edit Posts',
            'posts.delete' => 'Delete Posts',
        ],
    ],
],
```

## Accessing Values

### Basic Output

```php
// Get selected values as array
$selected = $entry->preferences; // ['technology', 'sports']

// Check if value is selected
if (in_array('technology', $entry->preferences)) {
    echo 'Technology is selected';
}

// Count selections
$count = count($entry->preferences);
```

### In Templates

```twig
{# Loop through selected values #}
{% for value in entry.preferences %}
    <span class="badge">{{ value }}</span>
{% endfor %}

{# Check if specific value is selected #}
{% if 'technology' in entry.preferences %}
    <p>User is interested in technology</p>
{% endif %}

{# Count selections #}
<p>{{ entry.preferences|length }} items selected</p>
```

### Presenter Output

```php
// Get labels for selected values
$labels = $entry->present()->preferences->labels(); // ['Technology', 'Sports']

// Get formatted list
echo $entry->present()->preferences->list(); // "Technology, Sports"

// Get as HTML list
echo $entry->present()->preferences->ul();
```

## Setting Values

### By Array

```php
$entry->preferences = ['technology', 'sports', 'music'];
$entry->save();
```

### Single Value

```php
$entry->preferences = ['technology'];
$entry->save();
```

### Empty/Clear

```php
$entry->preferences = [];
$entry->save();
```

## Database Column Type

Stores values as TEXT (JSON array):

```php
Schema::table('your_table', function (Blueprint $table) {
    $table->text('preferences')->nullable();
});
```

## Validation

```php
'preferences' => [
    'type'  => 'anomaly.field_type.checkboxes',
    'rules' => [
        'required',
        'array',
        'min:2', // At least 2 selections
        'max:5', // Maximum 5 selections
    ],
    'config' => [
        'options' => [
            'option1' => 'Option 1',
            'option2' => 'Option 2',
            'option3' => 'Option 3',
        ],
    ],
],
```

## Common Use Cases

### User Preferences
```php
'notification_preferences' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'options' => [
            'email'  => 'Email Notifications',
            'sms'    => 'SMS Notifications',
            'push'   => 'Push Notifications',
            'weekly' => 'Weekly Digest',
        ],
    ],
],
```

### Feature Flags
```php
'enabled_features' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'options' => [
            'api'       => 'API Access',
            'analytics' => 'Analytics',
            'export'    => 'Data Export',
            'webhooks'  => 'Webhooks',
        ],
    ],
],
```

### Product Attributes
```php
'product_features' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'mode'    => 'tags',
        'options' => [
            'waterproof' => 'Waterproof',
            'wireless'   => 'Wireless',
            'rechargeable' => 'Rechargeable',
            'portable'   => 'Portable',
        ],
    ],
],
```

### Content Tags
```php
'article_topics' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'handler' => 'topics',
        'mode'    => 'dropdown',
    ],
],
```

## Best Practices

### Option Organization
- Keep options list manageable (< 20 items)
- Use handlers for dynamic options
- Order options logically
- Use clear, concise labels

### Performance
- Use handlers for large option sets
- Cache dynamic options
- Consider select field type for very large sets

### User Experience
- Use checkboxes mode for < 7 options
- Use dropdown mode for 7-20 options
- Use tags mode for visual appeal
- Provide search for large lists

## Advanced Usage

### Conditional Options

```php
class ConditionalOptionsHandler
{
    public function handle(CheckboxesFieldType $fieldType, UserInterface $user)
    {
        $options = [
            'basic' => 'Basic Features',
        ];
        
        if ($user->hasRole('premium')) {
            $options['advanced'] = 'Advanced Features';
            $options['pro'] = 'Pro Features';
        }
        
        $fieldType->setOptions($options);
    }
}
```

### Grouped Options

```php
'permissions' => [
    'type'   => 'anomaly.field_type.checkboxes',
    'config' => [
        'options' => [
            'Users' => [
                'users.create' => 'Create',
                'users.edit'   => 'Edit',
                'users.delete' => 'Delete',
            ],
            'Posts' => [
                'posts.create' => 'Create',
                'posts.edit'   => 'Edit',
                'posts.delete' => 'Delete',
            ],
        ],
    ],
],
```

## Requirements

- PyroCMS 3.x
- Anomaly Streams Platform ^1.10

## License

This field type is open-sourced software licensed under the [MIT license](LICENSE.md).

## Authors

- **PyroCMS, Inc.** - [Website](http://pyrocms.com/) - support@pyrocms.com
- **Ryan Thompson** - [Website](http://ryanthepyro.com/)

