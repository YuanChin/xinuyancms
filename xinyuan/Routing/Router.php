<?php

namespace Xinyuan\Routing;

use Exception;
use ReflectionMethod;
use Xinyuan\Container\Container;
use Xinyuan\Http\Request;
use Xinyuan\Http\Response;

class Router
{
    /**
     * 儲存Request對象
     * 
     * @var Request
     */
    protected $request;

    /**
     * 儲存Container對象
     * 
     * @var Container
     */
    protected $container;

    public function __construct()
    {
        $this->container = Container::getInstance();
        $this->request = $this->container->resolve('request');  
    }
    
    
  
    public function dispatch()
    {
        $controller = $this->getController();
        $action = $this->getAction();
        $this->request->setAction($action);
        $instance = $this->createcontroller($controller);
        if(is_callable([$instance, $action])) {
            $reflect = new ReflectionMethod($instance, $action);
        } else {
            $msg = '操作的方法' . $action . '()不存在';
            throw new Exception($msg);
        }
        $args = $this->container->getDependencies($reflect);
        $data = $reflect->invokeArgs($instance, $args);
        return new Response($data);    
    }

    /**
     * 創建控制器實例
     * 
     * @return object
     */
    protected function createController($controller)
    {
        $class = '\\App\\Http\\Controllers\\' . $controller;
        if(!class_exists($class)) {
            $msg = '請求的控制器' . $class . '不存在！';
            throw new Exception($msg);
        }
        return $this->container->make($class);
    }

    /**
     * 獲取請求的Uri
     * 
     * @return string
     */
    private function getUri()
    {
        return $this->request->pathInfo();
    }

    /**
     * 獲取請求的控制器
     * 
     * @return string
     */
    private function getController()
    {
        return $this->filterController();
    }

    /**
     * 獲取請求的方法
     * 
     * @return string
     */
    private function getAction()
    {
        return $this->filterAction();
    }

    /**
     * 過濾請求的控制器
     * 
     * @return string
     */
    private function filterController()
    {
        $controller = dirname($this->getUri());
        if($controller === '' || $controller === '.') {
            $controller = 'Index';
        }
        $arr = explode('/', ucwords($controller, '/'));
        $controller = implode('\\', $arr) . 'Controller';
        return $controller;
    }

    /**
     * 過濾請求的方法
     * 
     * @return string
     */
    private function filterAction()
    {
        $action = basename($this->getUri());
        if($action === '') {
            $action = 'index';
        }
        return $action;
    }
}