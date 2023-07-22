<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IMailMethod;
use SalaryApplication\Interface\IPayCheck;

class MailMethod extends PaymentMethod implements IMailMethod
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