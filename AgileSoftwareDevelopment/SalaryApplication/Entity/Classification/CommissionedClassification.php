<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\ICommissionedClassification;
use SalaryApplication\Interface\ISalesReceipt;

class CommissionedClassification extends PaymentClassification implements ICommissionedClassification
{
    function __construct(
        private int $salary,
        private float $commissionRate,
        private array $salesReceipt = [],
    ) {}

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getCommissionRate(): float
    {
        return $this->commissionRate;
    }

    public function getSalesReceipt(string $date): ?ISalesReceipt
    {
        return isset($this->salesReceipt[$date]) ? $this->salesReceipt[$date] : null;
    }

    public function addSalesReceipt(ISalesReceipt $salesReceipt): void
    {
        $this->salesReceipt[$salesReceipt->getDate()] = $salesReceipt;
    }
}