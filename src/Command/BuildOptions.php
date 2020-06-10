<?php namespace Anomaly\CheckboxesFieldType\Command;

use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use Anomaly\CheckboxesFieldType\CheckboxesFieldType;

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

        if (!class_exists($handler) && !str_contains($handler, '@')) {
            $handler = Arr::get($this->fieldType->getHandlers(), $handler);
        }

        $container->call($handler, ['fieldType' => $this->fieldType], 'handle');
    }
}
