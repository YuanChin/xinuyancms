<?php

namespace Xinyuan\Container;

use Closure;
use ReflectionClass;
use ReflectionMethod;

class Container
{
    /**
     * 儲存Container實例
     * 
     * @var Container
     */
    protected static $instance;

    /**
     * 儲存應用服務
     * 
     * @var array
     */
    protected $instances = [];

    /**
     * 儲存核心服務
     * 
     * @var array
     */
    protected $bindings = [];

    // 禁止從外部實例化
    private function __construct() {}
    // 禁止從外部克隆
    private function __clone() {}

    /**
     * 獲取容器對象
     * 
     * @return object
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function make($class)
    {
        if (! isset($this->instances[$class])) {
            $reflect = new ReflectionClass($class);
            $constructor = $reflect->getConstructor();
            $args = $constructor ? $this->getDependencies($constructor) : [];
            $this->instances[$class] = $reflect->newInstanceArgs($args);
        }
        return $this->instances[$class];
    }

    /**
     * 獲取依賴參數
     * 
     * @param ReflectionMethod $reflect
     * @return mixed
     */
    public function getDependencies(ReflectionMethod $reflect)
    {
        $args = [];
        $params = $reflect->getParameters();
        foreach ($params as $param) {
            $class = $param->getClass();
            if($class) {
                $args[] = $this->make($class->getName());
            }
        }
        return $args;
    }

    // 綁定核心服務
    public function bind($abstract, $value)
    {
        if (isset($this->bindings[$abstract])) {
            return;
        }

        $this->bindings[$abstract] = $value;
    }

    // 解析服務
    public function resolve($abstract)
    {
        $value = $this->bindings[$abstract];
        if ($value instanceof Closure) {
            return call_user_func($value);
        } else {
            return $value;
        }
    }

}