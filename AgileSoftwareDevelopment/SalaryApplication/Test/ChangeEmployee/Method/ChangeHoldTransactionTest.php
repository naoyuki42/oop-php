<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\Interface\IHoldMethod;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\ChangeHoldTransaction;

class ChangeHoldTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_hold_transaction(): void
    {
        $empId = 2;
        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 1500);
        $t->execute($this->payrollDatabase);

        $cht = new ChangeHoldTransaction($empId, "America");
        $cht->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $method = $e->getMethod();
        $this->assertTrue($method instanceof IHoldMethod);
        $this->assertSame("America", $method->getAddress());
    }
}