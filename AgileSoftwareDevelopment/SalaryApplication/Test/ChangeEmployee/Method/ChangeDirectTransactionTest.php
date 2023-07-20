<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\Interface\IDirectMethod;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\ChangeDirectTransaction;

class ChangeDirectTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_direct_transaction(): void
    {
        $empId = 2;
        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 1500);
        $t->execute($this->payrollDatabase);

        $cdt = new ChangeDirectTransaction($empId, "Express", 100001);
        $cdt->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $method = $e->getMethod();
        $this->assertTrue($method instanceof IDirectMethod);
        $this->assertSame("Express", $method->getBank());
        $this->assertSame(100001, $method->getAccount());
    }
}