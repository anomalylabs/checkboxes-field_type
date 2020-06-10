<?php namespace Anomaly\CheckboxesFieldType\Command;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Container\Container;
use Anomaly\CheckboxesFieldType\CheckboxesFieldType;

/**
 * Class BuildOptions
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BuildOptions
{

    /**
     * The field type instance.
     *
     * @var CheckboxesFieldType
     */
    protected $fieldType;

    /**
     * Create a new BuildOptions instance.
     *
     * @param CheckboxesFieldType $fieldType
     */
    public function __construct(CheckboxesFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Container $container
     */
    public function handle(Container $container)
    {
        $handler = Arr::get($this->fieldType->getConfig(), 'handler');

        if (!class_exists($handler) && !Str::contains($handler, '@')) {
            $handler = Arr::get($this->fieldType->getHandlers(), $handler);
        }

        $container->call($handler, ['fieldType' => $this->fieldType], 'handle');
    }
}
