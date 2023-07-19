<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\ISalariedClassification;

class SalariedClassification extends PaymentClassification implements ISalariedClassification
{
    function __construct(
        private int $salary,
    ) {}

    public function getSalary(): int
    {
        return $this->salary;
    }
}