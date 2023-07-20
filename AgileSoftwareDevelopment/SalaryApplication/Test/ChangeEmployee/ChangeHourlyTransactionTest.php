<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Interface\IHourlyClassification;
use SalaryApplication\Interface\IWeeklySchedule;
use SalaryApplication\Transaction\AddCommissionedEmployeeTransaction;
use SalaryApplication\Transaction\ChangeHourlyTransaction;

class ChangeHourlyTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_name_transaction(): void
    {
        $empId = 2;
        $t = new AddCommissionedEmployeeTransaction($empId, "Bill", "Home", 2500, 3.2);
        $t->execute($this->payrollDatabase);

        $cht = new ChangeHourlyTransaction($empId, 27);
        $cht->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $class = $e->getClassification();
        $this->assertTrue($class instanceof IHourlyClassification);
        $this->assertSame(27, $class->getHourlyRate());

        $schedule = $e->getSchedule();
        $this->assertTrue($schedule instanceof IWeeklySchedule);
    }
}