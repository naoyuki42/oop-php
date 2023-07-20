<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\ChangeAddressTransaction;

class ChangeAddressTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_address_transaction(): void
    {
        $empId = 2;
        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 15);
        $t->execute($this->payrollDatabase);

        $cat = new ChangeAddressTransaction($empId, "America");
        $cat->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);
        $this->assertSame("America", $e->getAddress());
    }
}