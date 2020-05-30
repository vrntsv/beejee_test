<?php
use app\core\Controller as Controller;
include '../models/TasksModel.php';

class TasksController extends Controller
{


    function __construct()
    {
        parent::__construct();
    }


    public static function renderAllTasks($currentPage=1)
    {
        $taskModel = new \TasksModel();
        $taskList = $taskModel->getTasks($currentPage);
        $lastPage = $taskModel->getLastPage();
        $view = new \app\core\View();
        $view->generate('TasksListView', ['current_page'=> $currentPage, 'tasks'=>$taskList, 'last_page'=>$lastPage], 'BaseView');
    }

    public static function createTask($errors=null, $oldValues=null)
    {
        $view = new \app\core\View();
        $view->generate('CreateTaskView', ['errors'=>$errors, 'oldValues'=>$oldValues], 'BaseView');
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

}