<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IClassification;

class SalariedClassification implements IClassification
{
    function __construct(
        private int $salary,
    ) {}

    public function getSalary(): int
    {
        return $this->salary;
    }
}