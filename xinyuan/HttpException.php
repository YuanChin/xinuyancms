<?php
namespace Xinyuan;

use Exception;
use Xinyuan\Http\Response;

class HttpException extends Exception
{
    /**
     * 儲存Response實例
     * 
     * @var Response
     */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}