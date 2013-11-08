<?php

namespace KkuetNet\SharindataClientApi\Vendor;

class BasicCurl {

    private $ressource = null;
    
    public function __construct(Array $headers) {
        $this->ressource    = curl_init();
        
        curl_setopt($this->ressource, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($this->ressource, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ressource, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->ressource, CURLOPT_SSL_VERIFYPEER, false);
    }
    
    public function doPost($url, $paramsPost) {
        curl_setopt($this->ressource, CURLOPT_URL, $url);
        curl_setopt($this->ressource, CURLOPT_POST, true);
        curl_setopt($this->ressource, CURLOPT_POSTFIELDS, $paramsPost);
        return $this->_execute($this->ressource);
    }

    public function doGet($url) {
        curl_setopt($this->ressource, CURLOPT_URL, $url);
        return $this->_execute($this->ressource);
    }

    public function doPut($url, $params) {
        curl_setopt($this->ressource, CURLOPT_URL, $url);
        //curl_setopt($ressource, CURLOPT_POST, true);
        curl_setopt($this->ressource, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($this->ressource, CURLOPT_POSTFIELDS, $params);
        return $this->_execute($this->ressource);
    }

    public function doDelete($url) {
        curl_setopt($this->ressource, CURLOPT_URL, $url);
        curl_setopt($this->ressource, CURLOPT_CUSTOMREQUEST, 'DELETE');
        return $this->_execute($this->ressource);
    }

    private function _execute() {
        $response       = curl_exec($this->ressource);
        $code           = curl_getinfo($this->ressource, CURLINFO_HTTP_CODE);
        
        $objResponse    = new \stdClass();
        $objResponse->response = $response;
        $objResponse->code = $code;

        return $objResponse;
    }

}