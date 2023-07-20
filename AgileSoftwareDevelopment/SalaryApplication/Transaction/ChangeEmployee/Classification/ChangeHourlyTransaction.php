<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\HourlyClassification;
use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;
use SalaryApplication\Entity\WeeklySchedule;

class ChangeHourlyTransaction extends ChangeClassificationTransaction
{
    function __construct(
        private int $empId,
        private int $hourlyRate,
    ) {
        parent::__construct($empId);
    }

    protected function getClassification(): PaymentClassification
    {
        return new HourlyClassification($this->hourlyRate);
    }

    protected function getSchedule(): PaymentSchedule
    {
        return new WeeklySchedule();
    }
}