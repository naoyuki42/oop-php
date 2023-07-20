<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\HoldMethod;
use SalaryApplication\Entity\PaymentMethod;

class ChangeHoldTransaction extends ChangeMethodTransaction
{
    function __construct(
        private int $empId,
        private string $address,
    ) {
        parent::__construct($empId);
    }

    protected function getMethod(): PaymentMethod
    {
        return new HoldMethod($this->address);
    }
}