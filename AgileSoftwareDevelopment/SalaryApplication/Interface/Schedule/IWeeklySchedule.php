<?php

namespace SalaryApplication\Interface;

use DateTime;

interface IWeeklySchedule {
    public function isPayDate(DateTime $date): bool;
}