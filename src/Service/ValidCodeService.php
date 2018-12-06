<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/6/16
 * Time: 23:25
 */

namespace Service;


use GuzzleHttp\Client;

class ValidCodeService
{
    private $http;

    private $uri;

    const DOMAIN = "http://127.0.0.1:8003";

    public function __construct()
    {
        $this->http = new Client();

        $this->uri = new Uri(self::DOMAIN);
    }

    public function sendCode($phone, $sign_name = null)
    {
        $uri = clone $this->uri;

        $uri->withPath("/valid_code/send");

        $data = [
            'form_params' => [
                'phone' => $phone,
                'sign_name' => $sign_name
            ]
        ];

        $response = $this->http->request("POST", (string)$uri, $data);

        return json_decode($response->getBody(),true);
    }

    public function checkCode($phone, $code)
    {
        $uri = clone $this->uri;

        $uri->withPath("/valid_code/check");


        $data = [
            'form_params' => [
                "phone" => $phone,
                "code" => $code
            ]
        ];

        $response = $this->http->request("POST", (string)$uri, $data);

        return json_decode($response->getBody(),true);
    }

}