<?php

namespace Model;

use Model\DB;

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
}