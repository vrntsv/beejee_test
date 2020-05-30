<?php
namespace app\core;

class DB
{
    private static $instance = null;
    private $pdo = null;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    private function __clone()
    {
    }


    private function __construct()
    {
        $this->pdo = new \PDO(
                'mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;port=8888;dbname=tasks_db', 'admin', 'admin'
        );
    }

    public function getPDO()
    {
        return $this->pdo;
    }


}