<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Interface\ITransaction;
use SalaryApplication\Interface\IAffiliation;
use SalaryApplication\PayrollDatabase;

class AddServiceChargeTransaction implements ITransaction
{
    function __construct(
        private int $memberId,
        private string $date,
        private int $charge,
    ) {}

    public function execute(PayrollDatabase $payrollDatabase): void
    {
        $e = $payrollDatabase->getUnionMember($this->memberId);
        $affiliation = $e->getAffiliation();
        $isUnionAffiliation = $affiliation instanceof IAffiliation;
        if($isUnionAffiliation) {
            $affiliation->addServiceCharge($this->date, $this->charge);
        }
    }
}