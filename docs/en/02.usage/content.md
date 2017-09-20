---
title: Usage
---

## Usage[](#usage)

This section will show you how to use the field type via API and in the view layer.


### Setting Values[](#usage/setting-values)

You must set the value for a checkboxes field type with a key or keys from the available options:

    $entry->example = "foo";

You can set multiple values with an array:

    $entry->example = ["foo", "bar"];


### Basic Output[](#usage/basic-output)

The addon field type returns an array of value keys.

    $entry->example; // ["foo", "bar"]


### Presenter Output[](#usage/presenter-output)

This section will show you how to use the decorated value provided by the `\Anomaly\CheckboxesFieldType\CheckboxesFieldTypePresenter` class.


#### CheckboxesFieldTypePresenter::count()[](#usage/presenter-output/checkboxesfieldtypepresenter-count)

The `count` method returns the number of selected options.

###### Returns: `integer`

###### Example

    $decorated->example->count();

###### Twig

    {{ decorated.example.count() }}


#### CheckboxesFieldTypePresenter::total()[](#usage/presenter-output/checkboxesfieldtypepresenter-total)

The `total` method returns the total number of available options.

###### Returns: `integer`

###### Example

    $decorated->example->total();

###### Twig

    {{ decorated.example.total() }}


#### CheckboxesFieldTypePresenter::keys()[](#usage/presenter-output/checkboxesfieldtypepresenter-keys)

The `keys` method returns an array of selected value keys.

###### Returns: `array`

###### Example

    $decorated->example->keys();

###### Twig

    {{ decorated.example.keys() }}


#### CheckboxesFieldTypePresenter::values()[](#usage/presenter-output/checkboxesfieldtypepresenter-values)

The `values` method returns an array of selected values.

###### Returns: `array`

###### Example

    $decorated->example->values();

###### Twig

    {{ decorated.example.values() }}


#### CheckboxesFieldTypePresenter::selections()[](#usage/presenter-output/checkboxesfieldtypepresenter-selections)

The `selections` method returns an associated array of selected `key => value` pairs.

###### Returns: `array`

###### Example

    $decorated->example->selections();

###### Twig

    {{ decorated.example.selections() }}
