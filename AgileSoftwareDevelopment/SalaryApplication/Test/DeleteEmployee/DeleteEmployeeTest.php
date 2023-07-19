<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddCommissionedEmployee;
use SalaryApplication\Transaction\DeleteEmployee;

class DeleteEmployeeTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }


    public function test_delete_employee(): void
    {
        $empId = 3;

        $t = new AddCommissionedEmployee($empId, "Lance", "Home", 2500, 3.2);
        $t->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $dt = new DeleteEmployee($empId);
        $dt->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNull($e);
    }
}