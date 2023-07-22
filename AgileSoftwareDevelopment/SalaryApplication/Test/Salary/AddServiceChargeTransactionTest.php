<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Entity\UnionAffiliation;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\TimeCardTransaction;
use SalaryApplication\Transaction\AddServiceChargeTransaction;

class AddServiceChargeTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_service_charge_transaction(): void
    {
        $empId = 5;
        $memberId = 86;

        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 12);
        $t->execute($this->payrollDatabase);

        $tct = new TimeCardTransaction("2023-07-19", "18", $empId);
        $tct->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $affiliation = new UnionAffiliation($memberId, 11);
        $e->setAffiliation($affiliation);
        $this->payrollDatabase->addUnionMember($memberId, $e);

        $sct = new AddServiceChargeTransaction($memberId, "2023-07-19", 11);
        $sct->execute($this->payrollDatabase);

        $charge = $affiliation->getServiceCharge("2023-07-19");
        $this->assertSame(11, $charge);
    }
}