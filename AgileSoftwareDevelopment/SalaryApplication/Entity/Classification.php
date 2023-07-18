<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IClassification;

class Classification implements IClassification
{
    public function getSalary(): int
    {
        return 1000;
    }
}