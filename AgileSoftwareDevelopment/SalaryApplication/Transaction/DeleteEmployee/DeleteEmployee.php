<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\PayrollDatabase;
use SalaryApplication\Interface\ITransaction;

class DeleteEmployee implements ITransaction
{
    function __construct(
        private int $empId,
    ) {}

    public function execute(PayrollDatabase $payrollDatabase): void
    {
        $payrollDatabase->deleteEmployee($this->empId);
    }
}