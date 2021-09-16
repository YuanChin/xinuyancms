<?php

namespace Xinyuan;

use Xinyuan\Container\Container;
use Xinyuan\Http\Response;

class Controller
{
    /**
     * 儲存Smarty實例
     * 
     * @var Smarty
     */
    protected $smarty;

    /**
     * 儲存Request實例
     * 
     * @var Request
     */
    protected $request;

    /**
     * 儲存Container實例
     * 
     * @var Container
     */
    protected $container;

    public function __construct()
    {
        $this->container = Container::getInstance();
        $this->request = $this->container->resolve('request');
        $this->smarty = $this->container->resolve('smarty');
        $this->initialize();
    }

    protected function initialize()
    {

    }

    /**
     * 綁定參數
     * 
     * @param array $data
     * 
     * @return void
     */
    protected function assign(array $data)
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }
    }

    /**
     * 獲取模板
     * 
     * @param string $template
     * 
     * @return string
     */
    protected function fetch($template = '')
    {
        return $this->smarty->fetch($template . '.html');
    }

    /**
     * 
     */
    protected function success($msg = '')
    {
        $data = json_encode(['code' => 1, 'msg' => $msg]);
        $header = ['Content-Type' => 'application/json'];
        throw new HttpException(new Response($data, 200, $header));
    }

    protected function error($msg = '')
    {
        $data = json_encode(['code' => 0, 'msg' => $msg]);
        $header = ['Content-Type' => 'application/json'];
        throw new HttpException(new Response($data, 200, $header));
    }

    protected function redirect($url = '', $code = '302')
    {
        $header = ['Location' => $url];
        throw new HttpException(new Response('', $code, $header));
    }

    protected function display($template = '')
    {
        $data = $this->fetch($template);
        throw new HttpException(new Response($data));
    }
}
