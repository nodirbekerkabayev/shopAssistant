<?php

namespace Model;

use PDO;

class DB
{
    private string $host;
    private string $user;
    private string $password;
    private string $database;
    protected PDO $pdo;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
        $this->database = $_ENV['DB_NAME'];
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
        return $this->pdo;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}