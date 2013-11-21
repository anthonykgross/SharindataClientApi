<?php

namespace KkuetNet\SharindataClientApi\Tests\Vendor;

class SharindataClientApiTest extends \PHPUnit_Framework_TestCase {

    public function testConnexion(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "05068");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet1@live.fr", "05068");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("", "");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
    }
    
    public function testGetCountries(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCountry(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCountry("fr");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCurrencies(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCurrencies();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCurrency(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCurrency("eur");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetLanguages(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getLanguages();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetLanguage(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getLanguage("fr");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetTimezones(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getTimezones();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetTimezone(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getTimezone("europe_paris");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetZones(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getZones();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetZone(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getZone("europe");
        $this->assertTrue($data->code==200);
    }
    public function testGetMainColor(){
        $sca = new \KkuetNet\SharindataClientApi\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        //file_put_contents(__DIR__."/test.png", file_get_contents("http://sharindata.com/Sharindata48x48.png"));
        $data= $sca->getMainsColors(__DIR__."/test.png");
        $this->assertTrue(count(json_decode($data->response, true))==2);
        $this->assertTrue($data->code==200);
        
        //file_put_contents(__DIR__."/test.gif", file_get_contents("https://lh3.googleusercontent.com/-5qJehnsWXpE/UkqXBiQGv9I/AAAAAAAAAmI/lsIv9H9TX_g/w800-h800/starbucks-coffee-logo.gif"));
        $data= $sca->getMainsColors(__DIR__."/test.gif");
        $this->assertTrue(count(json_decode($data->response, true))==2);
        $this->assertTrue($data->code==200);
        
        //file_put_contents(__DIR__."/test.jpg", file_get_contents("http://upload.wikimedia.org/wikipedia/fr/c/ca/Bear_Rides_logo.JPG"));
        $data= $sca->getMainsColors(__DIR__."/test.jpg", 7);
        $this->assertTrue(count(json_decode($data->response, true))==7);
        $this->assertTrue($data->code==200);
        
        //file_put_contents(__DIR__."/test.html", file_get_contents("http://www.w3.org/Style/Examples/011/firstcss.fr.html"));
        $data= $sca->getMainsColors(__DIR__."/test.html");
        $this->assertTrue($data->code==500);
        
        $data= $sca->getAllColors(__DIR__."/test.png");
        $this->assertTrue(count(json_decode($data->response, true))==501);
        $this->assertTrue($data->code==200);
    }
}