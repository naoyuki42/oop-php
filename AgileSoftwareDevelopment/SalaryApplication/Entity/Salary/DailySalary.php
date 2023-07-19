<?php

namespace SalaryApplication\Entity;

abstract class DailySalary
{
    function __construct(
        private string $date,
    ) {}

    public function getDate(): string
    {
        return $this->date;
    }
}