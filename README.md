# Cyberfusion cluster API client

Easily use the API of the clusters of Cyberfusion.

## Requirements

This package requires PHP 7.4 and uses Guzzle.

## Installation

This package can be used in any PHP project or with any framework.

You can install the package via composer:

`composer require vdhicts/cyberfusion-cluster-api-client`

## Usage

This package is just an easy client for using the UptimeRobot API. Please refer to the API documentation for more 
information about the requests.

### Getting started

```php
use Vdhicts\CyberfusionClusterApi\Client;

// Start the client once
$client = new Client();

// Perform the request
$result = $client->perform('method', 'endpoint', ['payload']);
```

### Exceptions

When something goes wrong, the client will throw an exception which extends the `CyberfusionClusterApiException`. If you
want to catch exceptions from this package, that's the one you should catch.

## Contribution

Any contribution is welcome, but it should meet the PSR-2 standard and please create one pull request  per feature. In
exchange you will be credited as contributor on this page.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## About Vdhicts

[Vdhicts](https://www.vdhicts.nl) is the name of my personal company for which I work as freelancer. Vdhicts develops 
and implements IT solutions for businesses and educational institutions.
