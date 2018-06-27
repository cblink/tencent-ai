<?php

namespace Cblink\TencentAI;

class BaseClient
{
    use MakesHttpRequests;

    /**
     * @var \Cblink\TencentAI\Application
     */
    protected $app;

    /**
     * @param \Cblink\TencentAI\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    protected function postImage($url)
    {
        $options = [
            'headers' => [
                'Content-Type' => 'text/json',
                'Authorization' => $this->app->credentials->signature(),
            ],
        ];
        $data = [
            'app_id' => $this->app->config['app_id'],
            'url' => $url,
        ];

        $response = $this->postJson('https://api.youtu.qq.com/youtu/ocrapi/bcocr', $data, $options);

        return json_decode($response->getBody()->getContents(), true);
    }
}
