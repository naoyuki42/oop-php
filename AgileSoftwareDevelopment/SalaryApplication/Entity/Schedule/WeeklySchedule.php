<?php

namespace SalaryApplication\Entity;

use DateTime;
use SalaryApplication\Interface\IWeeklySchedule;

class WeeklySchedule extends PaymentSchedule implements IWeeklySchedule
{
    public function isPayDate(DateTime $date): bool
    {
        return $date->format("w") === 5;
    }
}