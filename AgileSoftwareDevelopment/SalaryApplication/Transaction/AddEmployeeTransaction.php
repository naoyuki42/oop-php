<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\PayrollDatabase;
use SalaryApplication\Entity\Employee;
use SalaryApplication\Entity\HoldMethod;
use SalaryApplication\Interface\IClassification;
use SalaryApplication\Interface\ISchedule;
use SalaryApplication\Interface\ITransaction;

abstract class AddEmployeeTransaction implements ITransaction
{
    function __construct(
        private int $empId,
        private string $name,
        private string $address,
    ) {}

    public function execute(PayrollDatabase $payrollDatabase): void
    {
        $class = $this->getClassification();
        $schedule = $this->getSchedule();
        $method = new HoldMethod();
        $e = new Employee($this->empId, $this->name, $this->address);

        $e->setClassification($class);
        $e->setSchedule($schedule);
        $e->setMethod($method);

        $payrollDatabase->addEmployee($this->empId, $e);
    }

    abstract protected function getClassification(): IClassification;

    abstract protected function getSchedule(): ISchedule;
}