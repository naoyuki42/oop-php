<?php

namespace SalaryApplication\Test;

use PHPUnit\Framework\TestCase;
use SalaryApplication\PayrollDatabase;
use SalaryApplication\Transaction\AddHourlyEmployeeTransaction;
use SalaryApplication\Transaction\ChangeMemberTransaction;

class ChangeMemberTransactionTest extends TestCase
{
    private PayrollDatabase $payrollDatabase;

    public function setUp(): void
    {
        $this->payrollDatabase = new PayrollDatabase();
    }

    public function test_change_member_transaction(): void
    {
        $empId = 1;
        $memberId = 7734;

        $t = new AddHourlyEmployeeTransaction($empId, "Bill", "Home", 13);
        $t->execute($this->payrollDatabase);
        $cmt = new ChangeMemberTransaction($empId, $memberId, 9, $this->payrollDatabase);
        $cmt->execute($this->payrollDatabase);

        $e = $this->payrollDatabase->getEmployee($empId);
        $this->assertNotNull($e);

        $affiliation = $e->getAffiliation();
        $this->assertNotNull($affiliation);
        $this->assertSame(9, $affiliation->getDues());

        $member = $this->payrollDatabase->getUnionMember($memberId);
        $this->assertNotNull($member);
        $this->assertSame($e->getName(), $member->getName());
    }
}