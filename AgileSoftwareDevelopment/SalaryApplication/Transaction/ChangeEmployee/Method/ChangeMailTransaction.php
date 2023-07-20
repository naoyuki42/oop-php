<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\MailMethod;
use SalaryApplication\Entity\PaymentMethod;

class ChangeMailTransaction extends ChangeMethodTransaction
{
    function __construct(
        int $empId,
        private string $address,
    ) {
        parent::__construct($empId);
    }

    protected function getMethod(): PaymentMethod
    {
        return new MailMethod($this->address);
    }
}