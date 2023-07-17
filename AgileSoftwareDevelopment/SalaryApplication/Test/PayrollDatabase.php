<?php

namespace SalaryApplication\Test;

use SalaryApplication\Entity\Classification;
use SalaryApplication\Entity\Employee;
use SalaryApplication\Entity\Method;
use SalaryApplication\Entity\Schedule;

class PayrollDatabase
{
    private static array $employees = [];

    function __construct()
    {
        $class = new Classification();
        $schedule = new Schedule();
        $method = new Method();

        self::$employees[1] = new Employee("Bob", $class, $schedule, $method);
    }

    public static function addEmployee(int $empId, Employee $e): void
    {
        self::$employees[$empId] = $e;
    }

    public static function getEmployee(int $empId): Employee
    {
        return self::$employees[$empId];
    }

    public static function clear(): void
    {
        self::$employees = [];
    }
}