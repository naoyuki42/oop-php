<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;

use SalaryApplication\Transaction\AddSalariedEmployee;
use SalaryApplication\Test\PayrollDatabase;

class AddSalariedEmployeeTest extends TestCase {
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_add_salaried_employee(): void {
        $empId = 1;

        $t = new AddSalariedEmployee($empId, "Bob", "Home", 1000);
        $t->execute();

        $e = $this->payrollDatabase->getEmployee($empId);

        $this->assertNotNull($e);
        $this->assertSame("Bob", $e->getName());

        $class = $e->getClassification();
        $this->assertNotNull($class);
        $this->assertSame(1000, $class->getSalary());

        $schedule = $e->getSchedule();
        $this->assertNotNull($schedule);

        $method = $e->getMethod();
        $this->assertNotNull($method);
    }
}
