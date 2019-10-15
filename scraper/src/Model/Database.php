<?php

namespace Scraper\Model;

class Database
{
    private $pdo;

    public function __construct()
    {
        global $config;
        $host = $config->database->get('host', 'localhost');
        $dbname = $config->database->get('dbname', 'scraper');
        $dsn = "mysql:host=$host;dbname=$dbname";
        $user = $config->database->get('username', '');
        $password = $config->database->get('password', '');

        $this->pdo = new \PDO($dsn, $user, $password);
    }

    public function getMysqlPdo()
    {
        return $this->pdo;
    }
}
