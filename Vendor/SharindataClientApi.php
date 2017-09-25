<?php

namespace KkuetNet\SharindataClientApi\Vendor;

class SharindataClientApi{
    
    public static $api_url                  = "http://sharindata.anthonykgross.fr/api/";
    public static $api_url_create_token     = "http://sharindata.anthonykgross.fr/api/token/";
    public static $api_url_destroy_token    = "http://sharindata.anthonykgross.fr/api/token/destroy";
    
//    public static $api_url                  = "http://localhost/app_dev.php/api/";
//    public static $api_url_create_token     = "http://localhost/app_dev.php/api/token/";
//    public static $api_url_destroy_token    = "http://localhost/app_dev.php/api/token/destroy";
    
    private $apiKey                         = null;
    private $apiSecret                      = null;
    private $curl                           = null;
    private static $instance                = null;
    
    public static function getInstance($apiKey = null, $apiSecret = null){
        if(is_null(self::$instance) || (!is_null($apiKey) && !is_null($apiSecret))){
            self::$instance = new SharindataClientApi($apiKey, $apiSecret);
        }
        return self::$instance;
    }
    
    private function __construct($apiKey, $apiSecret) {
        $this->apiKey       = $apiKey;
        $this->apiSecret    = $apiSecret;
        $this->refreshWsseToken();
    }
    
    public function refreshWsseToken(){
        $this->curl     = new \KkuetNet\SharindataClientApi\Vendor\BasicCurl(array(
            'X-WSSE' => \KkuetNet\SharindataClientApi\Vendor\WsseAuth::getToken(self::$api_url_create_token."?_apikey=".$this->apiKey."&_apisecret=".$this->apiSecret),
            'Authorization' => 'WSSE profile="UsernameToken"'
        ));
    }
    
    public function getCountries(){
        return $this->curl->doGet(self::$api_url."data/countries");
    }
    
    public function getCountry($iso){
        return $this->curl->doGet(self::$api_url."data/country/".$iso);
    }
    
    public function getCurrencies(){
        return $this->curl->doGet(self::$api_url."data/currencies");
    }
    
    public function getCurrency($iso_code){
        return $this->curl->doGet(self::$api_url."data/currency/".$iso_code);
    }
    
    public function getCurrencyCountries($iso_code){
        return $this->curl->doGet(self::$api_url."data/currency/".$iso_code."/countries");
    }
    
    public function getLanguages(){
        return $this->curl->doGet(self::$api_url."data/languages");
    }
    
    public function getLanguage($iso_code_6391){
        return $this->curl->doGet(self::$api_url."data/language/".$iso_code_6391);
    }
    
    public function getLanguageCountries($iso_code_6391){
        return $this->curl->doGet(self::$api_url."data/language/".$iso_code_6391."/countries");
    }
    
    public function getTimezones(){
        return $this->curl->doGet(self::$api_url."data/timezones");
    }
    
    public function getTimezone($code){
        return $this->curl->doGet(self::$api_url."data/timezone/".$code);
    }
    
    public function getZones(){
        return $this->curl->doGet(self::$api_url."data/zones");
    }
    
    public function getZone($code){
        return $this->curl->doGet(self::$api_url."data/zone/".$code);
    }
    
    public function getRandomString($length, $option = null){
        $post = array('length' => $length);
         if(is_int($option)){
            $post['option'] = $option;
        }
        return $this->curl->doPost(self::$api_url."tool/random/string", $post);
    }
    
    public function getAllColors($image_path){
        $post = array('image' => '@'.$image_path);
        return $this->curl->doPost(self::$api_url."tool/image/allcolors", $post);
    }
    
    public function getMainsColors($image_path, $nbColor = null){
        $post = array('image' => '@'.$image_path);
        if($nbColor){
            $post['nbColor'] = $nbColor;
        }
        return $this->curl->doPost(self::$api_url."tool/image/maincolors", $post);
    }
    
    public function getHexByRgb($r, $g, $b){
        $post = array('red' => $r, 'green' => $g, 'blue' => $b);
        return $this->curl->doPost(self::$api_url."tool/color/rgbtohex", $post);
    }
    
    public function getRgbByHex($hex){
        $post = array('hex' => $hex);
        return $this->curl->doPost(self::$api_url."tool/color/hextorgb", $post);
    }
    
    public function getUserAgentDetails($user_agent){
        $post = array('user_agent' => $user_agent);
        return $this->curl->doPost(self::$api_url."tool/useragent/details", $post);
    }
}
