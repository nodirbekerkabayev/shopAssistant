<?php

namespace Model;

use Model\DB;
use PDO;

class Debt extends DB
{
    public function addDebt(string $clientName, string $clientInfo, string $clientNumber, int $debtAmount): void
    {
        $query = 'INSERT INTO debts (klient_ismi, klient_haqida_malumot, tel_raqam, qachon_olgani, qarz_miqdori) 
                values (:clientName, :clientInfo, :clientNumber, NOW(), :debtAmount)';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
                ':clientName' => $clientName,
                ':clientInfo' => $clientInfo,
                ':clientNumber' => $clientNumber,
                ':debtAmount' => $debtAmount
            ]
        );
    }

    public function find(): array
    {
        $query = 'SELECT * FROM debts';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showByClientId(int $id)
    {
        $query = 'SELECT * FROM clients WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}