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

    public static function getEmployee(int $empId): ?IEmployee
    {
        return isset(self::$employees[$empId]) ? self::$employees[$empId] : null;
    }

    public static function deleteEmployee(int $empId): void
    {
        unset(self::$employees[$empId]);
    }

    public static function clear(): void
    {
        self::$employees = [];
    }
}