<?php
namespace app\core;
class Model
{
    public $DB;
    public $pdo;

    public function __construct()
    {
        $this->DB = DB::getInstance();
        $this->pdo = $this->DB->getPDO();
    }

}
