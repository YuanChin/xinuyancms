<?php

namespace Xinyuan\Support;

use Xinyuan\Container\Container;

abstract class ServiceProvider
{
    /**
     * 儲存Container實例
     * 
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * 註冊任何應用服務
     * 
     * @return void
     */
    abstract public function register();
}