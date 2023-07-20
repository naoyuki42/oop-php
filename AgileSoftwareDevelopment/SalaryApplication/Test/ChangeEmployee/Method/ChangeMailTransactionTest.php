<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\Interface\IMailMethod;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\ChangeMailTransaction;

class ChangeMailTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_name_transaction(): void
    {
        $empId = 2;
        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 1500);
        $t->execute($this->payrollDatabase);

        $cmt = new ChangeMailTransaction($empId, "America");
        $cmt->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $method = $e->getMethod();
        $this->assertTrue($method instanceof IMailMethod);
        $this->assertSame("America", $method->getAddress());
    }
}