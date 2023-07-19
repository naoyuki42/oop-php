<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\CommissionedClassification;
use SalaryApplication\Entity\BiweeklySchedule;

class AddCommissionedEmployee extends AddEmployee
{
    private int $salary;
    private float $commissionRate;

    function __construct(int $empId, string $name, string $address, int $salary, float $commissionRate)
    {
        parent::__construct($empId, $name, $address);
        $this->salary = $salary;
        $this->commissionRate = $commissionRate;
    }

    public function getClassification(): CommissionedClassification
    {
        return new CommissionedClassification($this->salary, $this->commissionRate);
    }

    public function getSchedule(): BiweeklySchedule
    {
        return new BiweeklySchedule();
    }
}