<?php

namespace SalaryApplication\Interface;

interface ISalesReceipt extends ISalary
{
    public function getAmount(): int;
}