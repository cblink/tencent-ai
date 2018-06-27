<?php

namespace Cblink\TencentAI;

use GuzzleHttp\Client;

trait MakesHttpRequests
{
    protected $httpClient;

    public function postJson($uri, $data, $options = [])
    {
        return $this->request('POST', $uri, [
            'json' => $data,
        ] + $options);
    }

    public function request($method, $uri, $options)
    {
        return $this->getHttpClient()->request($method, $uri, $options);
    }

    protected function getHttpClient()
    {
        return $this->httpClient ?: $this->httpClient = new Client(['http_errors' => false]);
    }
}
