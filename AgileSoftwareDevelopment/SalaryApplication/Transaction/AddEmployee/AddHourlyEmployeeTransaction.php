<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\HourlyClassification;
use SalaryApplication\Entity\WeeklySchedule;

class AddHourlyEmployeeTransaction extends AddEmployeeTransaction
{
    private int $hourlyRate;

    function __construct(int $empId, string $name, string $address, int $hourlyRate)
    {
        parent::__construct($empId, $name, $address);
        $this->hourlyRate = $hourlyRate;
    }

    public function getClassification(): HourlyClassification
    {
        return new HourlyClassification($this->hourlyRate);
    }

    public function getSchedule(): WeeklySchedule
    {
        return new WeeklySchedule();
    }
}