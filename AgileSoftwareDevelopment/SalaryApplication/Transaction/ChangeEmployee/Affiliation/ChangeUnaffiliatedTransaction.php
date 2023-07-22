<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Entity\UnionAffiliation;
use SalaryApplication\Entity\NoAffiliation;
use SalaryApplication\Interface\IAffiliation;
use SalaryApplication\Interface\IEmployee;
use SalaryApplication\PayrollDatabase;

class ChangeUnaffiliatedTransaction extends ChangeAffiliationTransaction
{
    function __construct(
        private int $empId,
        private PayrollDatabase $payrollDatabase,
    ) {
        parent::__construct($empId);
    }

    public function getAffiliation(): IAffiliation
    {
        return new NoAffiliation();
    }

    public function recordMembership(IEmployee $e): void
    {
        $affiliation = $e->getAffiliation();
        if($affiliation instanceof UnionAffiliation) {
            $memberId = $affiliation->getMemberId();
            $this->payrollDatabase->removeUnionMember($memberId);
        }
    }
}