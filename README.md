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
{"id":8,"iso":"FR","call_prefix":"33","contains_states":false,"need_identification_number":false,"need_zip_code":true,"zip_code_format":"NNNNN","display_tax_label":true,"address_format":"firstname lastname\ncompany\nvat_number\naddress1\naddress2\npostcode city\nCountry:name\nphone","zone":{"code":"Europe","name":"Europe","url":"\/data\/zones\/Europe"},"states":[],"timezone":{"code":"Europe_Paris","name":"Europe\/Paris","url":"\/data\/timezones\/Europe_Paris"},"currencies":[{"iso_code":"EUR","url":"\/data\/currencies\/EUR"}],"languages":[{"iso639-1":"fr","url":"\/data\/languages\/fr"}],"taxes":[{"name":"TVA FR 19.6%","rate":"19.600"},{"name":"TVA FR 7%","rate":"7.000"},{"name":"TVA FR 5.5%","rate":"5.500"},{"name":"TVA FR 2.1%","rate":"2.100"}]}
```
