<?php

namespace Cblink\TencentAI\Ocr;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OcrServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $app A container instance
     */
    public function register(Container $app)
    {
        $app['ocr'] = function ($app) {
            return new Client($app);
        };
    }
}
