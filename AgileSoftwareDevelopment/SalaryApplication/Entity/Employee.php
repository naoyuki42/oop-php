<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IClassification;
use SalaryApplication\Interface\IEmployee;
use SalaryApplication\Interface\IMethod;
use SalaryApplication\Interface\ISchedule;

class Employee implements IEmployee
{
    function __construct(
        private string $name,
        private IClassification $class,
        private ISchedule $schedule,
        private IMethod $method,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getClassification(): IClassification
    {
        return $this->class;
    }

    public function getSchedule(): ISchedule
    {
        return $this->schedule;
    }

    public function getMethod(): IMethod
    {
        return $this->method;
    }
}