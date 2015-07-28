<?php namespace Anomaly\CheckboxesFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class CheckboxesFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\CheckboxesFieldType
 */
class CheckboxesFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The decorated object.
     * This is for IDE hinting.
     *
     * @var CheckboxesFieldType
     */
    protected $object;

    /**
     * Return the option keys.
     *
     * @return array
     */
    public function keys()
    {
        return array_keys($this->selections());
    }

    /**
     * Return the option values.
     *
     * @return array
     */
    public function values()
    {
        return array_values($this->selections());
    }

    /**
     * Return the selections array.
     *
     * @return array
     */
    public function selections()
    {
        $value   = $this->object->getValue();
        $options = $this->object->getOptions();

        return array_intersect_key($options, array_flip($value));
    }
}
