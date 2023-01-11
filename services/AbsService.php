<?php

namespace app\services;

use GuzzleHttp\Client;

class AbsService
{
    private string $url;
    private string $token;

    public function __construct()
    {
        $this->url = '10.8.7.144';
        $this->token = 'cf3fc4a680b076c715b139c27c3b5239';
    }

    public function infoCurrency(string $code = 'RUB')
    {
        $params = [
            'code' => $code
        ];
        return $this->send('info/currency', $params);
    }

    public function customer(int $phone)
    {
        $params = [
            'phone' => $phone
        ];
        return $this->send('customer', $params);
    }

    public function cardInfo(int $pan)
    {
        $params = [
            'pan' => $pan
        ];
        return $this->send('card/info', $params);
    }

    public function accountStatus(string $mfo, string $account)
    {
        $params = [
            'accExternal' => $account,
            'filialCode' => $mfo
        ];
        return $this->send('account/status', $params);
    }

    public function account(int $customer_id)
    {
        $params = [
            'customer_id' => $customer_id
        ];
        return $this->send('account', $params);
    }

    public function cardCustomer(int $client_id, int $currency = null)
    {
        $params = [
            'clientId' => $client_id,
            'currency' => $currency
        ];
        return $this->send('card/customer', $params);
    }

    private function send(string $url, array $params = [], $method = 'GET')
    {
        $request_id = 'imt_' . uniqid();
            $client = new Client([
                'headers' => [
                    'Authorization' => $this->token,
                    'RequestCode' => $request_id,
                    'Content-Type' => 'application/json'
                ]
            ]);
            $response = $client->request($method, "$this->url/$url", [
                'body' => json_encode($params),
                'proxy' => '',
                'timeout' => 10
            ]);
            if ($response->getStatusCode() == 200){
                return json_decode($response->getBody()->getContents())->data;
            }
            return false;
    }
}
