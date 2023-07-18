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

    function __construct()
    {
        $empId = 1;
        $class = new SalariedClassification(1000);
        $schedule = new MonthlySchedule();
        $method = new HoldMethod();

        $e1 = new Employee($empId, "Bob", "America");
        $e1->setClassification($class);
        $e1->setSchedule($schedule);
        $e1->setMethod($method);

        self::$employees[$empId] = $e1;
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