<?php

namespace Xinyuan\Http;

use Xinyuan\Upload;

class Request
{
    protected $pathInfo;
    protected $action;

    public function pathInfo()
    {
        if(is_null($this->pathInfo)) {
            $this->pathInfo = ltrim($this->server('PATH_INFO', ''), '/');
        }
        return $this->pathInfo;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function action()
    {
        return $this->action ?: '';
    }

    public function server($name, $default = null)
    {
        return isset($_SERVER[$name]) ? $_SERVER[$name] : $default;
    }

    public function get($name, $default = null)
    {
        return isset($_GET[$name]) ? $_GET[$name] : $default;
    }

    public function post($name, $default = null)
    {
        return isset($_POST[$name]) ? $_POST[$name] : $default;
    }

    public function isAjax()
    {
        return $this->server('HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest';
    }

    public function hasFile($name)
    {
        return isset($_FILES[$name]['error']) && $_FILES[$name]['error'] !== UPLOAD_ERR_NO_FILE;
    }

    public function file($name)
    {
        $file = isset($_FILES[$name]) ? $_FILES[$name] : [];
        return Upload::create($file);
    }
}