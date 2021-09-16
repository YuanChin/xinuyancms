<?php

namespace Xinyuan\Database\Eloquent;

use Xinyuan\Database\Eloquent\EloquentService;
use Xinyuan\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->container->bind('eloquentService', function () {
            return new EloquentService();
        });

        $this->container->resolve('eloquentService')->register();
    }
}