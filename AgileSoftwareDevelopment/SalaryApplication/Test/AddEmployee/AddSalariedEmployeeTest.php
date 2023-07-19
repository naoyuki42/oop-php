<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;

use SalaryApplication\Transaction\AddSalariedEmployee;
use SalaryApplication\PayrollDatabase;

class AddSalariedEmployeeTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_add_salaried_employee(): void
    {
        $empId = 1;

        $t = new AddSalariedEmployee($empId, "Bob", "Home", 1000);
        $t->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);

        $this->assertNotNull($e);
        $this->assertSame("Bob", $e->getName());

        // TODO:getSalaryメソッドが存在しないエラーがある
        $class = $e->getClassification();
        $this->assertNotNull($class);
        $this->assertSame(1000, $class->getSalary());

        $schedule = $e->getSchedule();
        $this->assertNotNull($schedule);

        $method = $e->getMethod();
        $this->assertNotNull($method);
    }
}
