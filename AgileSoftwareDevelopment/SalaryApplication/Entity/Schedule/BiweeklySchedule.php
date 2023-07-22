<?php

namespace SalaryApplication\Entity;

use DateTime;
use SalaryApplication\Interface\IBiweeklySchedule;

class BiweeklySchedule extends PaymentSchedule implements IBiweeklySchedule
{
    public function isPayDate(DateTime $date): bool
    {
        $payDate1 = new DateTime('second Saturday of this month');
        $payDate2 = new DateTime('forth Saturday of this month');
        return $date == $payDate1 || $date == $payDate2;
    }
}