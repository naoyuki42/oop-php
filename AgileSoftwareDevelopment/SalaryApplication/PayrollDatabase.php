<?php

namespace SalaryApplication;

use SalaryApplication\Interface\IEmployee;

class PayrollDatabase
{
    private static array $employees = [];
    private static array $unionMembers = [];


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


    public static function addUnionMember(int $memberId, IEmployee $e): void
    {
        self::$unionMembers[$memberId] = $e;
    }

    public static function getUnionMember(int $memberId): ?IEmployee
    {
        return isset(self::$unionMembers[$memberId]) ? self::$unionMembers[$memberId] : null;
    }

    public static function clear(): void
    {
        self::$employees = [];
        self::$unionMembers = [];
    }
}