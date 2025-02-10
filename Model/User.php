<?php

namespace Model;

use Model\DB;
use Random\RandomException;
use Traits\HasApiToken;

class User extends DB
{
    use HasApiToken;
    /**
     * @throws RandomException
     */
    public function getUser(string $name, string $password): ?array
    {
        $query = "SELECT * FROM `user` WHERE `name` = :name AND `password` = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            "name" => $name,
            "password" => $password
        ]);
        $user = $stmt->fetchAll();
        if($user){
            $this->createApiToken(1);
            return $user;
        }
        return null;
    }
    public function getUserById(int $id): mixed
    {
        $query = "SELECT id, name, created_at FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':id' => $id,
        ]);
        return $stmt->fetch();
    }
}