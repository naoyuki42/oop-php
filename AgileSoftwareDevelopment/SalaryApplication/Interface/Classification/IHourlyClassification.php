<?php

namespace SalaryApplication\Interface;

interface IHourlyClassification
{
    public function getHourlyRate(): int;
    public function getTimeCard(string $date): ?ITimeCard;
    public function addTimeCard(ITimeCard $timeCard): void;
}