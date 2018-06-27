<?php

namespace Cblink\TencentAI;

class Credentials
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function signature()
    {
        $params = [
            'u' => '3365606783',
            'a' => $this->app->config['app_id'],
            'k' => $this->app->config['secret_id'],
            'e' => time() + 7200,
            't' => time(),
            'r' => rand(),
            'f' => '',
        ];

        $orignal = http_build_query($params);

        return base64_encode(hash_hmac('sha1', $orignal, $this->app->config['secret_key'], true).$orignal);
    }
}
