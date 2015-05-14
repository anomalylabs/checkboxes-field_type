<?php namespace Anomaly\CheckboxesFieldType\Command;

use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class ParseOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\CheckboxesFieldType\Command
 */
class ParseOptions implements SelfHandling
{

    /**
     * The string options.
     *
     * @var string
     */
    protected $options;

    /**
     * Create a new ParseOptions instance.
     *
     * @param $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * Handle the command.
     *
     * @return array
     */
    public function handle()
    {
        $options = [];

        foreach (explode("\n", $this->options) as $option) {

            // Split on the first ":"
            $option = explode(':', $option, 2);

            $key   = array_shift($option);
            $value = $option ? array_shift($option) : $key;

            $options[$key] = ltrim(trim($value));
        }

        return $options;
    }
}
