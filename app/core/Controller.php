<?php

namespace app\core;

use app\core\View;


abstract class Controller
{
    public $path;
    public $view;
    public $access;

    public function __construct($route)
    {
        $this->route = $route;

//        if($this->checkAccess())
//        {
//            View::errorCode(403);
//        }

        $this->view = new View($route);

        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name)
    {
        $path = 'app\models\\'.ucfirst($name);
        if(class_exists($path))
        {
            return new $path;
        }

    }

    public function checkAccess()
    {
        $this->access = require 'app/access/'.$this->route['controller'].'.php';

        print_r($this->access);

        if($this->isAccess('all'))
        {
            return true;
        } elseif(isset($_SESSION['authorize']['id']) and $this->isAccess('authorize'))
        {
            return true;
        }
        return false;
    }

    public function isAccess($key)
    {
        return in_array($this->route['action'], $this->access($key));
    }


}