Getting Started
==================================

This library allow you to integrate easily Sharindata API into your project.

## Installation

Add KkuetNetPrestashopWebServiceBundle in your composer.json:

```js
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/kkuetnet/SharindataClientApi.git"
        }
    ]
    "require": {
        "kkuetnet/sharindata-client-api": "dev-master"
    }
}
```
Composer will install the library to your project's `vendor/kkuetnet/sharindata-client-api` directory.

## How to use

```php
$response = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("your_login", "your_password");
var_dump($response->getCountry("fr"));
```
