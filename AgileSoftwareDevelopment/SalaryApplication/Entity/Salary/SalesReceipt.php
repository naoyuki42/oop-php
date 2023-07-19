<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\ISalesReceipt;

class SalesReceipt implements ISalesReceipt
{
    function __construct(
        private string $date,
        private int $amount,
    ) {}

    public function getDate(): string
    {
        return $this->date;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}