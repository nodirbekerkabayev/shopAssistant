<?php

namespace Controller;

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
}