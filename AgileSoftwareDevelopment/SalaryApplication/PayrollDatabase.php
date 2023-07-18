<?php

namespace SalaryApplication;

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