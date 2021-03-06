<?php

namespace KkuetNet\SharindataClientApi\Tests\Vendor;

class SharindataClientApiTest extends \PHPUnit_Framework_TestCase {

    private static $apiKey    = "dPMf3YTKM0QMunYRwqKI";
    private static $apiSecret = "H9mibm4rLuYCQSz8AzfL";

    public function testConnexion(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance("sdfsf", "sdfsdfsdf");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance("sdfsdfsdf", "sdfsdfs68");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance("", "");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
    }
    
    public function testGetCountries(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getCountries();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCountry(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getCountry("fr");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCurrencies(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getCurrencies();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCurrency(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getCurrency("eur");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetLanguages(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getLanguages();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetLanguage(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getLanguage("fr");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetTimezones(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getTimezones();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetTimezone(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getTimezone("europe_paris");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetZones(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getZones();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetZone(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getZone("europe");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetMainColor(){
        $sca = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data= $sca->getMainsColors(__DIR__."/test.png");
        $this->assertTrue(count(json_decode($data->response, true))==2);
        $this->assertTrue($data->code==200);
        
        $data= $sca->getMainsColors(__DIR__."/test.gif");
        $this->assertTrue(count(json_decode($data->response, true))==2);
        $this->assertTrue($data->code==200);
        
        $data= $sca->getMainsColors(__DIR__."/test.jpg", 7);
        $this->assertTrue(count(json_decode($data->response, true))==7);
        $this->assertTrue($data->code==200);
        
        $data= $sca->getMainsColors(__DIR__."/test.html");
        $this->assertTrue($data->code==500);
        
        $data= $sca->getAllColors(__DIR__."/test.png");
        $this->assertTrue(count(json_decode($data->response, true))==501);
        $this->assertTrue($data->code==200);
        
        $data= $sca->getMainsColors(__DIR__."/test.png");
        $this->assertTrue(count(json_decode($data->response, true))==2);
        $this->assertTrue($data->code==200);
        
        $data= $sca->getMainsColors(__DIR__."/test.png", 6);
        $this->assertTrue(count(json_decode($data->response, true))==6);
        $this->assertTrue($data->code==200);
    }
    
    public function testGetRgbByHex(){
        $sca        = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data       = $sca->getRgbByHex("#333333");
        $this->assertTrue($data->code==200);
        $response   = json_decode($data->response);
        $this->assertTrue($response->r==51);
        $this->assertTrue($response->g==51);
        $this->assertTrue($response->b==51);
        
        $data       = $sca->getRgbByHex("#639");
        $this->assertTrue($data->code==200);
        $response   = json_decode($data->response);
        $this->assertTrue($response->r==102);
        $this->assertTrue($response->g==51);
        $this->assertTrue($response->b==153);
        
    }
    
    public function testGetHexByRgb(){
        $sca        = \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi::getInstance(self::$apiKey, self::$apiSecret);
        $data       = $sca->getHexByRgb(51,51,51);
        $this->assertTrue($data->code==200);
        $response   = json_decode($data->response);
        $this->assertTrue($response->hex=="#333333");
        
        $data       = $sca->getHexByRgb(102,51,153);
        $this->assertTrue($data->code==200);
        $response   = json_decode($data->response);
        $this->assertTrue($response->hex=="#663399");
    }
}
