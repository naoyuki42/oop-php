<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddCommissionedEmployeeTransaction;
use SalaryApplication\Transaction\SalesReceiptTransaction;

class SalesReceiptTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_sales_receipt_transaction(): void
    {
        $empId = 4;

        $t = new AddCommissionedEmployeeTransaction($empId, "Alice", "Home", 10, 1.2);
        $t->execute($this->payrollDatabase);

        $tct = new SalesReceiptTransaction("2023-07-19", 200, $empId);
        $tct->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $class = $e->getClassification();
        $this->assertNotNull($class);

        $sr = $class->getSalesReceipt("2023-07-19");
        $this->assertNotNull($sr);
        $this->assertSame(200, $sr->getAmount());
    }
}