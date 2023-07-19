<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\ISalesReceipt;

class SalesReceipt extends DailySalary implements ISalesReceipt
{
    private int $amount;

    function __construct(string $date, int $amount) {
        parent::__construct($date);
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}