<?php

use Anomaly\CheckboxesFieldType\CheckboxesFieldType;
use Anomaly\CheckboxesFieldType\CheckboxesFieldTypeServiceProvider;

class CheckboxesFieldTypeServiceProviderTest extends TestCase
{

    public function testProvides()
    {
        $provider = app(CheckboxesFieldTypeServiceProvider::class, ['app' => app()]);

        $provides = $provider->provides();

        $this->assertTrue(in_array(CheckboxesFieldType::class, $provides));
        $this->assertTrue(in_array('anomaly.field_type.checkboxes', $provides));
    }
}
