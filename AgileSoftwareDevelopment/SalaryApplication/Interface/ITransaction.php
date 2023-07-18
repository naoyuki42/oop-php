<?php

namespace SalaryApplication\Interface;

use SalaryApplication\PayrollDatabase;

interface ITransaction
{
    public function execute(PayrollDatabase $payrollDatabase): void;
}