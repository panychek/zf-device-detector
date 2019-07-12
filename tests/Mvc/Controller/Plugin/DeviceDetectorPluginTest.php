<?php

namespace ZfDeviceDetectorTest\Mvc\Controller\Plugin;

use DeviceDetector\DeviceDetector;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;
use ZfDeviceDetector\Mvc\Controller\Plugin\DeviceDetectorPlugin;
use ZfDeviceDetector\Mvc\Controller\Plugin\DeviceDetectorPluginFactory;

class DeviceDetectorPluginTest extends TestCase
{
    /**
     * @var DeviceDetectorPlugin
     */
    protected $plugin;

    protected function setUp()
    {
        $config = [
            'services' => [
                DeviceDetector::class => new DeviceDetector()
            ],
        ];
        $container = new ServiceManager($config);

        $factory = new DeviceDetectorPluginFactory();
        $this->plugin = ($factory)($container, DeviceDetectorPlugin::class);
    }

    public function testProxiesCall()
    {
        $this->assertInternalType('array', ($this->plugin)()->getClientParsers());
    }
}
