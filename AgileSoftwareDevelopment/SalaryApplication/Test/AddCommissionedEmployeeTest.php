<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;

use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddCommissionedEmployee;

class AddCommissionedEmployeeTest extends TestCase {
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_add_salaried_employee(): void {
        $empId = 1;

        $t = new AddCommissionedEmployee($empId, "Bob", "Home", 1000, 1.2);
        $t->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);

        $this->assertNotNull($e);
        $this->assertSame("Bob", $e->getName());

        // TODO:getHourlyRateメソッドが存在しないエラーがある
        $class = $e->getClassification();
        $this->assertNotNull($class);
        $this->assertSame(1000, $class->getSalary());
        $this->assertSame(1.2, $class->getCommissionRate());

        $schedule = $e->getSchedule();
        $this->assertNotNull($schedule);

        $method = $e->getMethod();
        $this->assertNotNull($method);
    }
}