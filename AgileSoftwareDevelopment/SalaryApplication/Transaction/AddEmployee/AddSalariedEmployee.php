<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\SalariedClassification;
use SalaryApplication\Entity\MonthlySchedule;

class AddSalariedEmployee extends AddEmployee
{
    private int $salary;

    function __construct(int $empId, string $name, string $address, int $salary)
    {
        parent::__construct($empId, $name, $address);
        $this->salary = $salary;
    }

    public function getClassification(): SalariedClassification
    {
        return new SalariedClassification($this->salary);
    }

    public function getSchedule(): MonthlySchedule
    {
        return new MonthlySchedule();
    }
}