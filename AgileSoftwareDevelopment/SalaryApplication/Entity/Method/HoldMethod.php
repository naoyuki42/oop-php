<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IHoldMethod;
use SalaryApplication\Interface\IPayCheck;

class HoldMethod extends PaymentMethod implements IHoldMethod
{
    function __construct(
        private string $address,
    ) {}

    public function getAddress(): string
    {
        return $this->address;
    }

    public function pay(IPayCheck $pc): void
    {}
}