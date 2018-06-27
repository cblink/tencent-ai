<?php

namespace Cblink\TencentAI\Ocr;

use Cblink\TencentAI\BaseClient;

class Client extends BaseClient
{
    public function card($url)
    {
        return $this->postImage($url);
    }
}
