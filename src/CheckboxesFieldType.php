<?php

namespace Anomaly\CheckboxesFieldType;

use Illuminate\Support\Arr;
use Anomaly\CheckboxesFieldType\Handler\States;
use Anomaly\CheckboxesFieldType\Handler\Countries;
use Anomaly\CheckboxesFieldType\Command\BuildOptions;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class CheckboxesFieldType
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
    protected $inputView = null;

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.checkboxes::filter';

    /**
     * The field type rules.
     *
     * @var array
     */
    public $rules = [
        'array',
    ];

    /**
     * The option handlers.
     *
     * @var array
     */
    protected $handlers = [
        'states'    => States::class,
        'countries' => Countries::class,
    ];

    /**
     * The field type config.
     *
     * @var array
     */
    public $config = [
        'separator' => ':',
        'options'   => null,
        'mode'      => 'checkboxes',
        'handler'   => CheckboxesFieldTypeOptions::class,
    ];

    /**
     * The checkboxes options.
     *
     * @var null
     */
    protected $options = null;

    /**
     * Get the dropdown options.
     *
     * @return array
     */
    public function getOptions()
    {
        if ($this->options === null) {
            dispatch_now(new BuildOptions($this));
        }

        return $this->options;
    }

    /**
     * Set the options.
     *
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the handlers.
     *
     * @return array
     */
    public function getHandlers()
    {
        return $this->handlers;
    }

    /**
     * Get the rules.
     *
     * @return array
     */
    public function getRules()
    {
        $rules = parent::getRules();

        if ($min = Arr::get($this->getConfig(), 'min')) {
            $rules[] = 'min:' . $min;
        }

        if ($max = Arr::get($this->getConfig(), 'max')) {
            $rules[] = 'max:' . $max;
        }

        return $rules;
    }

    /**
     * Return the required flag.
     *
     * @return bool
     */
    public function isRequired()
    {
        if ((!$required = parent::isRequired()) && Arr::get($this->getConfig(), 'min')) {
            return true;
        }

        return $required;
    }

    /**
     * Return the input view.
     *
     * @return string
     */
    public function getInputView()
    {
        if ($this->inputView) {
            return $this->inputView;
        }

        return 'anomaly.field_type.checkboxes::' . $this->config('mode', 'checkboxes');
    }

    /**
     * Implode array options into a string
     * so that they can be edited in the CP.
     *
     * @param array $config
     */
    protected function implodeOptions(array &$config)
    {
        if (isset($config['options']) && is_array($config['options'])) {
            array_walk(
                $config['options'],
                function (&$value, $key) {
                    return $value = $key . ': ' . $value;
                }
            );

            $config['options'] = implode("\n", $config['options']);
        }
    }
}
