<?php

namespace app\core;

use PDO;

class Database
{
    protected $db;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require 'config.php';

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['database'].';charset='.$config['charset'];

        $this->db = new PDO($dsn, $config['user'], $config['password']);

        return $this;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);

        if(!empty($params))
        {
            foreach ($params as $key => $value)
            {
                if (is_int($value))
                {
                    $type = PDO::PARAM_INT;
                } else
                {
                    $type = PDO::PARAM_STR;
                }

                $stmt->bindValue(':'.$key, $value, $type);
            }
        }

        $stmt->execute();

        return $stmt;
    }

    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);

        return $result->fetchColumn();
    }
}