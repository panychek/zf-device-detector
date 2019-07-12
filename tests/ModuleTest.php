<?php

namespace ZfDeviceDetectorTest\View\Helper;

use PHPUnit\Framework\TestCase;
use ZfDeviceDetector\Module;

class ModuleTest extends TestCase
{
    /**
     * @var Module
     */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testConfig()
    {
        $config = $this->module->getConfig();
        $this->assertInternalType('array', $config);

        $this->assertArrayHasKey('controller_plugins', $config);
        $this->assertArrayHasKey('service_manager', $config);
        $this->assertArrayHasKey('view_helpers', $config);
    }
}
