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
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'field_type.checkboxes::input';

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

    /**
     * Get the view data for the input view.
     *
     * @return array
     */
    public function getInputData()
    {
        $data = parent::getInputData();

        $data['options'] = $this->getOptions();

        return $data;
    }

    /**
     * Return options available.
     *
     * @return array
     */
    public function getOptions()
    {
        $checked = $this->getValue();

        $options = $this->pullConfig('options', []);

        foreach ($options as $value => &$label) {

            $options[$value] = [
                'value'   => $value,
                'label'   => trans($label),
                'checked' => in_array($value, $checked),
            ];
        }

        return $options;
    }


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
     * Get the value. Assure it's an array.
     *
     * @return array
     */
    public function getValue()
    {
        return (array)parent::getValue();
    }
}
