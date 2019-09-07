<?php

/**
 * Class Intelipost_Orders_Model_ConfigTest
 */
class ConfigTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test Teste config create
     */
    public function testConfigModelCanBeCreated()
    {
        $configModel = Mage::getModel('intelipost_orders/config');
        $this->assertInstanceOf($configModel, new Intelipost_Orders_Model_Config());
    }

    /**
     * @test Test API Key Return
     */
    public function testGetApiKey()
    {
        /** @var Intelipost_Orders_Model_Config $configModel */
        $configModel = Mage::getModel('intelipost_orders/config');

        $apiKey = $configModel->getApiKey();

        $this->assertTrue(is_string($apiKey));
    }
}