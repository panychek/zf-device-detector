<?php

namespace ZfDeviceDetector\Mvc\Controller\Plugin;

use DeviceDetector\DeviceDetector;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class DeviceDetectorPlugin extends AbstractPlugin
{
    /**
     * @var DeviceDetector
     */
    private $deviceDetector;

    /**
     * @param DeviceDetector $deviceDetector
     */
    public function __construct(DeviceDetector $deviceDetector)
    {
        $this->deviceDetector = $deviceDetector;
    }

    /**
     * @return DeviceDetector
     */
    public function __invoke()
    {
        return $this->deviceDetector;
    }
}
