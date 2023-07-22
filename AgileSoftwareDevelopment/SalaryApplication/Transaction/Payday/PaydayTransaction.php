<?php

namespace SalaryApplication\Transaction;

use DateTime;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Entity\PayCheck;
use SalaryApplication\Interface\IPayCheck;
use SalaryApplication\Interface\ITransaction;

class PaydayTransaction implements ITransaction
{
    function __construct(
        private DateTime $date,
        private array $payChecks = [],
    ) {}

    public function execute(PayrollDatabase $payrollDatabase): void
    {
        $employees = $payrollDatabase->getAllEmployees();
        foreach($employees as $empId => $e) {
            if($e->isPayDate($this->date)) {
                $pc = new PayCheck($this->date);
                $this->payChecks[$empId] = $pc;
                $e->payDay($pc);
            }
        }
    }

    public function getPayCheck(int $empId): ?IPayCheck
    {
        return isset($this->payChecks[$empId]) ? $this->payChecks[$empId] : null;
    }
}