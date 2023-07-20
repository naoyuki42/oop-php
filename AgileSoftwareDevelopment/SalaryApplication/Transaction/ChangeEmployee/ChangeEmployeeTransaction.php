<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Interface\IEmployee;
use SalaryApplication\Interface\ITransaction;
use SalaryApplication\PayrollDatabase;

abstract class ChangeEmployeeTransaction implements ITransaction
{
    function __construct(
        private int $empId,
    ) {}

    public function execute(PayrollDatabase $payrollDatabase): void
    {
        $e = $payrollDatabase->getEmployee($this->empId);
        if($e != null) {
            $this->change($e);
        }
    }

    abstract protected function change(IEmployee $e): void;
}