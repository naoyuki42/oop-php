<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\MonthlySchedule;
use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;
use SalaryApplication\Entity\SalariedClassification;

class ChangeSalariedTransaction extends ChangeClassificationTransaction
{
    function __construct(
        int $empId,
        private int $salary
    ) {
        parent::__construct($empId);
    }

    protected function getClassification(): PaymentClassification
    {
        return new SalariedClassification($this->salary);
    }

    protected function getSchedule(): PaymentSchedule
    {
        return new MonthlySchedule();
    }
}