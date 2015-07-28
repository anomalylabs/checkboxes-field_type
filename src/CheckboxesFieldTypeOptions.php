<?php namespace Anomaly\CheckboxesFieldType;

use Anomaly\CheckboxesFieldType\Command\ParseOptions;
use Illuminate\Foundation\Bus\DispatchesJobs;

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

    use DispatchesJobs;

    /**
     * Handle the select options.
     *
     * @param CheckboxesFieldType $fieldType
     */
    public function handle(CheckboxesFieldType $fieldType)
    {
        $options = array_get($fieldType->getConfig(), 'options', []);

        if (is_string($options)) {
            $options = $this->dispatch(new ParseOptions($options));
        }

        $fieldType->setOptions($options);
    }
}
