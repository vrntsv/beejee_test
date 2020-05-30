<?php
ini_set('display_errors', 'On');
require_once '../../vendor/autoload.php';
session_start();
$router = new app\core\Router($_SERVER);
$router->add('GET','page',  'TasksController', 'renderAllTasks');
$router->add('GET','createTask',  'TasksController', 'createTask');
$router->add('POST','submitTaskCreation',  'TasksController', 'storeTask');
$router->add('POST','submitLogin',  'AuthController', 'checkAuth');
$router->add('POST','submitEdit',  'AuthController', 'editTask');
$router->add('GET','login',  'AuthController', 'renderAuthForm');
$router->add('GET','logout',  'AuthController', 'logout');
$router->makeDefault('page/1');
$router->run();
