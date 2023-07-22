<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IPayCheck;

abstract class PaymentMethod
{
    abstract public function pay(IPayCheck $pc): void;
}