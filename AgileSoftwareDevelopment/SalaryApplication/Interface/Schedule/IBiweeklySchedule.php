<?php

namespace SalaryApplication\Interface;

use DateTime;

interface IBiweeklySchedule {
    public function isPayDate(DateTime $date): bool;
}