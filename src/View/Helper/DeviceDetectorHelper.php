<?php

namespace ZfDeviceDetector\View\Helper;

use DeviceDetector\DeviceDetector;
use Zend\View\Helper\AbstractHelper;

class DeviceDetectorHelper extends AbstractHelper
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
