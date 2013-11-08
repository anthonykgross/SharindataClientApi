Getting Started
==================================

This library allow you to integrate easily Sharindata API into your project.

## Installation

Add KkuetNetSharindataClientApi in your composer.json:

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

```json
{
    "id": 3, 
    "iso": "BE", 
    "call_prefix": 
    "32", 
    "contains_states": false, 
    "need_identification_number": false, 
    "need_zip_code": true, 
    "zip_code_format": "NNNN", 
    "display_tax_label": true, 
    "address_format": "firstname lastname\ncompany\nvat_number\naddress1\naddress2\npostcode city\nCountry:name\nphone", 
    "zone": {
        "code": "Europe", 
        "name": "Europe", 
        "url": "\/data\/zones\/Europe"
    }, 
    "states": [], 
    "timezone": {
        "code": "Europe_Brussels", 
        "name": "Europe\/Brussels", 
        "url": "\/data\/timezones\/Europe_Brussels"
    }, 
    "currencies": [
        {
            "iso_code": "EUR", 
            "url": "\/data\/currencies\/EUR"
        }
    ], 
    "languages": [
        {
            "iso639-1": "de", 
            "url": "\/data\/languages\/de"
        }, 
        {
            "iso639-1": "fr", 
            "url": "\/data\/languages\/fr"
        }, 
        {
            "iso639-1": "nl", 
            "url": "\/data\/languages\/nl"
        }
    ], 
    "taxes": [
        {
            "name": "TVA BE 21%", 
            "rate": "21.000"
        }, 
        {
            "name": "TVA BE 12%", 
            "rate": "12.000"
        }, 
        {
            "name": "TVA BE 6%", 
            "rate": "6.000"
        }
    ]
}
```
