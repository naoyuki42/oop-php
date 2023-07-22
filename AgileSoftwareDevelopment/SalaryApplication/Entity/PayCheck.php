<?php

namespace SalaryApplication\Entity;

use DateTime;
use SalaryApplication\Interface\IPayCheck;

class PayCheck implements IPayCheck
{
    function __construct(
        private DateTime $date,
        private ?float $grossPay = null,
        private ?float $deductions = null,
        private ?float $netPay = null,
    ) {}

    public function setGrossPay(float $grossPay): void
    {
        $this->grossPay = $grossPay;
    }

    public function setDeductions(float $deductions): void
    {
        $this->deductions = $deductions;
    }

    public function setNetPay(float $netPay): void
    {
        $this->netPay = $netPay;
    }
}