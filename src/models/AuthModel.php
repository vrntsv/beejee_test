<?php

use app\core\Model as Model;


class AuthModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check($login, $password)
    {
        if ($login == 'admin' and  $password == '123'){
            $_SESSION['admin'] = true;
            return true;
        }else{
            return false;
        }
    }

    public function edit($id, $text, $isDone)
    {
        $sql = "UPDATE tasks SET text=?, is_done=?, is_changed=1 WHERE id=?";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([$text, $isDone, $id]);
    }

}