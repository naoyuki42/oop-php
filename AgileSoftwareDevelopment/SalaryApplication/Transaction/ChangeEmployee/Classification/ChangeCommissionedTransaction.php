<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\BiweeklySchedule;
use SalaryApplication\Entity\CommissionedClassification;
use SalaryApplication\Entity\PaymentClassification;
use SalaryApplication\Entity\PaymentSchedule;

class ChangeCommissionedTransaction extends ChangeClassificationTransaction
{
    function __construct(
        private int $empId,
        private int $salary,
        private float $commissionRate,
    ) {
        parent::__construct($empId);
    }

    protected function getClassification(): PaymentClassification
    {
        return new CommissionedClassification($this->salary, $this->commissionRate);
    }

    protected function getSchedule(): PaymentSchedule
    {
        return new BiweeklySchedule();
    }
}