<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\TimeCardTransaction;

class TimeCardTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_time_card_transaction(): void
    {
        $empId = 2;

        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 15);
        $t->execute($this->payrollDatabase);

        $tct = new TimeCardTransaction("2023-07-19", "19", $empId);
        $tct->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $class = $e->getClassification();
        $this->assertNotNull($class);

        $tc = $class->getTimeCard("2023-07-19");
        $this->assertNotNull($tc);
        $this->assertSame("19", $tc->getHours());
    }
}