<?php namespace Anomaly\CheckboxesFieldType\Command;

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;

class ParseOptions
{

    /**
     * The string options.
     *
     * @var string
     */
    protected $options;

    /**
     * The field type instance.
     *
     * @var CheckboxesFieldType
     */
    protected $fieldType;

    /**
     * Create a new ParseOptions instance.
     *
     * @param CheckboxesFieldType $fieldType
     * @param $options
     */
    public function __construct(CheckboxesFieldType $fieldType, $options)
    {

        $this->options   = $options;
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @return array
     */
    public function handle()
    {
        $options = [];

        if (!$separator = trim($this->fieldType->config('separator', ':'))) {
            $separator = ':';
        }

        foreach (explode("\n", $this->options) as $option) {

            // Split on the first ":"
            if (str_is('*' . $separator . '*', $option)) {
                $option = explode($separator, $option, 2);
            } else {
                $option = [$option, $option];
            }

            $key   = array_shift($option);
            $value = $option ? array_shift($option) : $key;

            $options[ltrim(trim($key, "\r\n"), "\r\n")] = ltrim(trim($value, "\r\n"), "\r\n");
        }

        return $options;
    }
}
