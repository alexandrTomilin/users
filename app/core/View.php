<?php

namespace app\core;

class View
{
    public $path;
    public $route;
    public $partial;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;

        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($vars = ['title' => '', 'scripts' => ''])
    {
        extract($vars);

        $path = 'app/views/pages/'.$this->path.'.php';

        if(file_exists($path))
        {
            ob_start();

            require $path;

            $content = ob_get_clean();

            require_once 'app/views/partials/header/index.php';

            require 'app/views/layouts/'.$this->layout.'.php';

            $modal = require_once 'app/views/modals/index.php';
        } else
        {
            echo 'Вид '.$this->path.' не найден';
        }
    }

    public function redirect($url)
    {
        header('Location: '.$url);

        exit();
    }

    public static function errorCode($code)
    {
        http_response_code($code);

        $path = 'app/views/errors/'.$code.'.php';

        if(file_exists($path))
        {
            require $path;
        }

        exit();
    }
}