<?php

namespace SalaryApplication\Transaction;

use Error;
use SalaryApplication\Entity\TimeCard;
use SalaryApplication\Interface\IHourlyClassification;
use SalaryApplication\Interface\ITransaction;
use SalaryApplication\PayrollDatabase;

class TimeCardTransaction implements ITransaction
{
    function __construct(
        private string $date,
        private string $hours,
        private int $empId,
    ) {}

    public function execute(PayrollDatabase $payrollDatabase): void
    {
        $e = $payrollDatabase->getEmployee($this->empId);
        if ($e == null) {
            throw new Error("No such Employee.");
        }

        $class = $e->getClassification();
        $isHourlyClassification = $class instanceof IHourlyClassification;
        if (!$isHourlyClassification) {
            throw new Error("Tried to add timecard to non-hourly employee.");
        }

        $timeCard = new TimeCard($this->date, $this->hours);
        $class->addTimeCard($timeCard);
    }
}