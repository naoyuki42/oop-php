<?php

namespace SalaryApplication\Transaction;

use Error;
use SalaryApplication\Entity\SalesReceipt;
use SalaryApplication\Interface\ICommissionedClassification;
use SalaryApplication\Interface\ITransaction;
use SalaryApplication\PayrollDatabase;

class SalesReceiptTransaction implements ITransaction
{
    function __construct(
        private string $date,
        private int $amount,
        private int $empId,
    ) {}

    public function execute(PayrollDatabase $payrollDatabase): void
    {
        $e = $payrollDatabase->getEmployee($this->empId);
        if ($e == null) {
            throw new Error("No such Employee.");
        }

        $class = $e->getClassification();
        $isCommissionedClassification = $class instanceof ICommissionedClassification;
        if (!$isCommissionedClassification) {
            throw new Error("Tried to add sales receipt to non-commissioned employee.");
        }

        $salesReceipt = new SalesReceipt($this->date, $this->amount);
        $class->addSalesReceipt($salesReceipt);
    }
}