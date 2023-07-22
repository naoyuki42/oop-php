<?php

namespace SalaryApplication\Entity;

class UnionAffiliation extends PaymentAffiliation
{
    function __construct(
        private int $memberId,
        private int $dues,
        private array $serviceCharge = [],
    ) {
        parent::__construct($memberId, $dues, $serviceCharge);
    }
}