<?php

namespace Xinyuan\Smarty;

use Xinyuan\Smarty\SmartyService;
use Xinyuan\Support\ServiceProvider;

class SmartyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->container->bind('smartyService', function () {
            return new SmartyService();
        });

        $this->container->resolve('smartyService')->register($this->container);
    }
}