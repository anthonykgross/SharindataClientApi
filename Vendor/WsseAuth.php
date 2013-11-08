<?php

namespace KkuetNet\SharindataBundle\Vendor;

class WsseAuth{

    private $url        = null;
    private $token      = null;
    
    public function __construct($url) {
        $this->url      = $url;
    }
    
    public function getToken(){
        $ressource = curl_init();
        curl_setopt($ressource, CURLOPT_URL, $this->url);
        curl_setopt($ressource, CURLOPT_POST, true);
        curl_setopt($ressource, CURLOPT_POSTFIELDS, array());
        curl_setopt($ressource, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/json',
        ));
        curl_setopt($ressource, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ressource);
        $response = json_decode($response);

        if(isset($response->WSSE)){
            $this->token = $response->WSSE;
        }
        
        return $this->token;
    }
}
?>
