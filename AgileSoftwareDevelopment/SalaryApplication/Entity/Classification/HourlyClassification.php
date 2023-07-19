<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IHourlyClassification;

class HourlyClassification extends PaymentClassification implements IHourlyClassification
{
    function __construct(
        private int $hourlyRate,
    ) {}

    public function getHourlyRate(): int
    {
        return $this->hourlyRate;
    }
}