<?php
use app\core\Controller as Controller;
include '../models/AuthModel.php';

class AuthController extends Controller
{


    function __construct()
    {
        parent::__construct();
    }


    public static function renderAuthForm($errors=null)
    {
        if(isset($_SESSION['admin']))
        {
            header('Location: /page/1');
            return;
        }
        $view = new \app\core\View();
        $view->generate('AuthView', ['errors'=> $errors], 'BaseView');
    }

    public static function checkAuth()
    {
        $authModel = new \AuthModel();
        if ($authModel->check($_POST['login'], $_POST['password'])){
            header('Location: /page/1');
            return;
        } else {
            self::renderAuthForm(['errors'=>true]);
            return;
        }

    }

    public static function logout()
    {
        if (isset($_SESSION['admin'])) {
            session_destroy();
        }
        header('Location: /page/1');
        return;
    }

    public static function storeTask()
    {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) or !isset($_POST['email'])) {
            self::createTask(
                    ['email'=> 'Invalid field'],
                    [
                            'name'=> $_POST['name'],
                            'text'=> $_POST['text']
                    ]
            );
            return;
        } elseif (!isset($_POST['name']) or strlen($_POST['name']) > 100){
            self::createTask(
                    ['name'=> 'Invalid field'],
                    [
                            'email'=> $_POST['email'],
                            'text'=> $_POST['text']
                    ]
            );
            return;

        } elseif (!isset($_POST['text']) or strlen($_POST['text']) > 100){
            self::createTask(
                    ['text'=> 'Invalid field'],
                    [
                            'email'=> $_POST['email'],
                            'name'=> $_POST['name']
                    ]
            );
            return;
        }
        $taskModel = new \TasksModel();
        $taskModel->store($_POST['name'], $_POST['email'], $_POST['text']);
        header('Location: /page/1');

    }

    public static function editTask()
    {
        if (!isset($_SESSION['admin'])){
            header('Location: /page/1');
            return;
        } else {
            if (!isset($_POST['is_done'])){
                $isDone = null;
            } else {
                $isDone = $_POST['is_done'];
            }
            $authModel = new AuthModel();
            $authModel->edit($_POST['id'], $_POST['text'], $isDone);

            header('Location: /page/'.$_POST['currentPage']);
        }


    }

}