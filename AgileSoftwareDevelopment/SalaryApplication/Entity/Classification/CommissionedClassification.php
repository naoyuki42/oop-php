<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\ICommissionedClassification;

class CommissionedClassification extends PaymentClassification implements ICommissionedClassification
{
    function __construct(
        private int $salary,
        private float $commissionRate,
    ) {}

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getCommissionRate(): float
    {
        return $this->commissionRate;
    }
}