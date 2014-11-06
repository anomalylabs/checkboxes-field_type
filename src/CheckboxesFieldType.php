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
     * The field view.
     *
     * @var string
     */
    protected $view = 'field_type.checkboxes::element';

    /**
     * Return the HTML options.
     *
     * @return mixed
     */
    public function input()
    {
        $output = '';

        foreach (['test' => 'Test input!', 'test2' => 'Test input 2'] as $key => $value) {
            $output .= '<label>' . app('form')->checkbox(
                    $this->getFieldName(),
                    $key,
                    $this->getValue()
                ) . '&nbsp;' . $value . '</label>';
        }

        return $output;
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
     * When setting the value to the entry.
     *
     * @param $value
     * @return string
     */
    protected function onSet($value)
    {
        return json_encode((array)$value);
    }

    /**
     * When getting the value from the entry.
     *
     * @param $value
     * @return mixed
     */
    protected function onGet($value)
    {
        return json_decode($value);
    }
}
