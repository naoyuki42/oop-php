<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IAffiliation;
use SalaryApplication\Interface\IPayCheck;

abstract class PaymentAffiliation implements IAffiliation
{
    function __construct(
        private ?int $memberId = null,
        private ?int $dues = null,
        private ?array $serviceCharge = null,
    ) {}

    public function getServiceCharge(string $date): ?int
    {
        return isset($this->serviceCharge[$date]) ? $this->serviceCharge[$date] : null;
    }

    public function getDues(): int
    {
        return $this->dues;
    }

    public function getMemberId(): int
    {
        return $this->memberId;
    }

    public function addServiceCharge(string $date, int $charge): void
    {
        $this->serviceCharge[$date] = $charge;
    }

    public function calculateDeductions(IPayCheck $payCheck): float
    {
        return $this->dues != null ? (float)$this->dues : 0;
    }
}