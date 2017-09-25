<?php

namespace KkuetNet\SharindataClientApi\Vendor;

use GuzzleHttp\Client;

class WsseAuth{

    public static function getToken($url){

        $client = new Client();
        $response = $client->request('POST', $url, array(
            'headers' => array(
                'Accept: application/json',
                'Content-Type: application/json',
            )
        ));
        $token = json_decode($response->getBody()->getContents(), true);
        if (array_key_exists('WSSE', $token)) {
            return $token['WSSE'];
        }
    }
}
?>
