<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IHourlyClassification;
use SalaryApplication\Interface\ITimeCard;

class HourlyClassification extends PaymentClassification implements IHourlyClassification
{
    function __construct(
        private int $hourlyRate,
        private array $timeCards = [],
    ) {}

    public function getHourlyRate(): int
    {
        return $this->hourlyRate;
    }

    public function getTimeCard(string $date): ?ITimeCard
    {
        return isset($this->timeCards[$date]) ? $this->timeCards[$date] : null;
    }

    public function addTimeCard(ITimeCard $timeCard): void
    {
        $this->timeCards[$timeCard->getDate()] = $timeCard;
    }
}