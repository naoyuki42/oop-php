<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\ITimeCard;

class TimeCard implements ITimeCard
{
    function __construct(
        private string $date,
        private string $hours,
    ) {}

    public function getDate(): string
    {
        return $this->date;
    }

    public function getHours(): string
    {
        return $this->hours;
    }
}