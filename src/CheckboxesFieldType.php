<?php namespace Anomaly\CheckboxesFieldType;

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
     * The database column type.
     *
     * @var string
     */
    public $columnType = 'text';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.checkboxes::input';

    /**
     * Return options available.
     *
     * @return array
     */
    public function getOptions()
    {
        return array_get($this->config, 'options', []);
    }
}
