<?php

namespace KkuetNet\SharindataClientApi\Vendor;

class SharindataClientApi{
    
    const api_url                   = "http://sharindata.com/api/";
    const api_url_create_token      = "http://sharindata.com/api/token/";
    const api_url_destroy_token     = "http://sharindata.com/api/token/destroy";
    
    private $username               = null;
    private $password               = null;
    private $curl                   = null;
    private static $instance        = null;
    
    public static function getInstance($username = null, $password = null){
        if(is_null(self::$instance) || (!is_null($username) && !is_null($password))){
            self::$instance = new SharindataClientApi($username, $password);
        }
        return self::$instance;
    }
    
    private function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->refreshWsseToken();
    }
    
    public function refreshWsseToken(){
        $this->curl     = new \KkuetNet\SharindataClientApi\Vendor\BasicCurl(array(
            'X-WSSE : '.\KkuetNet\SharindataClientApi\Vendor\WsseAuth::getToken(self::api_url_create_token."?_username=".$this->username."&_password=".$this->password),
            'Authorization : WSSE profile="UsernameToken"'
        ));
    }
    
    public function getCountries(){
        return $this->curl->doGet(self::api_url."data/countries");
    }
    
    public function getCountry($iso){
        return $this->curl->doGet(self::api_url."data/countries/".$iso);
    }
    
    public function getCurrencies(){
        return $this->curl->doGet(self::api_url."data/currencies");
    }
    
    public function getCurrency($iso_code){
        return $this->curl->doGet(self::api_url."data/currencies/".$iso_code);
    }
    
    public function getLanguages(){
        return $this->curl->doGet(self::api_url."data/languages");
    }
    
    public function getLanguage($iso_code_6391){
        return $this->curl->doGet(self::api_url."data/languages/".$iso_code_6391);
    }
    
    public function getTimezones(){
        return $this->curl->doGet(self::api_url."data/timezones");
    }
    
    public function getTimezone($code){
        return $this->curl->doGet(self::api_url."data/timezones/".$code);
    }
    
    public function getZones(){
        return $this->curl->doGet(self::api_url."data/zones");
    }
    
    public function getZone($code){
        return $this->curl->doGet(self::api_url."data/zones/".$code);
    }
    
    public function getAllColors($image_path){
        $post = array('image' => '@'.$image_path);
        return $this->curl->doPost(self::api_url."tool/images/allcolors", $post);
    }
    
    public function getMainsColors($image_path, $nbColor = null){
        $post = array('image' => '@'.$image_path);
        if($nbColor){
            $post['nbColor'] = $nbColor;
        }
        return $this->curl->doPost(self::api_url."tool/images/maincolors", $post);
    }
}