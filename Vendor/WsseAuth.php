<?php

namespace KkuetNet\SharindataClientApi\Vendor;

class WsseAuth{

    public static function getToken($url){
        $ressource = curl_init();
        curl_setopt($ressource, CURLOPT_URL, $url);
        curl_setopt($ressource, CURLOPT_POST, true);
        curl_setopt($ressource, CURLOPT_POSTFIELDS, array());
        curl_setopt($ressource, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/json',
        ));
        curl_setopt($ressource, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ressource);
        $response = json_decode($response);

        $token = null;
        if(isset($response->WSSE)){
            $token = $response->WSSE;
        }
        return $token;
    }
}
?>
