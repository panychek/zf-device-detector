<?php

namespace ZfDeviceDetectorTest\View\Helper;

use DeviceDetector\DeviceDetector;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;
use ZfDeviceDetector\View\Helper\DeviceDetectorHelper;
use ZfDeviceDetector\View\Helper\DeviceDetectorHelperFactory;

class DeviceDetectorHelperTest extends TestCase
{
    /**
     * @var DeviceDetectorHelper
     */
    protected $helper;

    protected function setUp()
    {
        $config = [
            'services' => [
                DeviceDetector::class => new DeviceDetector()
            ],
        ];
        $container = new ServiceManager($config);

        $factory = new DeviceDetectorHelperFactory();
        $this->helper = ($factory)($container, DeviceDetectorHelper::class);
    }

    public function testProxiesCall()
    {
        $this->assertInternalType('array', ($this->helper)()->getClientParsers());
    }
}
