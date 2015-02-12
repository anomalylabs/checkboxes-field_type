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
        $checked = $this->getValue();

        $options = array_get($this->config, 'options', []);

        foreach ($options as $value => $label) {

            $options[$value] = [
                'value'   => $value,
                'label'   => $label,
                'checked' => in_array($value, $checked),
            ];
        }

        return $options;
    }

    /**
     * Get the value. Assure it's an array.
     *
     * @return array
     */
    public function getValue()
    {
        return (array)parent::getValue();
    }
}
