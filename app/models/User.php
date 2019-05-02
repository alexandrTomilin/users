<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
    public function register($post)
    {
        $params = [
            'id' => '',
            'name' => $post['name'],
            'login' => $post['login'],
            'password' => $post['password'],
            'email' => $post['email']
        ];

        $sql = "INSERT INTO users (id, name, login, password, email) VALUES (:id, :name, :login, :password, :email)";

        $this->db->query($sql, $params);
    }

    public function validate($input, $post)
    {
        $rules = [

            'email' => [
                'pattern' => '',
                'message' => 'E-mail incorrect',
            ],

            'login' => [
                'pattern' => '#^[a-z0-9]{3, 15}$#',
                'message' => 'login incorrect, string length 3 - 15 chars',
            ],

            'name' => [
                'pattern' => '#^[a-z0-9]{2, 15}$#',
                'message' => 'name incorrect, string length 2 - 15 chars',
            ],

            'password' => [
                'pattern' => '#^[a-z0-9]{8, 15}$#',
                'message' => 'name incorrect, string length 8 - 15 chars',
            ]
        ];

        foreach ($input as $value)
        {
            if(!isset($post[$value]) or !empty($post[$value]) and !preg_match($rules[$value]['pattern'], $post[$value]))
            {
                $this->error = '12345';

                return false;
            }
        }

        return true;

    }

    public function checkEmailExists($email)
    {
        $params = [
            'email' => $email,
        ];

        if($this->db->column('SELECT id FROM users WHERE users.email = :email, $params'))
        {
            $this->error = 'this mail exist';

            return false;
        }
        return true;
    }

    public function getUsers()
    {
        return $this->db->row("SELECT users.name FROM users");
    }

}