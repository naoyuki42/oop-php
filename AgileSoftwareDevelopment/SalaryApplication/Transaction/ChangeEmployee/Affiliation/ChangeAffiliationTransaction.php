<?php

namespace SalaryApplication\Transaction;

use SalaryApplication\Interface\IAffiliation;
use SalaryApplication\Interface\IEmployee;
use SalaryApplication\PayrollDatabase;

abstract class ChangeAffiliationTransaction extends ChangeEmployeeTransaction
{
    function __construct(
        private int $empId,
    ) {
        parent::__construct($empId);
    }

    public function change(IEmployee $e): void
    {
        $this->recordMembership($e);
        $e->setAffiliation($this->getAffiliation());
    }

    abstract protected function recordMembership(IEmployee $e): void;

    abstract protected function getAffiliation(): IAffiliation;
}