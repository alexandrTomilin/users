<?php

namespace app\core;

use app\core\View;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $array = require 'routes/web.php';
        foreach ($array as $key => $value)
        {
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params)
        {
            if (preg_match($route, $url, $match))
            {
                $this->params = $params;

                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if($this->match())
        {
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';

            if(class_exists($path))
            {
                $action = $this->params['action'].'Action';

                if (method_exists($path, $action))
                {
                    $controller = new $path($this->params);

                    $controller->$action();
                } else
                {
                    View::errorCode(404);
                }
            } else
            {
                View::errorCode(404);
            }
        } else
        {
            View::errorCode(404);
        }
    }
}