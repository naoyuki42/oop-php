<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\ITimeCard;

class TimeCard extends DailySalary implements ITimeCard
{
    private string $hours;

    function __construct(string $date, string $hours) {
        parent::__construct($date);
        $this->hours = $hours;
    }

    public function getHours(): string
    {
        return $this->hours;
    }
}