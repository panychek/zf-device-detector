<?php

namespace ZfDeviceDetector\View\Helper;

use DeviceDetector\DeviceDetector;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class DeviceDetectorHelperFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DeviceDetectorHelper
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var DeviceDetector $deviceDetector */
        $deviceDetector = $container->get(DeviceDetector::class);

        return new DeviceDetectorHelper($deviceDetector);
    }
}
