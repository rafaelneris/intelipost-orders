<?php

/**
 * Class Intelipost_Orders_Model_Api
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Intelipost_Orders_Model_Api
{

    /** @var string  */
    const CONTENT_TYPE = "application/json;charset=UTF-8";

    /**
     * @param string $request
     * @return bool
     * @throws Mage_Core_Model_Store_Exception
     * @throws Zend_Http_Client_Exception
     */
    public function sendRequest($request)
    {
        /** @var Intelipost_Orders_Model_Config $config */
        $config = Mage::getModel('intelipost_orders/config');

        $endPoint = 'https://api.intelipost.com.br/api/v1/shipment_order';
        $client = new Varien_Http_Client($endPoint);

        $client->setHeaders(['Content-Type' => self::CONTENT_TYPE, 'api-key' => $config->getApiKey()]);
        $client->setRawData($request, self::CONTENT_TYPE);
        $response = $client->request(Varien_Http_Client::POST);

        if ($response->isError()) {
            Mage::log('Error getting info data: ' . $response->getStatus() . ' ' . $response->getMessage());
            return false;
        }

        return true;
    }


}