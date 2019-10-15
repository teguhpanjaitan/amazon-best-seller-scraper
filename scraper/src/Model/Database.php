<?php

namespace Scraper\Model;

class Database
{
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=scraper";
        $user = "root";
        $passwd = "";

        $this->pdo = new \PDO($dsn, $user, $passwd);
    }

    public function getMysqlPdo()
    {
        return $this->pdo;
    }
}
