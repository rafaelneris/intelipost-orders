<?php

/**
 * Class Intelipost_Orders_Model_Config
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Intelipost_Orders_Model_Config extends Varien_Object
{

    /**
     * @return string
     * @throws Mage_Core_Model_Store_Exception
     */
    public function getApiKey()
    {
        return Mage::getStoreConfig('apiconfig/apiconfig_group/appkey_input', Mage::app()->getStore());
    }
}