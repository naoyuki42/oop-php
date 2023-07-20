<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;

class ChangeMemberTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_member_transaction(): void
    {
    }
}