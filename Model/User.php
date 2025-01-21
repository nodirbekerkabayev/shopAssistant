<?php

namespace Model;

use Model\DB;

class User extends DB
{
    public function getUser(string $name, string $password): array
    {
        $query = "SELECT * FROM `user` WHERE `name` = :name AND `password` = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            "name" => $name,
            "password" => $password
        ]);
        return $stmt->fetchAll();
    }
}