<?php

namespace SalaryApplication\Interface;

interface IPayCheck
{
    public function setGrossPay(float $grossPay): void;
    public function setDeductions(float $deductions): void;
    public function setNetPay(float $netPay): void;
}