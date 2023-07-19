<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IAffiliation;

class UnionAffiliation implements IAffiliation
{
    function __construct(
        private int $charge,
        private array $serviceCharge = [],
    ) {}

    public function getServiceCharge(string $date): ?int
    {
        return isset($this->serviceCharge[$date]) ? $this->serviceCharge[$date] : null;
    }

    public function addServiceCharge(string $date, int $charge): void
    {
        $this->serviceCharge[$date] = $charge;
    }
}