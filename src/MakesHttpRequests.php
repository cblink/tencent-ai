<?php

namespace Cblink\TencentAI;

use GuzzleHttp\Client;

trait MakesHttpRequests
{
    /**
     * Http post.
     * @param  string $uri
     * @param  array  $params
     * @return mixed
     */
    protected function post($uri, $params = [])
    {
        $response = $this->guzzle->request('POST', $uri, [
            'form_params' => array_merge($attributes = $this->buildRequestAttributes($params), [
                'sign' => $this->signature($attributes)
            ]),
        ]);

        return $this->castResponseToArray($response);
    }

    /**
     * @param  \GuzzleHttp\Psr7\Response $response
     * @return array
     */
    protected function castResponseToArray($response)
    {
        $content = (string) $response->getBody();

        return json_decode($content, true);
    }

    /**
     * @param  array $params
     * @return array
     */
    protected function buildRequestAttributes($params)
    {
        return [
            'app_id' => (int) $this->config['app_id'],
            'time_stamp' => time(),
            'nonce_str' => uniqid(),
        ] + $params;
    }

    /**
     * @param  array $params
     * @return string
     */
    protected function signature($params)
    {
        ksort($params);
        $params = array_filter($params);

        $params['app_key'] = $this->config['app_key'];

        return strtoupper(
            md5(http_build_query($params))
        );
    }
}
