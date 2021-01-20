# Cyberfusion cluster API client

Easily use the [API of the clusters](https://cluster-api.cyberfusion.nl/) of the hosting company 
[Cyberfusion](https://cyberfusion.nl/). 

This package is not created or maintained by Cyberfusion.

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
use Vdhicts\Cyberfusion\ClusterApi\Client;
use Vdhicts\Cyberfusion\ClusterApi\Configuration;
use Vdhicts\Cyberfusion\ClusterApi\ClusterApi;

// Create the configuration from your access token or username/password
$configuration = Configuration::withCredentials('username', 'password');
//$configuration = Configuration::withAccessToken('accessToken');

// Start the client once and authorize
$client = new Client($configuration);

// Initialize the API
$api = new ClusterApi($client);

// Perform the request
$result = $api->virtualHosts()->list();
```

### Requests

The endpoint methods may ask for filters, models or id's. The method typehints will tell you which input is requested. 
When models need to be provided, the required attributes will be checked before executing the request. A 
`RequestException` will be thrown when attributes are missing. See the message for more details.

#### Manually make requests

When you want to use the API directly, you can use the `request()` method on the `Client`. This method needs a `Request`
class. See the class itself for its options.

### Responses

The endpoint methods throw exceptions when the request fails due to timeouts. When the API replies with HTTP protocol 
errors the `Response` class is still returned. You can check the success of the request with: `$response->isSuccess()`. 
The content of the response isn't automatically converted to the models. I might add that in the future or feel free to
create a PR for it.

### Authentication

The API is authenticated with a username and password and returns an access token. This package takes care of the 
authentication for you. That can be with a username and password or access token:

```php
$configuration = Configuration::withCredentials('username', 'password');
$configuration = Configuration::withAccessToken('accessToken');
```

When you authenticate with username and password, this package will automatically retrieve the access token. If you 
want to store the access token, it's stored in the `Configuration` class and accessible with: 
`$configuration->getAccessToken()`. 

#### Manually authenticate

It's also an option to manually authenticate:

```php
use Vdhicts\Cyberfusion\ClusterApi\Client;
use Vdhicts\Cyberfusion\ClusterApi\ClusterApi;
use Vdhicts\Cyberfusion\ClusterApi\Configuration;
use Vdhicts\Cyberfusion\ClusterApi\Models\Login;

// Initialize the configuration without any credentials or access token
$configuration = new Configuration();

// Start the client with manual authentication
$client = new Client($configuration, true);

// Initialize the API
$api = new ClusterApi($client);

// Create the request
$login = new Login();
$login->username = 'username';
$login->password = 'password';

// Perform the request
$response = $api->authentication()->login($login);

// Store the access token in the configuration
if ($response->isSuccess()) {
    $configuration->setAccessToken($response->getData('access_token'));
}
```

### Exceptions

When something goes wrong, the client will throw an exception which extends the `ClusterApiException`. If you want to 
catch exceptions from this package, that's the one you should catch. All exceptions have a code, these codes can be 
found in the `ClusterApiException` class.

## Contribution

Any contribution is welcome, but it should meet the PSR-2 standard and please create one pull request per feature/bug. 
In exchange, you will be credited as contributor on this page.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## About Vdhicts

[Vdhicts](https://www.vdhicts.nl) is the name of my personal company for which I work as freelancer. Vdhicts develops 
and implements IT solutions for businesses and educational institutions.
