<?php

namespace Cblink\TencentAI;

use Adbar\Dot;
use Pimple\Container;

class Application extends Container
{
    /**
     * @var array
     */
    protected $providers = [
        Ocr\OcrServiceProvider::class,
    ];

    /**
     * @param array $config
     */
    public function __construct($config)
    {
        parent::__construct();

        $this['config'] = function () use ($config) {
            return new Dot($config);
        };

        $this->registerProviders();
    }

    /**
     * Registers the providers.
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            parent::register(new $provider());
        }

        $this['credentials'] = function ($app) {
            return new Credentials($app);
        };
    }

    /**
     * Magic get access.
     *
     * @param  string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }
}
