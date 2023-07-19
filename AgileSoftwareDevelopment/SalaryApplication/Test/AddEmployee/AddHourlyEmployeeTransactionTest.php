<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;

use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;

class AddHourlyEmployeeTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_add_hourly_employee(): void
    {
        $empId = 1;

        $t = new AddHourlyEmployeeTransaction($empId, "Bob", "Home", 15);
        $t->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);

        $this->assertNotNull($e);
        $this->assertSame("Bob", $e->getName());

        // TODO:getHourlyRateメソッドが存在しないエラーがある
        $class = $e->getClassification();
        $this->assertNotNull($class);
        $this->assertSame(15, $class->getHourlyRate());

        $schedule = $e->getSchedule();
        $this->assertNotNull($schedule);

        $method = $e->getMethod();
        $this->assertNotNull($method);
    }
}