<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\SalariedClassification;
use SalaryApplication\Entity\MonthlySchedule;
use SalaryApplication\Interface\IClassification;
use SalaryApplication\Interface\ISchedule;

class AddSalariedEmployee extends AddEmployeeTransaction
{
    private int $salary;

    function __construct(int $empId, string $name, string $address, int $salary)
    {
        parent::__construct($empId, $name, $address);
        $this->salary = $salary;
    }

    public function getClassification(): IClassification
    {
        return new SalariedClassification($this->salary);
    }

    public function getSchedule(): ISchedule
    {
        return new MonthlySchedule();
    }
}