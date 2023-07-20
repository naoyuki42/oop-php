<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;
use SalaryApplication\Interface\IEmployee;

abstract class ChangeClassificationTransaction extends ChangeEmployeeTransaction
{
    function __construct(
        private int $empId,
    ) {
        parent::__construct($empId);
    }

    protected function change(IEmployee $e): void
    {
        $e->setClassification($this->getClassification());
        $e->setSchedule($this->getSchedule());
    }

    abstract protected function getClassification(): PaymentClassification;

    abstract protected function getSchedule(): PaymentSchedule;
}