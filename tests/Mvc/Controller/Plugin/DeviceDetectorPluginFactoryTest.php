<?php

namespace ZfDeviceDetectorTest\Mvc\Controller\Plugin;

use DeviceDetector\DeviceDetector;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;
use ZfDeviceDetector\Mvc\Controller\Plugin\DeviceDetectorPlugin;
use ZfDeviceDetector\Mvc\Controller\Plugin\DeviceDetectorPluginFactory;

class DeviceDetectorPluginFactoryTest extends TestCase
{
    /**
     * @var DeviceDetectorPluginFactory
     */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new DeviceDetectorPluginFactory();
    }

    public function testCreatesPlugin()
    {
        $config = [
            'services' => [
                DeviceDetector::class => new DeviceDetector()
            ],
        ];
        $container = new ServiceManager($config);
        $plugin = ($this->factory)($container, DeviceDetectorPlugin::class);

        $this->assertInstanceOf(DeviceDetectorPlugin::class, $plugin);
    }
}
