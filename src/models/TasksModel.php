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

    public function getTasks($current_page)
    {
        if ($current_page == 1) {
            $lower = $current_page - 1;

        } else {
            $lower = ($current_page - 1) * 3;
        }
        $upper = $lower + 3;
        $sql = 'SELECT * FROM tasks ORDER BY id DESC LIMIT :lower, :upper ';
        $statement = $this->pdo->prepare($sql);
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
}