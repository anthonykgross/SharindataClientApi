<?php

namespace KkuetNet\SharindataBundle\Tests\Vendor;

class SharindataClientApiTest extends \PHPUnit_Framework_TestCase {

    public function testConnexion(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "05068");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet1@live.fr", "05068");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("", "");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==401);
    }
    
    public function testGetCountries(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCountries();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCountry(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCountry("fr");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCurrencies(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCurrencies();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetCurrency(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getCurrency("eur");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetLanguages(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getLanguages();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetLanguage(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getLanguage("fr");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetTimezones(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getTimezones();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetTimezone(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getTimezone("europe_paris");
        $this->assertTrue($data->code==200);
    }
    
    public function testGetZones(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getZones();
        $this->assertTrue($data->code==200);
    }
    
    public function testGetZone(){
        $sca = new \KkuetNet\SharindataBundle\Vendor\SharindataClientApi("kkuet12@live.fr", "050688");
        $data= $sca->getZone("europe");
        $this->assertTrue($data->code==200);
    }
}