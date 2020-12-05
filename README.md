Pyrrah OpenWeatherMap 🌞
========================

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Total Downloads][ico-downloads]][link-downloads]

This bundle is based on [`OpenWeatherMap`](https://github.com/endroid/OpenWeatherMap) and Endroid [`OpenWeatherMapBundle`](https://github.com/endroid/OpenWeatherMapBundle).

OpenWeatherMap helps making requests to the OpenWeatherMap API, without having to bother too much about passing your API
key and building requests. The only thing you need is the API key (APPID) which you can find after [registration on the
website](https://home.openweathermap.org/users/sign_up).

Official API docs: https://openweathermap.org/api


## Requirements

* Symfony 2 or 3
* Dependencies:
 * [`Guzzle`](https://github.com/guzzle/guzzle/)

## Installation

### Add in your composer.json

```js
{
    "require": {
        "pyrrah/openweathermap-bundle": "dev-master"
    }
}
```

### Install the bundle

``` bash
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar update pyrrah/openweathermap-bundle
```

Composer will install the bundle to your project's `vendor/endroid` directory.

### Enable the bundle via the kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Pyrrah\Bundle\OpenWeatherMapBundle\PyrrahOpenWeatherMapBundle(),
    );
}
```

## Configuration

### config.yml

```yaml
pyrrah_openweathermap:
    api_key: your_api_key
    api_url:
    units: ... // optional
```

## Routing

If you don't want to expose the OpenWeatherMap API via your application, you can skip this section.

``` yml
PyrrahOpenWeatherMapBundle:
    resource:	"@PyrrahOpenWeatherMapBundle/Controller/"
    type:		annotation
    prefix:		/openweathermap/api
```

This exposes the OpenWeatherMap API via <yourdomain>/openweathermap/api. This means that instead of sending a request to
http://api.openweathermap.org/ you can now send an unsigned request to <yourdomain>/openweathermap/api/*. Make sure you
secure this area if you don't want others to be able to post on your behalf.

## Usage

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

## Credits

- [Pierre-Yves Dick][link-author]
- [All Contributors][link-contributors]

## License

This bundle is under the MIT license. For the full copyright and license
information please view the [License File](LICENSE) that was distributed with this source code.

[ico-version]: https://img.shields.io/packagist/v/pyrrah/openweathermap-bundle.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pyrrah/openweathermap-bundle.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pyrrah/openweathermap-bundle
[link-downloads]: https://packagist.org/packages/pyrrah/openweathermap-bundle
[link-author]: https://github.com/Pyrrah
[link-contributors]: ../../contributors