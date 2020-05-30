<?php

use app\core\Model as Model;


class TasksModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($name, $email, $text)
    {
        $sql = "INSERT INTO tasks (name, email, text) VALUES (?,?,?)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$name, $email, $text]);
    }

    public function getTasks($current_page, $email=null, $name=null, $is_done=null)
    {

        if ($current_page == 1) {
            $lower = $current_page - 1;

        } else {
            $lower = ($current_page - 1) * 3;
        }

        $upper = $lower + 3;
        if ($email) {
            $sql = 'SELECT * FROM tasks WHERE email LIKE concat(\'%\',:email,\'%\') ORDER BY id  DESC LIMIT :lower, :upper ';
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(':email', $email);
        } elseif ($name){
            $sql = 'SELECT * FROM tasks WHERE name LIKE concat(\'%\',:name,\'%\') ORDER BY id DESC LIMIT :lower, :upper ';
            $statement = $this->pdo->prepare($sql);
            $statement->bindValue(':name', $name);
        } elseif ($is_done){
            $sql = 'SELECT * FROM tasks WHERE is_done=1 ORDER BY id DESC LIMIT :lower, :upper ';
            $statement = $this->pdo->prepare($sql);
        }
        else {
            $sql = 'SELECT * FROM tasks ORDER BY id DESC LIMIT :lower, :upper ';
            $statement = $this->pdo->prepare($sql);
        }
        $statement->bindValue(':lower', $lower, PDO::PARAM_INT);
        $statement->bindValue(':upper', $upper, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();

    }

    public function getLastPage()
    {
        $sql = 'SELECT COUNT(id) FROM tasks';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $count = $statement->fetchColumn();
        $lastPage = $count/3 + 1;

        return (int)$lastPage;
    }

    public function getLastPageFilterByEmail($email)
    {
        $sql = 'SELECT COUNT(id) FROM tasks  WHERE email LIKE concat(\'%\',:email,\'%\')';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $count = $statement->fetchColumn();
        $lastPage = $count/3 + 1;

        return (int)$lastPage;
    }

    public function getLastPageFilterByName($name)
    {
        $sql = 'SELECT COUNT(id) FROM tasks  WHERE name LIKE concat(\'%\',:name,\'%\')';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $count = $statement->fetchColumn();
        $lastPage = $count/3 + 1;

        return (int)$lastPage;
    }

    public function getLastPageFilterByDone()
    {
        $sql = 'SELECT COUNT(id) WHERE is_done=1 FROM tasks';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $count = $statement->fetchColumn();
        $lastPage = $count/3 + 1;

        return (int)$lastPage;
    }
}