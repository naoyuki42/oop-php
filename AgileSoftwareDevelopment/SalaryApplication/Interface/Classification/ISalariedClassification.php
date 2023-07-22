<?php

namespace SalaryApplication\Interface;

interface ISalariedClassification
{
    public function getSalary(): int;
    public function calculatePay(IPayCheck $pc): float;
}