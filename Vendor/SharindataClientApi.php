<?php

namespace KkuetNet\SharindataClientApi\Vendor;

class SharindataClientApi{
    
    const api_url                   = "http://www.sharindata.local/app_dev.php/api/";
    const api_url_create_token      = "http://www.sharindata.local/app_dev.php/api/token/";
    const api_url_destroy_token     = "http://www.sharindata.local/app_dev.php/api/token/destroy";
    
    private $username               = null;
    private $password               = null;
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function getCountries(){
        return $this->getCurl()->doGet(self::api_url."data/countries");
    }
    
    public function getCountry($iso){
        return $this->getCurl()->doGet(self::api_url."data/countries/".$iso);
    }
    
    public function getCurrencies(){
        return $this->getCurl()->doGet(self::api_url."data/currencies");
    }
    
    public function getCurrency($iso_code){
        return $this->getCurl()->doGet(self::api_url."data/currencies/".$iso_code);
    }
    
    public function getLanguages(){
        return $this->getCurl()->doGet(self::api_url."data/languages");
    }
    
    public function getLanguage($iso_code_6391){
        return $this->getCurl()->doGet(self::api_url."data/languages/".$iso_code_6391);
    }
    
    public function getTimezones(){
        return $this->getCurl()->doGet(self::api_url."data/timezones");
    }
    
    public function getTimezone($code){
        return $this->getCurl()->doGet(self::api_url."data/timezones/".$code);
    }
    
    public function getZones(){
        return $this->getCurl()->doGet(self::api_url."data/zones");
    }
    
    public function getZone($code){
        return $this->getCurl()->doGet(self::api_url."data/zones/".$code);
    }
    
    private function getCurl(){
        $auth_wsse          = new \KkuetNet\SharindataBundle\Vendor\WsseAuth(self::api_url_create_token."?_username=".$this->username."&_password=".$this->password);
        
        return new \KkuetNet\SharindataBundle\Vendor\BasicCurl(array(
            'X-WSSE : '.$auth_wsse->getToken(),
            'Authorization : WSSE profile="UsernameToken"',
            'Accept : application/json',
            'Content-Type : application/json'
        ));
    }
    
}