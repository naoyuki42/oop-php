<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Interface\IMonthlySchedule;
use SalaryApplication\Interface\ISalariedClassification;
use SalaryApplication\Transaction\AddCommissionedEmployeeTransaction;
use SalaryApplication\Transaction\ChangeSalariedTransaction;

class ChangeSalariedTransactionTest extends TestCase
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

        $cst = new ChangeSalariedTransaction($empId, 200);
        $cst->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $class = $e->getClassification();
        $this->assertTrue($class instanceof ISalariedClassification);
        $this->assertSame(200, $class->getSalary());

        $schedule = $e->getSchedule();
        $this->assertTrue($schedule instanceof IMonthlySchedule);
    }
}