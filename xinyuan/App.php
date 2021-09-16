<?php

namespace Xinyuan;

use Exception;
use Xinyuan\Container\Container;
use Xinyuan\Database\Eloquent\EloquentServiceProvider;
use Xinyuan\Http\Response;
use Xinyuan\Http\Request;
use Xinyuan\Routing\Router;
use Xinyuan\Smarty\SmartyServiceProvider;

class App
{
    protected $debug = true;

    /**
     * 儲存Container實例
     * 
     * @var Container
     */
    private $container;

    /**
     * 註冊服務
     * 
     * @var array
     */
    protected $serviceProviders = [
        EloquentServiceProvider::class,
        SmartyServiceProvider::class
    ];

    public function __construct()
    {   
        $this->container = Container::getInstance();
        $this->registerServices();
        DB::init(require __BASEDIR__ . '/config/database.php');
    }

    /**
     * 處理請求
     * 
     * @param Request $request
     * 
     * @return Response
     */
    public function handle(Request $request)
    {
        $this->container->bind('request', function () use ($request) {
            return $request;
        });

        try {
            $router = new Router();
            return $router->dispatch();
        } catch(HttpException $e) {
            return $e->getResponse();
        } catch(Exception $e) {
            $msg = $this->debug ? $e->getMessage() : '';
            return new Response('系統發生錯誤。' . $msg, 403);
        }
    }

    /**
     * 註冊核心服務
     * 
     * @return void
     */
    private function registerServices()
    {
        foreach ($this->serviceProviders as $provider) {
            $providerInstance = new $provider($this->container);
            $providerInstance->register();
        }
    }
}
