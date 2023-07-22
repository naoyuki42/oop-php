<?php

namespace SalaryApplication\Interface;

use DateTime;

interface IMonthlySchedule {
    public function isPayDate(DateTime $date): bool;
}