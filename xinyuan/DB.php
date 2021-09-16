<?php
namespace Xinyuan;

use PDO;
use PDOException;
use Exception;

class DB
{
    protected static $initConfig = [];
    protected static $instance;
    protected $pdo;

    protected $config = [
        'type'    => 'mysql',
        'host'    => '127.0.0.1',
        'port'    => '3306',
        'dbname'  => 'xinyuan',
        'charset' => 'utf8mb4',
        'user'    => 'root',
        'pwd'     => '',
        'prefix'  => ''
    ];

    private function __construct(array $config = [])
    {
        $this->config = array_merge($this->config, $config);
        $this->initPDO();
    }

    protected function initPDO()
    {
        $type = $this->config['type'];
        $host = $this->config['host'];
        $port = $this->config['port'];
        $dbname = $this->config['dbname'];
        $charset = $this->config['charset'];
        $dsn = "{$type}:host={$host};port={$port};dbname={$dbname};charset={$charset}";

        try {
            $this->pdo = new PDO($dsn, $this->config['user'], $this->config['pwd']);
        } catch(PDOException $e) {
            throw new Exception('資料庫連接失敗，錯誤訊息：' . $e->getMessage());
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function getConfig($name = null)
    {
        return $name ? $this->config[$name] : $this->config;
    }

    public static function getInstance()
    {
        if(!self::$instance) {
          self::$instance = new static(static::$initConfig);
        }
        return self::$instance;
    }

    public static function init(array $config = [])
    {
        static::$initConfig = $config;
    }

    public function fetchRow($sql, array $bind = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($bind);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            $error = $this->errorMsg($e, $sql);
            throw new Exception($error);
        }
    }

    protected function errorMsg($e, $sql = '')
    {
        $error = $e->getMessage();
        if($sql != '') {
            $error .= ' SQL語句執行失敗：' . $sql;
        }
        return $error;
    }

    public function fetchAll($sql, array $bind = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($bind);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            $error = $this->errorMsg($e, $sql);
            throw new Exception($error);
        }
    }

    public function execute($sql, array $bind = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($bind);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            $error = $this->errorMsg($e, $sql);
            throw new Exception($error);
        }
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}