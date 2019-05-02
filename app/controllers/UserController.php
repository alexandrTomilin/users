<?php

namespace app\controllers;

use app\core\Controller;
use SimpleXMLElement;
use stdClass;

class UserController extends Controller
{

    public function viewAction()
    {
        $users = $this->model->getUsers();

        $response = 'html';
//        $response = 'json';
//        $response = 'xml';

        switch ($response)
        {
            case "html":

                $vars = [
                    'title' => 'registration',
                    'users' => $users
                ];

                $this->view->render($vars);

                break;

            case "json":

                $str = json_encode($users, JSON_UNESCAPED_UNICODE);

                print_r($str);

                break;

            case "xml":

                $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><values/>');

//                print_r($users[0]);

//                for ($i = 0; $i < count($users); $i++)
//                {
//                    foreach ($users[$i] as $k => $v)
//                    {
//                        $xml->addChild($k, $v);
//                    }
//                }

//                foreach ($test_array as $k => $v)
//                {
//                    $xml->addChild($k, $v);
//                }
//
//                print_r($xml->asXML());

                break;
        }
    }

    public function registerAction()
    {
        $vars = [
            'title' => 'registration'
        ];

        $this->view->render($vars);
    }

    public function registerUserAction()
    {
        if(!empty($_POST))
        {
            if (!$this->model->validate(['id', 'name', 'login', 'password', 'email'], $_POST))
            {
//                $this->view->message('error', $this->model->error);
            }
//            $this->view->message('succes', 'validate successful');
        }

        $vars = [
            'title' => 'registration'
        ];

        $this->model->register($vars);

        var_dump($this->model->register($vars));

//        $this->view->render($vars);
    }
}