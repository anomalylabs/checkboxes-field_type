<?php namespace Anomaly\Streams\Addon\FieldType\Checkboxes;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class CheckboxesFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Checkboxes
 */
class CheckboxesFieldType extends FieldType
{

    /**
     * Get the field name.
     *
     * @return string
     */
    public function getFieldName()
    {
        return parent::getFieldName() . '[]';
    }

    /**
     * Serialize the value going into the model.
     *
     * @param $value
     * @return string
     */
    public function mutate($value)
    {
        return serialize((array)$value);
    }

    /**
     * Unserialize the value when accessing from the model.
     *
     * @param $value
     * @return array
     */
    public function unmutate($value)
    {
        return (array)unserialize($value);
    }
}
