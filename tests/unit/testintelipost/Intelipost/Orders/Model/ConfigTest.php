<?php

class Intelipost_Orders_Model_ConfigTest extends PHPUnit_Framework_TestCase
{
    public function testGetApiKey()
    {
        /** @var Intelipost_Orders_Model_Config $configModel */
        $configModel = Mage::getModel('intelipost_orders/config');

        $apiKey = $configModel->getApiKey();

        $this->assertTrue(is_string($apiKey));
    }
}