<?php

namespace SalaryApplication\Test;

use DateTime;
use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddSalariedEmployeeTransaction;
use SalaryApplication\Transaction\PaydayTransaction;

class PaydayTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_pay_single_salaried_employee(): void
    {
        $empId = 1;
        $t = new AddSalariedEmployeeTransaction($empId, "Bob", "Home", 1000);
        $t->execute($this->payrollDatabase);

        $date = new DateTime("last day of this month");
        $pt = new PaydayTransaction($date);
        $pt->execute($this->payrollDatabase);
        $this->assertNotNull($pt->getPayCheck($empId));
    }

    public function test_pay_single_salaried_employee_on_wrong_date(): void
    {
        $empId = 1;
        $t = new AddSalariedEmployeeTransaction($empId, "Bob", "Home", 1000);
        $t->execute($this->payrollDatabase);

        $date = new DateTime("last day of this month");
        $date->modify("-1 day");
        $pt = new PaydayTransaction($date);
        $pt->execute($this->payrollDatabase);
        $this->assertNull($pt->getPayCheck($empId));
    }
}