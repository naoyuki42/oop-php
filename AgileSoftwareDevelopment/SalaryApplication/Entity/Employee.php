<?php

namespace SalaryApplication\Entity;

use SalaryApplication\Interface\IClassification;
use SalaryApplication\Interface\IEmployee;
use SalaryApplication\Interface\IMethod;
use SalaryApplication\Interface\ISchedule;

class Employee implements IEmployee
{
    function __construct(
        private int $empId,
        private string $name,
        private string $address,
        private ?IClassification $class = null,
        private ?ISchedule $schedule = null,
        private ?IMethod $method = null,
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

    public function setClassification(IClassification $class): void
    {
        $this->class = $class;
    }

    public function setSchedule(ISchedule $schedule): void
    {
        $this->schedule = $schedule;
    }

    public function setMethod(IMethod $method): void
    {
        $this->method = $method;
    }
}