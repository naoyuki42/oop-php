<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Interface\IBiweeklySchedule;
use SalaryApplication\Interface\ICommissionedClassification;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\ChangeCommissionedTransaction;

class ChangeCommissionedTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_name_transaction(): void
    {
        $empId = 2;
        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 9);
        $t->execute($this->payrollDatabase);

        $cht = new ChangeCommissionedTransaction($empId, 300, 1.5);
        $cht->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $class = $e->getClassification();
        $this->assertTrue($class instanceof ICommissionedClassification);
        $this->assertSame(300, $class->getSalary());
        $this->assertSame(1.5, $class->getCommissionRate());

        $schedule = $e->getSchedule();
        $this->assertTrue($schedule instanceof IBiweeklySchedule);
    }
}