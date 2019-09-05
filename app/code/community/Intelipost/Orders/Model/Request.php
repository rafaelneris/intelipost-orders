<?php

/**
 * Request Model
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class Intelipost_Orders_Model_Request
{

    /** @var string  */
    const SALES_CHANEL = "Magento";

    /** @var bool  */
    const SCHEDULED_DEFAULT = false;

    /** @var array  */
    private $request = [];

    /** @var Mage_Sales_Model_Order */
    private $order;

    /**
     * @param Mage_Sales_Model_Order $order
     * @return false|string
     */
    public function prepare($order)
    {
        $this->order = $order;

        $this
            ->setOrderData()
            ->setCustomerData()
            ->setItemsData();

        return json_encode($this->request);
    }

    /**
     * @return $this
     */
    private function setOrderData()
    {
        $this->request['order_number'] = $this->order->getIncrementId();
        $this->request['customer_shipping_costs'] = $this->order->getShippingTaxAmount();
        $this->request['sales_channel'] = self::SALES_CHANEL;
        $this->request['scheduled'] = self::SCHEDULED_DEFAULT;
        $this->request['created'] = $this->order->getCreatedAt();
        $this->request['delivery_method_id'] = 1;
        return $this;
    }

    /**
     * @return $this
     */
    private function setCustomerData()
    {
        $this->request['end_customer']['first_name'] = $this->order->getCustomerFirstname();
        $this->request['end_customer']['last_name'] = $this->order->getCustomerLastname();
        $this->request['end_customer']['email'] = $this->order->getCustomerEmail();
        $this->request['end_customer']['phone'] = $this->order->getShippingAddress()->getTelephone();
        $this->request['end_customer']['federal_tax_payer_id'] = $this->order->getCustomerTaxvat();
        $this->request['end_customer']['shipping_address'] = $this->order->getShippingAddress()->getStreet1();
        $this->request['end_customer']['shipping_number'] =
            !empty($this->order->getShippingAddress()->getStreet2()) ?
                $this->order->getShippingAddress()->getStreet2() : 'S/N';
        $this->request['end_customer']['shipping_reference'] = $this->order->getShippingAddress()->getStreet4();
        $this->request['end_customer']['shipping_quarter'] = $this->order->getShippingAddress()->getStreet3();
        $this->request['end_customer']['shipping_city'] = $this->order->getShippingAddress()->getCity();
        $this->request['end_customer']['shipping_state'] = $this->order->getShippingAddress()->getRegion();
        $this->request['end_customer']['shipping_zip_code'] = $this->order->getShippingAddress()->getPostcode();
        $this->request['end_customer']['shipping_country'] = $this->order->getShippingAddress()->getCountry();
        return $this;
    }

    /**
     * @return $this
     */
    private function setItemsData()
    {
        /** @var Mage_Sales_Model_Resource_Order_Item_Collection $itemsCollection */
        $itemsArray = $this->order->getAllItems();

        /** @var Mage_Sales_Model_Order_Item $item */
        foreach ($itemsArray as $item) {
            $item = [
                'shipment_order_volume_number' => $item->getId(),
                'weight' => $item->getWeight(),
                'volume_type_code' => 'BOX',
                'width' => $item->getWidth(),
                'height' => $item->getHeight(),
                'length' => $item->getLength(),
                'products_nature' => $item->getRealProductType(),
                'products_quantity' => $item->getQtyOrdered()
            ];

            $this->request['shipment_order_volume_array'][] = $item;
        }
        return $this;
    }
}
