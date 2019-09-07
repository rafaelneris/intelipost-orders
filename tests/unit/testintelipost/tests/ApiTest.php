<?php


class ApiTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function testSendRequestWithHttpError($request)
    {
        $model = Mage::getModel('intelipost_orders/api');

        $sendRequest = $model->sendRequest($request);
        $this->assertFalse($sendRequest);
    }

    public function provider()
    {
        return [
            ['{"order_number":"145000079","customer_shipping_costs":0,"sales_channel":"Magento","scheduled":false,"created":"2019-09-05 02:40:26","delivery_method_id":1,"end_customer":{"first_name":"Rafael","last_name":"Cruz","email":"rafaelnerisdj@gmail.com","phone":"11950558520","federal_tax_payer_id":null,"shipping_address":"Rua Cravo, 101","shipping_number":"121","shipping_reference":"","shipping_quarter":"","shipping_city":"Osasco","shipping_state":"São Paulo","shipping_zip_code":"06180130","shipping_country":"BR"},"shipment_order_volume_array":[{"shipment_order_volume_number":"832","weight":"1.0000","volume_type_code":"BOX","width":null,"height":null,"length":null,"products_nature":null,"products_quantity":2},{"shipment_order_volume_number":"833","weight":"1.0000","volume_type_code":"BOX","width":null,"height":null,"length":null,"products_nature":null,"products_quantity":2},{"shipment_order_volume_number":"834","weight":"1.0000","volume_type_code":"BOX","width":null,"height":null,"length":null,"products_nature":null,"products_quantity":1}]}']
        ];
    }

}