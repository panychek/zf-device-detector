# ZfDeviceDetector

ZF3 module that utilizes the [DeviceDetector](https://github.com/matomo-org/device-detector) library to provide device detection support for your MVC application.

## Installation

Install the module via [Composer](http://getcomposer.org/):

```bash
composer require panychek/zf-device-detector
```

Then add the module name to your project's `config/application.config.php` under the `modules` key:

```php
return [
    'modules' => [
        // ...
        'ZfDeviceDetector',
    ],
    // ...
];
```

## Usage

This module registers a new service in your application's service manager, which will be available under the `DeviceDetector::class` key.
This service provides an actual `DeviceDetector` instance, initialized with the User Agent fetched from the built-in `Request` service.
 
The module also provides a view helper and a controller plugin that proxy all the calls to that instance.

For more information on the supported features, please refer to the [library documentation](https://github.com/matomo-org/device-detector).

### Service

Within your *factories* use:

```php
$deviceDetector = $container->get(DeviceDetector::class);
$client = $deviceDetector->getClient();
```

### View helper

Within your *view templates* use:

```php
$client = $this->deviceDetector()->getClient();
```

### Controller plugin

Within your *controllers* use:

```php
$client = $this->deviceDetector()->getClient();
```
