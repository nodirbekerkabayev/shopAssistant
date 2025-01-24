<?php

namespace Traits;

use Random\RandomException;

trait HasApiToken
{
    public string $token;
    protected string $duration;

    /**
     * @throws RandomException
     */
    public function createApiToken(int $userId): string
    {
        $query = 'INSERT INTO user_api_tokens (user_id, token, expires_at, created_at)
                    VALUES (:user_id, :token, :expires_at, NOW())';
        $this->token = bin2hex(random_bytes(40));
        $this->duration = date('Y-m-d H:i:s', strtotime('+' . $_ENV["API_TOKEN_EXPIRATION"] . ' day'));
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'token' => $this->token,
            'expires_at' => $this->duration,
        ]);
        return $this->token;
    }
}