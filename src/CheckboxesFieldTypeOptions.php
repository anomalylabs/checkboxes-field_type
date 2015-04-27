<?php namespace Anomaly\CheckboxesFieldType;

/**
 * Class CheckboxesFieldTypeOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\CheckboxesFieldType
 */
class CheckboxesFieldTypeOptions
{

    /**
     * Handle the select options.
     *
     * @param CheckboxesFieldType $fieldType
     * @return array
     */
    public function handle(CheckboxesFieldType $fieldType)
    {
        return array_get($fieldType->getConfig(), 'options', []);
    }
}
