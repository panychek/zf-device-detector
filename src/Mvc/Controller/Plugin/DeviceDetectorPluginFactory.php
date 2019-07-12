<?php

namespace ZfDeviceDetector\Mvc\Controller\Plugin;

use DeviceDetector\DeviceDetector;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class DeviceDetectorPluginFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DeviceDetectorPlugin
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var DeviceDetector $deviceDetector */
        $deviceDetector = $container->get(DeviceDetector::class);

        return new DeviceDetectorPlugin($deviceDetector);
    }
}
