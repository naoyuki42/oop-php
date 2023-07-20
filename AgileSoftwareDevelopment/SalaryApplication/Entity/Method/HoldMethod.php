<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IHoldMethod;

class HoldMethod extends PaymentMethod implements IHoldMethod
{
    function __construct(
        private string $address,
    ) {}

    public function getAddress(): string
    {
        return $this->address;
    }
}