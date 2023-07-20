<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IMailMethod;

class MailMethod extends PaymentMethod implements IMailMethod
{
    function __construct(
        private string $address,
    ) {}

    public function getAddress(): string
    {
        return $this->address;
    }
}