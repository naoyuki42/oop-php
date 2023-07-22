<?php

namespace SalaryApplication\Entity;

use DateTime;
use SalaryApplication\Interface\IMonthlySchedule;

class MonthlySchedule extends PaymentSchedule implements IMonthlySchedule
{
    public function isPayDate(DateTime $date): bool
    {
        $payDate = new DateTime("last day of this month");
        return $date->format("Y-m-d") === $payDate->format("Y-m-d");
    }
}