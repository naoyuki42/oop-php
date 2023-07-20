<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\DirectMethod;
use SalaryApplication\Entity\PaymentMethod;

class ChangeDirectTransaction extends ChangeMethodTransaction
{
    function __construct(
        private int $empId,
        private string $bank,
        private int $account,
    ) {
        parent::__construct($empId);
    }

    protected function getMethod(): PaymentMethod
    {
        return new DirectMethod($this->bank, $this->account);
    }
}