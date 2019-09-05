<?php

/**
 * Class Intelipost_Orders_Model_Observer
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Intelipost_Orders_Model_Observer extends Varien_Event_Observer
{

    /**
     * @param Varien_Event_Observer $observer
     * @return bool
     */
    public function send(Varien_Event_Observer $observer)
    {
        try {
            $order = $observer->getOrder();

            /** @var Intelipost_Orders_Model_Api $apiModel */
            $apiModel = Mage::getModel('intelipost_orders/api');

            /** @var Intelipost_Orders_Model_Request $requestModel */
            $requestModel = Mage::getModel('intelipost_orders/request');

            $request = $requestModel->prepare($order);

            if (!$apiModel->sendRequest($request)) {
                return false;
            }

            return true;

        } catch (Exception $e) {
                Mage::log($e->getCode().": ". $e->getMessage());
        }

    }
}