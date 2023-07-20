<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\UnionAffiliation;
use SalaryApplication\Interface\IAffiliation;
use SalaryApplication\Interface\IEmployee;
use SalaryApplication\PayrollDatabase;

class ChangeMemberTransaction extends ChangeAffiliationTransaction
{
    function __construct(
        private int $empId,
        private int $memberId,
        private int $dues,
        private PayrollDatabase $payrollDatabase,
    ) {
        parent::__construct($empId);
    }

    protected function recordMembership(IEmployee $e): void
    {
        $this->payrollDatabase->addUnionMember($this->memberId, $e);
    }

    protected function getAffiliation(): IAffiliation
    {
        return new UnionAffiliation($this->dues);
    }
}