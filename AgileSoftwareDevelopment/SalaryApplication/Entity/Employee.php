<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IEmployee;

class Employee implements IEmployee
{
    function __construct(
        private string $name,
        private Classification $class,
        private Schedule $schedule,
        private Method $method,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getClassification(): Classification
    {
        return $this->class;
    }

    public function getSchedule(): Schedule
    {
        return $this->schedule;
    }

    public function getMethod(): Method
    {
        return $this->method;
    }
}