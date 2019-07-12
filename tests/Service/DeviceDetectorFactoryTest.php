<?php

namespace ZfDeviceDetectorTest\Service;

use DeviceDetector\DeviceDetector;
use PHPUnit\Framework\TestCase;
use Zend\Http\PhpEnvironment\Request;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\Parameters;
use ZfDeviceDetector\Service\DeviceDetectorFactory;

class DeviceDetectorFactoryTest extends TestCase
{
    /**
     * @var DeviceDetectorFactory
     */
    protected $factory;

    protected function setUp()
    {
        $this->factory = new DeviceDetectorFactory();
    }

    public function testUserAgentAware()
    {
        $userAgent = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';

        $request = new Request();
        $server = new Parameters([
            'HTTP_USER_AGENT' => $userAgent
        ]);
        $request->setServer($server);

        $config = [
            'services' => [
                'Request' => $request,
            ],
        ];
        $container = new ServiceManager($config);

        $deviceDetector = ($this->factory)($container, DeviceDetector::class);
        $this->assertTrue($deviceDetector->isBot());
    }

    public function testMissingRequestServiceThrowsException()
    {
        $this->expectException(ServiceNotCreatedException::class);

        $container = new ServiceManager();
        ($this->factory)($container, DeviceDetector::class);
    }
}
