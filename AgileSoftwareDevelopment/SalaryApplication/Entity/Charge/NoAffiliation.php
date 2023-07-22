<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IAffiliation;

class NoAffiliation implements IAffiliation
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
}