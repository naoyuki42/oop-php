<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Interface\IEmployee;

class ChangeNameTransaction extends ChangeEmployeeTransaction
{
    function __construct(
        int $empId,
        private string $name,
    ) {
        parent::__construct($empId);
    }

    protected function change(IEmployee $e): void
    {
        $e->setName($this->name);
    }
}