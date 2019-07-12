<?php

namespace ZfDeviceDetectorTest\View\Helper;

use DeviceDetector\DeviceDetector;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;
use ZfDeviceDetector\View\Helper\DeviceDetectorHelper;
use ZfDeviceDetector\View\Helper\DeviceDetectorHelperFactory;

class DeviceDetectorHelperFactoryTest extends TestCase
{
    /**
     * @var DeviceDetectorHelperFactory
     */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new DeviceDetectorHelperFactory();
    }

    public function testCreatesViewHelper()
    {
        $config = [
            'services' => [
                DeviceDetector::class => new DeviceDetector()
            ],
        ];
        $container = new ServiceManager($config);
        $helper = ($this->factory)($container, DeviceDetectorHelper::class);

        $this->assertInstanceOf(DeviceDetectorHelper::class, $helper);
    }
}
