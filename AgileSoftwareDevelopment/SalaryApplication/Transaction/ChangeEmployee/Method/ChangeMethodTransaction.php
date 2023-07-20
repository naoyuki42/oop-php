<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\PaymentMethod;
use SalaryApplication\Interface\IEmployee;

abstract class ChangeMethodTransaction extends ChangeEmployeeTransaction
{
    function __construct(
        int $empId,
    ) {
        parent::__construct($empId);
    }

    protected function change(IEmployee $e): void
    {
        $e->setMethod($this->getMethod());
    }

    abstract protected function getMethod(): PaymentMethod;
}