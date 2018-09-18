<?php

namespace Cblink\TencentAI;

use GuzzleHttp\Client;

class Application
{
    use MakesHttpRequests,
        Actions\VisionPorn;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * @param array $config
     */
    public function __construct($config)
    {
        $this->config = $config;

        $this->guzzle = new Client([
            'base_uri' => 'https://api.ai.qq.com',
        ]);
    }

    /**
     * @param  string $image
     * @return string
     */
    protected function transformBase64Image($image)
    {
        return base64_encode($image);
    }
}
