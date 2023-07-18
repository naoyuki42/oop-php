<?php

namespace SalaryApplication;

use SalaryApplication\Entity\Employee;
use SalaryApplication\Entity\Classification;
use SalaryApplication\Entity\Method;
use SalaryApplication\Entity\Schedule;

use SalaryApplication\Interface\IEmployee;

class PayrollDatabase
{
    private static array $employees = [];

    function __construct()
    {
        $empId = 1;
        $class = new Classification();
        $schedule = new Schedule();
        $method = new Method();

        self::$employees[$empId] = new Employee("Bob", $class, $schedule, $method);
    }

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