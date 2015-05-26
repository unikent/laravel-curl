# Laravel-cURL

Laravel-cURL is a library which makes it easy to do simple cURL requests and makes more complicated cURL requests easier too.

## Requirements

1. PHP 5.5+ (configured with cURL enabled)
2. Laravel 5
4. libcurl

## Features

* POST/GET/PUT/DELETE requests over HTTP
* HTTP Authentication
* Follows redirects
* Returns error string
* Provides debug information
* Proxy support
* Cookies

## Installation

Pull this package in through Composer.

```js

    {
        "require": {
            "unikent/laravel-curl": "5.*"
        }
    }

```

Add the service provider to your `config/app.php` file:

```php

    'providers'       => [

        //...
        'Unikent\Curl\Providers\CurlServiceProvider'

    ]

```

Add the facade to your `config/app.php` file:

```php

    'aliases'         => [

        //...
        'Curl'     => 'Unikent\Curl\Facades\Curl'

    ]

```

## Examples


### Simple calls

These do it all in one line of code to make life easy. They return the body of the page, or FALSE on fail.

    // Simple call to remote URL
    echo Curl::simple_get('http://example.com/');

    // Simple call to CI URI
    Curl::simple_post('controller/method', array('foo'=>'bar'));

    // Set advanced options in simple calls
    // Can use any of these flags http://uk3.php.net/manual/en/function.curl-setopt.php

    Curl::simple_get('http://example.com', array(CURLOPT_PORT => 8080));
    Curl::simple_post('http://example.com', array('foo'=>'bar'), array(CURLOPT_BUFFERSIZE => 10));

### Advanced calls

These methods allow you to build a more complex request.

    // Start session (also wipes existing/previous sessions)
    Curl::create('http://example.com/');

    // Option & Options
    Curl::option(CURLOPT_BUFFERSIZE, 10);
    Curl::options(array(CURLOPT_BUFFERSIZE => 10));

    // More human looking options
    Curl::option('buffersize', 10);

    // Login to HTTP user authentication
    Curl::http_login('username', 'password');

    // Post - If you do not use post, it will just run a GET request
    $post = array('foo'=>'bar');
    Curl::post($post);

    // Cookies - If you do not use post, it will just run a GET request
    $vars = array('foo'=>'bar');
    Curl::set_cookies($vars);

    // Proxy - Request the page through a proxy server
    // Port is optional, defaults to 80
    Curl::proxy('http://example.com', 1080);
    Curl::proxy('http://example.com');

    // Proxy login
    Curl::proxy_login('username', 'password');

    // Execute - returns responce
    echo Curl::execute();

    // Debug data ------------------------------------------------

    // Errors
    Curl::error_code; // int
    Curl::error_string;

    // Information
    Curl::info; // array

