<?php

namespace Xinyuan\Database\Eloquent;

use Illuminate\Database\Capsule\Manager as IlluminateCapsule;

class EloquentService
{
    public function register()
    {
        $capsule = new IlluminateCapsule();
        $capsule->addConnection([
          'driver' => 'mysql',
          'host' => 'localhost',
          'database' => 'xinyuan',
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          'collation' => 'utf8_unicode_ci'
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}