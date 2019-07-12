<?php

namespace ZfDeviceDetector\Service;

use DeviceDetector\DeviceDetector;
use Interop\Container\ContainerInterface;
use Zend\Console\Request as ConsoleRequest;
use Zend\Http\PhpEnvironment\Request;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;

class DeviceDetectorFactory implements FactoryInterface
{
    const REQUEST_SERVICE_NAME = 'Request';

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DeviceDetector
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        if (!$container->has(self::REQUEST_SERVICE_NAME)) {
            $message = 'Request service was not found in the container';
            throw new ServiceNotCreatedException($message);
        }

        /** @var ConsoleRequest|Request $request */
        $request = $container->get(self::REQUEST_SERVICE_NAME);

        $userAgent = '';
        if ($request instanceof Request) {
            $userAgent = $request->getHeader('user-agent')->getFieldValue();
        }

        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();

        return $deviceDetector;
    }
}
