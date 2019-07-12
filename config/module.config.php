<?php

namespace ZfDeviceDetector;

use DeviceDetector\DeviceDetector;
use ZfDeviceDetector\Mvc\Controller\Plugin\DeviceDetectorPlugin;
use ZfDeviceDetector\Mvc\Controller\Plugin\DeviceDetectorPluginFactory;
use ZfDeviceDetector\Service\DeviceDetectorFactory;
use ZfDeviceDetector\View\Helper\DeviceDetectorHelper;
use ZfDeviceDetector\View\Helper\DeviceDetectorHelperFactory;

return [
    'controller_plugins' => [
        'factories' => [
            DeviceDetectorPlugin::class => DeviceDetectorPluginFactory::class
        ],
        'aliases' => [
            'deviceDetector' => DeviceDetectorPlugin::class
        ]
    ],
    'service_manager' => [
        'factories' => [
            DeviceDetector::class => DeviceDetectorFactory::class
        ],
    ],
    'view_helpers' => [
        'factories' => [
            DeviceDetectorHelper::class => DeviceDetectorHelperFactory::class
        ],
        'aliases' => [
            'deviceDetector' => DeviceDetectorHelper::class
        ]
    ],
];
