<?php

namespace SalaryApplication;

use SalaryApplication\Entity\Employee;
use SalaryApplication\Entity\HoldMethod;
use SalaryApplication\Entity\MonthlySchedule;
use SalaryApplication\Entity\SalariedClassification;

use SalaryApplication\Interface\IEmployee;

class PayrollDatabase
{
    private static array $employees = [];

    public static function addEmployee(int $empId, IEmployee $e): void
    {
        self::$employees[$empId] = $e;
    }

    public static function getEmployee(int $empId): IEmployee
    {
        return self::$employees[$empId];
    }

    public static function clear(): void
    {
        self::$employees = [];
    }
}