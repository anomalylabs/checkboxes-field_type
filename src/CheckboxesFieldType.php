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
     * Return the HTML options.
     *
     * @return mixed
     */
    public function input()
    {
        return app('form')->checkbox($this->getFieldName(), true, $this->getValue());
    }
}
