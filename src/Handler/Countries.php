<?php namespace Anomaly\CheckboxesFieldType\Handler;

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;


/**
 * Class Countries
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CheckboxesFieldType\Handler
 */
class Countries
{

    /**
     * Handle the options.
     *
     * @param CheckboxesFieldType $fieldType
     * @param Repository $config
     */
    public function handle(CheckboxesFieldType $fieldType, Repository $config)
    {
        $fieldType->setOptions(
            array_combine(
                array_keys(config('streams::countries.available')),
                array_map(
                    function ($country) {
                        return $country['name'];
                    },
                    config('streams::countries.available')
                )
            )
        );
    }
}
