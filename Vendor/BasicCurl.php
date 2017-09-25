<?php

namespace KkuetNet\SharindataClientApi\Vendor;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class BasicCurl {

    private $ressource = null;
    private $headers   = array();
    
    public function __construct(Array $headers) {
        $this->ressource    = new Client();
        $this->headers      = $headers;
    }
    
    public function doPost($url, $paramsPost) {
        $response = $this->ressource->request(
            'POST',
            $url,
            array(
                'body' => $paramsPost,
                'headers' => $this->headers
            )
        );
        return $this->_execute($response);
    }

    public function doCustom($action, $url, $params) {
        $params['headers'] = $this->headers;

        $response = $this->ressource->request(
            $action,
            $url,
            $params
        );
        return $this->_execute($response);
    }

    public function doGet($url) {
        $response = $this->ressource->request(
            'GET',
            $url,
            array(
                'headers' => $this->headers
            )
        );
        return $this->_execute($response);
    }

    public function doPut($url, $params) {
        $response = $this->ressource->request(
            'PUT',
            $url,
            array(
                'body' => $params,
                'headers' => $this->headers
            )
        );
        return $this->_execute($response);
    }

    public function doDelete($url) {
        $response = $this->ressource->request(
            'DELETE',
            $url,
            array(
                'headers' => $this->headers
            )
        );
        return $this->_execute($response);
    }

    private function _execute(Response $response) {
        $objResponse            = new \stdClass();
        $objResponse->response  = $response->getBody()->getContents();
        $objResponse->code      = $response->getStatusCode();
        return $objResponse;
    }
}