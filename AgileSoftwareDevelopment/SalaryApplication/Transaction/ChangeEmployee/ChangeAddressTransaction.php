<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Interface\IEmployee;

class ChangeAddressTransaction extends ChangeEmployeeTransaction
{
    function __construct(
        int $empId,
        private string $address,
    ) {
        parent::__construct($empId);
    }

    protected function change(IEmployee $e): void
    {
        $e->setAddress($this->address);
    }
}