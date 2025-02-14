<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Model\Debt;
use Traits\Validator;

class DebtController
{
    use Validator;

    public function addDebt(): void
    {
        $clientDebtInfo = $this->validate([
                'clientName' => 'required',
                'clientInfo' => 'required',
                'clientNumber' => 'required',
                'debtAmount' => 'required',
            ]
        );
        if ($clientDebtInfo) {
            $debt = new Debt();
            $debt->addDebt($_POST['clientName'], $_POST['clientInfo'], $_POST['clientNumber'], $_POST['debtAmount']);
            apiResponse([
                'message' => 'Debt added successfully'
            ]);
        }
    }

    #[NoReturn] public function getDebts()
    {
        $person = (new Debt())->find();
        if ($person) {
            apiResponse([
                'data' => $person
            ]);
        }
        apiResponse([
            'message' => 'No Debts Found'
        ]);
    }

    #[NoReturn] public function showDebtById(): void
    {
        $clientDebtInfo = (new Debt())->showByClientId($_POST['id']);
        if ($clientDebtInfo) {
            apiResponse([
                'data' => $clientDebtInfo
            ]);
        }
        apiResponse([
            'message' => 'No Debts Found'
        ]);
    }
}