<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IDirectMethod;

class DirectMethod extends PaymentMethod implements IDirectMethod
{
    function __construct(
        private string $bank,
        private int $account,
    ) {}

    public function getBank(): string
    {
        return $this->bank;
    }

    public function getAccount(): int
    {
        return $this->account;
    }
}