<?php

namespace app\core;
include '../controllers/TasksController.php';
include '../controllers/AuthController.php';
class Router
{
    public $request = '';
    public $default;
    public $routes = [];


    public function __construct(array $request)
    {
        $url= explode('/', $_SERVER['REQUEST_URI']);
        unset($url[0]);
        foreach ($url as $item){
            $this->request .= $item.'/';
        }

    }

    public function getParams($path)
    {
        $decompURI = explode('/', $path);
        unset($decompURI[0]);
        return $decompURI;
    }

    public function add($method, $path, $controller, $function)
    {
        $this->routes[$path] = array(
                'method' => $method,
                'controller_name' => $controller,
                'function_name' => $function,
        );

    }

    public function makeDefault($path)
    {
        $this->default = $path;
    }


    public function hasRoute(string $uri) : bool
    {
        foreach ($this->routes as $key=>$route)
        {
            if ($key == $uri) {
                return true;
            }
        }
        return false;

    }

    public function run()
    {
        $routeName = explode('/', $this->request)[0];
        if($this->hasRoute($routeName) and $_SERVER['REQUEST_METHOD'] == $this->routes[$routeName]['method']) {
            $data = $this->routes[$routeName];
            if (!empty($this->getParams($this->request))){
                call_user_func(array($data['controller_name'], $data['function_name']), $this->getParams($this->request)[1]);
            } else {
                call_user_func(array($data['controller_name'], $data['function_name']));
            }
        } else {
            header('Location: '.$this->default);
        }
    }


}