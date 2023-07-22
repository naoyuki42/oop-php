<?php

namespace SalaryApplication\Entity;

use DateTime;

abstract class PaymentSchedule
{
    abstract public function isPayDate(DateTime $date): bool;
}