<?php namespace Anomaly\Streams\Addon\FieldType\Checkboxes;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class CheckboxesFieldType extends FieldType
{

    public function input()
    {
        $options = array(
            'id' => $this->fieldName(),
        );

        return \Form::checkbox($this->fieldName(), true, $this->value, $options);
    }
}
