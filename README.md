Pyrrah OpenWeatherMap 🌞
========================

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Total Downloads][ico-downloads]][link-downloads]

This bundle allows you to easily get the weather for a city or a location, via the OpenWeatherMap service.

*Source based on [`OpenWeatherMap`](https://github.com/endroid/OpenWeatherMap) and Endroid [`OpenWeatherMapBundle`](https://github.com/endroid/OpenWeatherMapBundle), today deprecated. This new version is compatible with Symfony 5 to 6.*

Requirements
------------

* Symfony 5 or 6
* API Key (APPID) from [OpenWeatherMap](https://home.openweathermap.org/users/sign_up)*²*
* Dependencies: [`Guzzle`](https://packagist.org/packages/guzzlehttp/guzzle)

*²Please note that the free version of OpenWeatherMap restricts the number of calls per month (see [documentation] (https://openweathermap.org/price)). For a large number of calls, I recommend to setting up a cache (not currently managed in this package).*

Installation
------------

  1. To install this bundle, run the following [Composer](https://getcomposer.org/) command :

  ```
  composer require pyrrah/openweathermap-bundle
  ```

  2. Check configuration file is correctly installed, and edit the default values ​​with yours ([Official API docs](https://openweathermap.org/api)) :

  ```yaml
    # config/packages/pyrrah_openweathermap.yaml
    pyrrah_openweathermap:
        api_key: your_api_key
        api_url: https://api.openweathermap.org/data/2.5/
        units: metric
        language: en
  ```

Routing (optional)
------------------

If you don't want to expose the OpenWeatherMap API via your application, you can skip this section.

## Configuration

``` yml
PyrrahOpenWeatherMapBundle:
    resource:	"@PyrrahOpenWeatherMapBundle/Controller/"
    type:		annotation
    prefix:		/openweathermap/api
```

This exposes the OpenWeatherMap API via <yourdomain>/openweathermap/api. This means that instead of sending a request to
http://api.openweathermap.org/ you can now send an unsigned request to <yourdomain>/openweathermap/api/*. Make sure you
secure this area if you don't want others to be able to post on your behalf.

Usage
-----

After installation and configuration, the service can be directly referenced from within your controllers.

```php
<?php

use Pyrrah\OpenWeatherMapBundle\Services\Client;

/** @var Client $client */
$client = $this->get('pyrrah.openweathermap.client');

// Retrieve the current weather for Paris, FR
$weather = $client->getWeather('Paris,fr');

// Or retrieve the weather using the generic query method
$response = $client->query('weather', array('q' => 'Paris,fr'));
$weather = json_decode($response->getContent());

```

Credits
-------

- [Pierre-Yves Dick][link-author]
- [All Contributors][link-contributors]

License
-------

This bundle is under the MIT license. For the full copyright and license
information please view the [License File](LICENSE) that was distributed with this source code.

[ico-version]: https://img.shields.io/packagist/v/pyrrah/openweathermap-bundle.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pyrrah/openweathermap-bundle.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pyrrah/openweathermap-bundle
[link-downloads]: https://packagist.org/packages/pyrrah/openweathermap-bundle
[link-author]: https://github.com/Pyrrah
[link-contributors]: ../../contributors