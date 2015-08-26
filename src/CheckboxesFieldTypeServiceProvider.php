<?php namespace Anomaly\CheckboxesFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class CheckboxesFieldTypeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\CheckboxesFieldType
 */
class CheckboxesFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\CheckboxesFieldType\CheckboxesFieldTypeModifier' => 'Anomaly\CheckboxesFieldType\CheckboxesFieldTypeModifier'
    ];

}
